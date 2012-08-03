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
function jnet5_menu_tree__main_menu($variables) {
  return '<ul class="nav-bar">' . $variables['tree'] . '</ul>';
}

function jnet5_menu_tree__flyout_menu($variables) {
  return '<ul class="flyout">' . $variables['tree'] . '</ul>';
}


function jnet5_preprocess_menu_block_wrapper(&$vars) {
  foreach (element_children($vars['content']) as $link) {
    if (isset($vars['content'][$link]['#below']) && count($vars['content'][$link]['#below'])) {
      $vars['content'][$link]['#attributes']['class'][] = 'has-flyout';
      //$vars['content'][$link]['#suffix'] = '<a href="#" class="flyout-toggle"><span> </span></a>';
      $vars['content'][$link]['#below']['#theme_wrappers'] = array(0 => array('menu_tree__flyout_menu'));
    }
  }
}
