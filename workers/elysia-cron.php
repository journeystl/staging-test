<?php

// Bootstrap Drupal
define("DRUPAL_ROOT", dirname(__FILE__) . '/../drupal');
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['REQUEST_METHOD'] = 'GET';
$_SERVER['SERVER_SOFTWARE'] = 'Apache/2.2.16 (Ubuntu)';
require_once dirname(__FILE__) . '/../drupal/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

while (1) {
  // Run elysia cron.
  elysia_cron_run(TRUE);

  // Run again in 10 seconds.
  sleep(10);
}
