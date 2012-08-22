<?php

// Define the importer to run.
$importer_id = 'promotion_content_importer';

// Bootstrap Drupal
define("DRUPAL_ROOT", dirname(__FILE__) . '/../drupal');
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
require_once dirname(__FILE__) . '/../drupal/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

error_reporting(E_ALL);

$result = db_select('node', 'n')->fields('n', array('nid', 'title'))->condition('n.type', 'promotion_content_importer')->execute();
foreach ($result as $row) {
  print (date("m/d/Y h:i:s a", time()) . ": Starting import for {$row->title}<br />");
  $feedSource = feeds_source($importer_id, $row->nid);
  while ($feedSource->import() != FEEDS_BATCH_COMPLETE);
  $num_items = $feedSource->itemCount();
  print (date("m/d/Y h:i:s a", time()) . ": Ended import for {$row->title} ({$num_items} items imported/updated)<br /><br />");
}
