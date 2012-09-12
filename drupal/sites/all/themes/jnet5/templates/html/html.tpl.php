<?php

/* HTML TPL */

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php print $html_attributes; ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php print $html_attributes; ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php print $html_attributes . $rdf_namespaces; ?>> <!--<![endif]-->
<head>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <script type="text/javascript" src="//use.typekit.net/xka5tqs.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div class="shim show-for-medium show-for-large-up"></div>
  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
