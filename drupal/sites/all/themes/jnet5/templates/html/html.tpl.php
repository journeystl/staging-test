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

<!-- Google Analytics -->

<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-4633630-1']);
  _gaq.push(['_setDomainName', 'thejourney.org']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- End Google -->

</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <div class="shim hide-for-small"></div>
  <div class="skip-link">
    <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
  </div>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>

  <?php print $GLOBALS['jorg_modal_markup']; ?>

<!-- Start Alexa Certify Javascript -->
<script type="text/javascript" src="https://d31qbv1cthcecs.cloudfront.net/atrk.js"></script><script type="text/javascript">_atrk_opts = { atrk_acct: "k8PVg1asOv00Mw", domain:"thejourney.org"}; atrk ();</script><noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=k8PVg1asOv00Mw" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

</body>
</html>
