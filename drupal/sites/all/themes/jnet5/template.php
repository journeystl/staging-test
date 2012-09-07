<?php

// Use jQuery 1.7 from Google's CDN.
function jnet5_js_alter(&$javascript) {
  if ($GLOBALS['theme'] == 'jnet5') {
    $javascript['misc/jquery.js']['data'] = '//ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js';
  }
}

/**
 * Impements template_preprocess().
 */
function jnet5_preprocess(&$vars, $hook) {
  // Set the PURL active campus ID.
  // This allows the active campus ID to be used easily, for example in a Views block:
  // print views_embed_view('view_name', 'block_1', $active_campus);
  // Setting this in template_preprocess() allows it to be available in html, page, and node tpl's.
  if (in_array($hook, array('html', 'page', 'node'))) {
    $purls = purl_active()->get('path');
    $vars['active_campus'] = (isset($purls[0])) ? $purls[0]->id : NULL;
  }
}

/**
 * Impements template_preprocess_html().
 */
function jnet5_preprocess_html(&$vars) {
  // Add the background image on media_series nodes.
  if (isset($vars['menu_item']['page_arguments']) && isset($vars['menu_item']['page_arguments'][0]->type) && $vars['menu_item']['page_arguments'][0]->type == 'media_series') {
    // Attach node--media-series.css
    drupal_add_css(drupal_get_path('theme', 'jnet5') . '/css/node--media-series.css');
    // Check if a background image is attached and set it to the body's background.
    if (isset($vars['menu_item']['page_arguments'][0]->field_background_image[LANGUAGE_NONE])) {
      $bg_image = file_create_url($vars['menu_item']['page_arguments'][0]->field_background_image[LANGUAGE_NONE][0]['uri']);
      $vars['attributes_array']['style'] = "background: url({$bg_image});";
    }
    // Add class depending on "foreground_light_dark"
    if (isset($vars['menu_item']['page_arguments'][0]->field_light_dark[LANGUAGE_NONE])) {
      $vars['classes_array'][] = 'media-' . $vars['menu_item']['page_arguments'][0]->field_light_dark[LANGUAGE_NONE][0]['value'];
    }
  }
}

/**
 * Impements template_preprocess_page().
 */
function jnet5_preprocess_page(&$vars) {
  // Add tpl suggestions for landing pages.
  if (isset($_GET['landing'])) {
    $vars['theme_hook_suggestions'][] = 'page__landing';
  }

  // Add tpl suggestions for Promotion Content depending on the "type".
  if (isset($vars['node']) && $vars['node']->type == 'media_series') {
    $vars['theme_hook_suggestions'][] = 'page__media_series';
  }

	// Convenience variables
	$left = $vars['page']['sidebar_first'];
	$right = $vars['page']['sidebar_second'];

	// Dynamic sidebars
	if (!empty($left) && !empty($right)) {
	  $vars['main_grid'] = 'six push-three';
	  $vars['sidebar_first_grid'] = 'three pull-six';
	  $vars['sidebar_sec_grid'] = 'three';
	} elseif (empty($left) && !empty($right)) {
	  $vars['main_grid'] = 'eight';
	  $vars['sidebar_first_grid'] = '';
	  $vars['sidebar_sec_grid'] = 'four';
	} elseif (!empty($left) && empty($right)) {
	  $vars['main_grid'] = 'eight push-four';
	  $vars['sidebar_first_grid'] = 'four pull-eight';
	  $vars['sidebar_sec_grid'] = '';
	} else {
	  $vars['main_grid'] = 'twelve';
	  $vars['sidebar_first_grid'] = '';
	  $vars['sidebar_sec_grid'] = '';
	}

  // Add top_search_bar.
  $vars['top_search_bar'] = '<div id="search-bar"><a href="javascript:;" id="search-bar-close"><i class="foundicon-remove"></i></a><input type="text" placeholder="Search + Hit Enter" /></div>';

  // Add top_churches_bar.
  $vars['top_churches_bar'] = array(
    '#prefix' => '<div id="churches-bar"><span>select a church:</span><a href="javascript:;" id="churches-bar-close"><i class="foundicon-remove"></i></a>',
    '#suffix' => '</div>',
    '#theme' => 'item_list',
    '#items' => array(),
  );
  $churches = db_select('node', 'n')->fields('n', array('nid', 'title'))->condition('n.type', 'church')->condition('n.status', 1)->execute();
  foreach ($churches as $church) {
    $vars['top_churches_bar']['#items'][] = l($church->title, "node/{$church->nid}");
  }
  $vars['top_churches_bar'] = render($vars['top_churches_bar']);
}

/**
 * Impements template_preprocess_node().
 */
function jnet5_preprocess_node(&$vars) {
  // Add tpl suggestions for Promotion Content depending on the "type".
  if ($vars['type'] == 'promotion_content' && isset($vars['field_type'][0])) {
    $vars['theme_hook_suggestions'][] = 'node__promotion_content__' . $vars['field_type'][0]['value'];
  }
}

/**
 * Theme main links menu.
 */
function jnet5_preprocess_menu_block_wrapper(&$vars) {
/*
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
*/

  // Insert tagline / logo after 3rd menu item.
  array_splice($vars['content'], 3, 0, array('tag' => array('#markup' => '<li class="leaf" id="nav-bar-tag-logo-wrapper"><div id="nav-bar-tag">LOVE GOD. CONNECT PEOPLE. TRANSFORM THE WORLD.</div><div id="nav-bar-logo">JOURNEY</div></li>')));

  // Insert churches / search links.
  $vars['content']['buttons'] = array('#markup' => '<li class="leaf" id="nav-bar-buttons"><div id="nav-bar-churches"></div><div id="nav-bar-search"></div></li>');
}
function jnet5_menu_tree__main_menu($variables) {
  // Add 'nav-bar' class to main menu's primary <ul>.
  return '<ul class="nav-bar">' . $variables['tree'] . '</ul>';
}
function jnet5_menu_tree__flyout_menu($variables) {
  // Add 'flyout' class to child links <ul>.
  return '<ul class="flyout">' . $variables['tree'] . '</ul>';
}
