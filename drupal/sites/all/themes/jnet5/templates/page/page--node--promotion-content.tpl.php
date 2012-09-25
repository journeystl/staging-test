<?php

/**
 * PAGE - Promotion Content
 */
?>

<div class="top-bar-wrapper hide-for-small">
      <?php print $top_search_bar; ?>
      <?php print $top_churches_bar; ?>
      <?php print $top_nav; ?>
      <?php //print render($page['header']); ?>

</div>

<div class="top-bar-wrapper show-for-small">
	  <div id="toggle-mobile-nav">
	  	<ul class="nav-bar">
	  		<li class="has-flyout">
	  			<a href="#"><img src="<?php print $GLOBALS['base_path'] . $GLOBALS['theme_path']; ?>/images/navigation/logo_main.png"></a>
	  			<a href="#" class="flyout-toggle">
	  				<span><i class="ge-foundicon-plus"></i></span>
	  			</a>
	  		</li>
	  	</ul>
	 	</div>
  <div id="mobile-nav"><?php print $main_menu_links; ?></div>
</div>

  <div class="row">
	<div class="twelve columns">
		<?php if ($messages): print $messages; endif; ?>
	</div>
  </div>

  <?php if (!empty($page['help'])) { ?>
  	<hr class="top double">
    <div class="row">
    	<div class="twelve columns help">
			<?php print render($page['help']); ?>
    	</div>
    </div>
    <hr class="bottom double">
  <?php } ?>

	<?php if (!empty($page['content_header'])) { ?>
    <div class="row">
		<div class="twelve columns content-header">
			<?php print render($page['content_header']); ?>
		</div>
	</div>
	<!-- <hr class="top"> MAIN DIFFERENCE -->
	<?php } ?>

<div class="row">
  <div id="main" class="<?php print $main_grid; ?> columns">
    <?php if (!empty($page['highlighted'])): ?>
      <div class="highlight panel callout">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>
    <a id="main-content"></a>

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
  </footer>


  <?php if (!empty($page['footer_bottom'])): ?>
		<div id="footer-bottom"><?php print render($page['footer_bottom']); ?></div>
   <?php endif; ?>
<?php endif; ?>
