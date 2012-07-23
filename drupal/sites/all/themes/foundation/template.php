<?php

/**
 * Implements TEMPLATE_preprocess_html().
 */
function foundation_preprocess_html(&$vars) {
  drupal_set_message('foundation_preprocess_html');
}

/**
 * Override theme_menu_local_tasks().
 */
function foundation_menu_local_tasks(&$vars) {
  $output = '';

  if (!empty($vars['primary'])) {
    dpm($vars['primary']);
    $output .= drupal_render($vars['primary']);
  }
  if (!empty($vars['secondary'])) {
    $output .= drupal_render($vars['secondary']);
  }

  return $output;
}
