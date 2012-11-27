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

function jnet5_preprocess_panels_pane(&$vars) {
  $tgpath = '/tg';
  $hrpath = '/hr';
  $wcpath = '/wc';
  $blpath = '/me';
  $sipath = '/si';

  $churchselect = '<ul><li><a href="' . $tgpath . '">Tower Grove</a></li><li><a href="' . $hrpath . '">Hanley Road</a></li><li><a href="' . $wcpath . '">West County</a></li><li><a href="' . $blpath . '">Metro East</a></li><li><a href="' . $sipath . '">Southern Illinois</a></li></ul>';
  $vars['content'] = str_replace('[church_select]', $churchselect, $vars['content']);
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
  if (isset($vars['node'])) {
    $vars['theme_hook_suggestions'][] = 'page__node__' . $vars['node']->type;
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

  // Build top-navbar.
  $result = db_query("SELECT link_title, link_path FROM {menu_links} WHERE menu_name = 'main-menu' AND depth = 1 ORDER BY weight")->fetchAllKeyed();
  $menu_links = array();
  $active_trail = menu_get_active_trail();
  foreach ($result as $key => $val) {
    // Check if this item is 'active'.
    $active = (isset($active_trail[1]) && isset($active_trail[1]['link_path']) && $active_trail[1]['link_path'] == $val) ? 'active' : '';
    $menu_links[] = array('link_title' => $key, 'link_path' => $val, 'active' => $active);
  }

  $vars['top_nav'] = "<div class='row'><nav class='top-bar'>";

    // Add first 3 links.
    $vars['top_nav'] .= "<div class='five columns'><ul class='left-links'>";
    for ($i=0;$i<=2;$i++) {
      $vars['top_nav'] .= "<li class='{$menu_links[$i]['active']}'>" . l($menu_links[$i]['link_title'], $menu_links[$i]['link_path']) . "</li>";
    }
    $vars['top_nav'] .= "</ul></div>";

    // Add logo.
    $vars['top_nav'] .= "<div class='two columns'><a class='logo' href='{$GLOBALS['base_path']}'><img src='{$GLOBALS['base_path']}sites/all/themes/jnet5/images/navigation/logo_main.png'></a></div>";

    // Add remaining links.
    $vars['top_nav'] .= "<div class='five columns'><ul class='right-links'>";
    for ($i=3;$i<count($menu_links);$i++) {
      $vars['top_nav'] .= "<li class='{$menu_links[$i]['active']}'>" . l($menu_links[$i]['link_title'], $menu_links[$i]['link_path']) . "</li>";
    }

    // Add church/search and close things up.
    // $vars['top_nav'] .= "<li><div id='nav-bar-churches'></div><div id='nav-bar-search'></div></li>";
    $vars['top_nav'] .= "<li><div id='nav-bar-churches'></div>";

	$vars['top_nav'] .= "</ul></div></nav></div>";


  // Add top_search_bar.
  $vars['top_search_bar'] = '<div id="search-bar"><a href="javascript:;" id="search-bar-close"><i class="g-foundicon-remove"></i></a><input type="text" placeholder="Search + Hit Enter" /></div>';

  // Add top_churches_bar.
  $vars['top_churches_bar'] = array(
    '#prefix' => '<div id="churches-bar"><h4>Select a Church:</h4>',
    '#suffix' => '<a href="javascript:;" id="churches-bar-close"><i class="g-foundicon-remove"></i></a></div>',
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
 * Implements template_preprocess_block().
 */
function jnet5_preprocess_block(&$vars) {
}

/**
 * Theme main links menu.
 */
function jnet5_preprocess_menu_block_wrapper(&$vars) {
  /* Uncomment to allow for dropdowns.
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

  // Add 'nav-bar' class to primary and secondary nav.
  if ($vars['delta'] == 1 || $vars['delta'] == 2) {
    // Run our custom theme_wrapper below. By using array() we're unsetting any other theme wrappers that might run.
    $vars['content']['#theme_wrappers'] = array('menu_tree__nav_bar');
  }


  // Alter main menu when it's printed in the footer.
  if ($vars['delta'] == 3) {
    // Run our custom theme_wrapper below. By using array() we're unsetting any other theme wrappers that might run.
    $vars['content']['#theme_wrappers'] = array('menu_tree__nav_footer');
  }


  // jnet5_menu_tree__menu_meet_out_staff
}
// Add 'nav-bar' class to main & secondary menu's primary <ul>.
function jnet5_menu_tree__nav_bar($vars) {
  return '<ul class="nav-bar">' . $vars['tree'] . '</ul>';
}
// Add grid classes to footer menu's primary <ul>.
function jnet5_menu_tree__nav_footer($vars) {
  return '<ul class="nav-bar block-grid five-up mobile-two-up">' . $vars['tree'] . '</ul>';
}

function jnet5_menu_tree__menu_front_page___featured($vars) {
  return '<ul class="block-grid five-up hide-for-small">' . $vars['tree'] . '</ul>
  <ul class="show-for-small">' . $vars['tree'] . '</ul>';
}

function jnet5_link($variables) {
  $variables['options']['html'] = TRUE;
  return '<a href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . '>' . ($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])) . '</a>';
}


function jnet5_image($vars) {
  $attributes = $vars['attributes'];
  $attributes['src'] = file_create_url($vars['path']);

  // IE ruins width and height for everybody.
  //foreach (array('width', 'height', 'alt', 'title') as $key) {
  foreach (array('alt', 'title') as $key) {

    if (isset($vars[$key])) {
      $attributes[$key] = $vars[$key];
    }
  }

  return '<img' . drupal_attributes($attributes) . ' />';
}

function jnet5_menu_link($vars) {
  $element = $vars['element'];

  // If the current active menu item is below this item, force this item as active.
  static $active_item = FALSE;
  static $active_item_plids;
  if (!$active_item) {
    $active_item = menu_get_item();
    $active_item_plids = db_query("SELECT plid FROM menu_links WHERE link_path = :path", array(':path' => $active_item['path']))->fetchAllAssoc('plid');
    $active_item_plids = array_keys($active_item_plids);
  }
  if (in_array($element['#original_link']['mlid'], $active_item_plids)) {
    $element['#attributes']['class'][] = 'active';
  }

  $sub_menu = '';
  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }

  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
* Implements theme_menu_local_tasks().
*/
function jnet5_menu_local_tasks(&$vars) {
	$output = '';

	if (!empty($vars['primary'])) {
		$vars['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
		$vars['primary']['#prefix'] .= '<dl class="tabs pill">';
		$vars['primary']['#suffix'] = '</dl>';
		$output .= drupal_render($vars['primary']);
	}
	if (!empty($vars['secondary'])) {
		$vars['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
		$vars['secondary']['#prefix'] .= '<dl class="tabs pill">';
		$vars['secondary']['#suffix'] = '</dl>';
		$output .= drupal_render($vars['secondary']);
	}

	return $output;
}

function jnet5_add_this() {
  return "
    <div class='addthis_toolbox addthis_default_style '>
    <a class='addthis_button_facebook_like' fb:like:layout='button_count'></a>
    <a class='addthis_button_tweet'></a>
    <a class='addthis_counter addthis_pill_style'></a>
    </div>
    <script type='text/javascript' src='http://s7.addthis.com/js/300/addthis_widget.js#pubid=xa-505341b94223ee75'></script>
  ";
}

/**
 * Return the campus name for a given ID.
 */
function jnet5_campus_name_by_pbid($campus_id) {
  $campuses = _jnet_purl_campuses();
  foreach ($campuses as $campus) {
    if ($campus['pb_id'] == $campus_id) {
      $campus_name = $campus['label'];
    }
  }
  if (isset($campus_name)) {
    return $campus_name;
  } else {
    return FALSE;
  }
}


/**
 * Get a campus's schedule information from the scheduler app.
 */
function jnet5_get_schedule($campus_id, $type) {
  $urls = array(
    'short' => 'http://scheduler.pagodabox.com/jorg/weekend/' . $campus_id,
    'long' => 'http://scheduler.pagodabox.com/jorg/weekends/' . $campus_id,
  );

  $last_timestamp = param_get('jnet5_schedule_timestamp_' . $campus_id);

  if ($last_timestamp < strtotime("-5 minutes")) {
    $markup = file_get_contents($urls[$type]);
    if (strlen($markup)) {
      param_set('jnet5_schedule_markup_' . $type . '_' . $campus_id, $markup);
      param_set('jnet5_schedule_timestamp_' . $campus_id, time());
      return $markup;
    } else {
      watchdog('jnet5', 'Could not retrieve scheduler info for campus ' . $campus_id . ', type ' . $type . '.');
    }
  }

  return param_get('jnet5_schedule_markup_' . $type . '_' . $campus_id);
}
