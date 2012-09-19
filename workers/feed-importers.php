<?php

// Bootstrap Drupal
define("DRUPAL_ROOT", dirname(__FILE__) . '/../drupal');
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.16 (Ubuntu)';
require_once dirname(__FILE__) . '/../drupal/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

while (1) {
  // Add an entry to the log.
  worker_watchdog('worker', 'Running worker feed-importers.php.');

  // Get all promotion content importers (should just be 1) and update the content.
  $result = db_select('node', 'n')->fields('n', array('nid', 'title'))->condition('n.type', 'promotion_content_importer')->execute();
  foreach ($result as $row) {
    $feedSource = feeds_source('promotion_content_importer', $row->nid);
    $feedSource->startImport();
    while ($feedSource->progressImporting() != FEEDS_BATCH_COMPLETE);
    $num_items = $feedSource->itemCount();
    worker_watchdog('worker', "Ended import for {$row->title} ({$num_items} items imported/updated)<br /><br />");
  }

  // Clear cache of loaded nodes. We do this so that Drupal doesn't maintain the current cache of entities on the next iteration.
  entity_get_controller('node')->resetCache();

  // Same as above.
  unset($feedSource);

  // Run again in 120 seconds.
  sleep(120);
}

// We redefine the watchdog() function here so that we can control the timestamp properly.
// Otherwise, since timestamp defaults to $_SERVER['REQUEST_TIME'], every log entry would
// have the time of the most recent deployment and not the time when the actual worker ran.
function worker_watchdog($type, $message, $variables = array(), $severity = WATCHDOG_NOTICE, $link = NULL) {
  global $user, $base_root;

  static $in_error_state = FALSE;

  // It is possible that the error handling will itself trigger an error. In that case, we could
  // end up in an infinite loop. To avoid that, we implement a simple static semaphore.
  if (!$in_error_state && function_exists('module_implements')) {
    $in_error_state = TRUE;

    // The user object may not exist in all conditions, so 0 is substituted if needed.
    $user_uid = isset($user->uid) ? $user->uid : 0;

    // Prepare the fields to be logged
    $log_entry = array(
      'type' => $type,
      'message' => $message,
      'variables' => $variables,
      'severity' => $severity,
      'link' => $link,
      'user' => $user,
      'uid' => $user_uid,
      'request_uri' => $base_root . request_uri(),
      'referer' => isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : '',
      'ip' => ip_address(),
      'timestamp' => time(),
    );

    // Call the logging hooks to log/process the message
    foreach (module_implements('watchdog') as $module) {
      module_invoke($module, 'watchdog', $log_entry);
    }

    // It is critical that the semaphore is only cleared here, in the parent
    // watchdog() call (not outside the loop), to prevent recursive execution.
    $in_error_state = FALSE;
  }
}
