<?php

// Plugin definition
$plugin = array(
  'title' => t('Jnet Five Row Two Column'),
  'category' => t('Jnet Custom'),
  'icon' => 'jnettwocol.png',
  'theme' => 'jnettwocol',
  'css' => 'jnettwocol.css',
  'regions' => array(
	'top' => t('Top'),
	'left1' => t('Left side 1'),
	'right1' => t('Right side 1'),
	'left2' => t('Left side 2'),
	'right2' => t('Right side 2'),
	'left3' => t('Left side 3'),
	'right3' => t('Right side 3'),
	'left4' => t('Left side 4'),
	'right4' => t('Right side 4'),
	'left5' => t('Left side 5'),
	'right5' => t('Right side 5'),
	'bottom' => t('Bottom')
  ),
);
