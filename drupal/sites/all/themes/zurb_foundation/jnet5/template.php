<?php

// Use jQuery 1.7 from Google's CDN.
function jnet5_js_alter(&$javascript) {
  if ($GLOBALS['theme'] == 'jnet5') {
    $javascript['misc/jquery.js']['data'] = '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
  }
}

/**
 * Theme main links menu.
 */
function jnet5_preprocess_menu_block_wrapper(&$vars) {
  // Run through each primary link.
  foreach (element_children($vars['content']) as $link) {
    // If link has children, theme them properly.
    if (isset($vars['content'][$link]['#below']) && count($vars['content'][$link]['#below'])) {
      // Attach 'has-flyout' class to the primary link.
      $vars['content'][$link]['#attributes']['class'][] = 'has-flyout';
      // Tell Drupal to use our 'jnet5_menu_tree__flyout_menu' function to theme the children <ul>.
      $vars['content'][$link]['#below']['#theme_wrappers'] = array(0 => array('menu_tree__flyout_menu'));
      // Remove default classes for children links.
      foreach (element_children($vars['content'][$link]['#below']) as $child_link) {
        $vars['content'][$link]['#below'][$child_link]['#attributes']['class'] = array();
      }
    }
  }
}
function jnet5_menu_tree__main_menu($variables) {
  // Add 'nav-bar' class to main menu's primary <ul>.
  return '<ul class="nav-bar">' . $variables['tree'] . '</ul>';
}
function jnet5_menu_tree__flyout_menu($variables) {
  // Add 'flyout' class to child links <ul>.
  return '<ul class="flyout">' . $variables['tree'] . '</ul>';
}
