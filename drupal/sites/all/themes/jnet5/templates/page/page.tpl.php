<?php

/**
 * PAGE:NODE TPL
 */
?>

<div class="top-bar show-for-medium show-for-large-up">
  <div class="row">
    <div class="twelve columns">
      <?php print $top_search_bar; ?>
      <?php print $top_churches_bar; ?>
      <?php print render($page['header']); ?>
    </div>
  </div>
  <div class="row">
    <div id="header" class="three columns centered">
		  <a href="<?php print $GLOBALS['base_path']; ?>"><img src="<?php print $GLOBALS['base_path'] . $GLOBALS['theme_path']; ?>/images/navigation/logo_big.gif"></a>
    </div>
  </div>
</div>

<div class="top-bar show-for-small">
	  <div id="toggle-mobile-nav">
	  	<ul class="nav-bar">
	  		<li class="has-flyout">
	  			<a href="#"><img src="<?php print $GLOBALS['base_path'] . $GLOBALS['theme_path']; ?>/images/navigation/JourneyLogo_05.png"></a>
	  			<a href="#" class="flyout-toggle">
	  				<span></span>
	  			</a>
	  		</li>
	  	</ul>
	 	</div>
  <div id="mobile-nav"><?php print $main_menu_links; ?></div>
</div>

<div class="row">

  <?php if ($messages): print $messages; endif; ?>

  <?php if (!empty($page['help'])) { ?>
    <div class="twelve columns help">
    	<hr class="top double">
      <?php print render($page['help']); ?>
      	<hr class="bottom double">
    </div>
  <?php } ?>
  
	<div class="twelve columns content-header">
		<?php if (!empty($page['content_header'])) { ?>
		<?php print render($page['content_header']); ?>
		<?php } else if (!$is_front) { ?>
		<hr class="top">
		<?php } ?>
	</div>

  <div id="main" class="<?php print $main_grid; ?> columns">
    <?php if (!empty($page['highlighted'])): ?>
      <div class="highlight panel callout">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>
    <a id="main-content"></a>

    <?php if ($title && !$is_front): ?>
      <?php print render($title_prefix); ?>
      <h1 id="page-title" class="title"><?php print $title; ?></h1>
      <?php print render($title_suffix); ?>
    <?php endif; ?>

    <?php if (!empty($tabs)): ?>
      <?php print render($tabs); ?>
      <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
    <?php endif; ?>
    <?php if ($action_links): ?>
      <ul class="action-links">
        <?php print render($action_links); ?>
      </ul>
    <?php endif; ?>

    <?php print render($page['content_top']); ?>
    <?php print render($page['content']); ?>
    <?php print render($page['content_bottom']); ?>
  </div>

  <?php if (!empty($page['sidebar_first'])): ?>
    <div id="sidebar-first" class="<?php print $sidebar_first_grid; ?> columns sidebar ">
      <?php print render($page['sidebar_first']); ?>
    </div>
  <?php endif; ?>

  <?php if (!empty($page['sidebar_second'])): ?>
    <div id="sidebar-second" class="<?php print $sidebar_sec_grid;?> columns sidebar">
      <?php print render($page['sidebar_second']); ?>
    </div>
  <?php endif; ?>

  	<div class="twelve columns">
    	<hr class="top">
    </div>
    
</div>

<?php if (!empty($page['footer_first']) || !empty($page['footer_middle']) || !empty($page['footer_last']) || !empty($page['footer_bottom'])): ?>
  <footer class="row">
    <?php if (!empty($page['footer_first'])): ?>
      <div id="footer-first" class="four columns">
        <?php print render($page['footer_first']); ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($page['footer_middle'])): ?>
      <div id="footer-middle" class="four columns">
        <?php print render($page['footer_middle']); ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($page['footer_last'])): ?>
      <div id="footer-last" class="four columns">
        <?php print render($page['footer_last']); ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($page['footer_bottom'])): ?>
      <div id="footer-last" class="twelve columns">
        <?php print render($page['footer_last']); ?>
      </div>
    <?php endif; ?>
  </footer>
  <div class="row">
    <div class="tweleve columns">
      <div id="footer-bottom"><?php print render($page['footer_bottom']); ?></div>
    </div>
  </div>
<?php endif; ?>
<div class="bottom-bar">
  <div class="row">
    <div class="tweleve columns">
      &copy; <?php print date('Y') . ' ' . check_plain($site_name) . ' ' . t('All rights reserved.'); ?>
    </div>
  </div>
</div>
