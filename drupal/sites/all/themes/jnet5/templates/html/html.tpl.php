<?php

/* HTML TPL */

?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php print $html_attributes; ?>> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php print $html_attributes; ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php print $html_attributes; ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php print $html_attributes . $rdf_namespaces; ?>> <!--<![endif]-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="copyright" content="&copy; The Journey" />
  <meta name="keywords" content="Jesus, God, the, journey, journey church, church, theology, sin, saint, st. louis, louis, reformed, christian, Darrin Patrick, Darin Patrick, Acts 29, acts, 29" />
  <meta name="description" content="The Journey is a multi site church in St. Louis, Missouri that seeks to know God, love people, and transform St. Louis and the world for his glory." />
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
  <script type="text/javascript" src="//use.typekit.net/eak1rmm.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>
  <script type="text/javascript" src="http://www.esvapi.org/crossref/crossref.min.js"></script>
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div class="shim hide-for-small"></div>
  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <div id="podcast-modal" class="reveal-modal small">
    <h2><i class="s-foundicon-rss"></i> Podcasts</h2>
    <ul class="block-grid two-up">
    	<li><h6>Sermon Audio</h6>
    		<div><i class="s-foundicon-rss"></i> <a href="http://rss.journeyon.net/sermon-audio">RSS</a></div>
    		<div><i class="s-foundicon-rss"></i> <a href="itpc://rss.journeyon.net/sermon-audio">iTunes</a></div>
    		</li>
    	<li><h6>Everything Audio</h6>
    		<div><i class="s-foundicon-rss"></i> <a href="http://rss.journeyon.net/everything-audio">RSS</a></div>
    		<div><i class="s-foundicon-rss"></i> <a href="itpc://rss.journeyon.net/everything-audio">iTunes</a></div>
    		</li>
    	<li><h6>Sermon Video</h6>
    		<div><i class="s-foundicon-rss"></i> <a href="http://rss.journeyon.net/sermon-video">RSS</a></div>
    		<div><i class="s-foundicon-rss"></i> <a href="itpc://rss.journeyon.net/sermon-video">iTunes</a></div>
    		</li>
    </ul>
    <a class="close-reveal-modal">&#215;</a>
  </div>

</body>
</html>
