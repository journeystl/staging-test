<?php

// Plugin definition
$plugin = array(
  'title' => t('Stagger Col'),
  'category' => t('Jnet Custom'),
  'icon' => 'jnetstaggercol.png',
  'theme' => 'jnetstaggercol',
  'css' => 'jnetstaggercol.css',
  'regions' => array(
	'top' => t('Top (12 col)'),
	'left1' => t('Left side 1 (4 col)'),
	'right1' => t('Right side 1 (8 col)'),
	'middle' => t('Middle (12 col)'),
	'left2' => t('Left side 2 (8 col)'),
	'right2' => t('Right side 2 (4 col)'),
	'left3' => t('Left side 3 (4 col)'),
	'right3' => t('Right side 3 (8 col)'),
	'left4' => t('Left side 4 (8 col)'),
	'right4' => t('Right side 4 (4 col)'),
	'left5' => t('Left side 5 (4 col)'),
	'right5' => t('Right side 5 (8 col)'),
	'bottom' => t('Bottom')
  ),
);
