<?php

// Plugin definition
$plugin = array(
  'title' => t('Left Sidebar'),
  'category' => t('Jnet Custom'),
  'icon' => 'jnetleftsidebar.png',
  'theme' => 'jnetleftsidebar',
  'css' => 'jnetleftsidebar.css',
  'regions' => array(
  	'top_full' => t('Top Full Width'),
	'sidebar' => t('sidebar'),
	'main' => t('main'),
	'bottom_full' => t('Bottom Full Width')
  ),
);
