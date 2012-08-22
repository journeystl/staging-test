<?php

// Bootstrap Drupal
define("DRUPAL_ROOT", dirname(__FILE__));
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
require_once dirname(__FILE__) . '/includes/bootstrap.inc';
drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

// Run elysia cron.
elysia_cron_run(TRUE);
