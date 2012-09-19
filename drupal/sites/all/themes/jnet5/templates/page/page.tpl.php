<?php

/**
 * PAGE
 */
?>

<div class="top-bar-wrapper hide-for-small">
  <div class="row">
    <div class="twelve columns">
      <?php /* print $top_search_bar; */ ?>
      <?php /* print $top_churches_bar; */ ?>
      <?php print $top_nav; ?>
      <?php //print render($page['header']); ?>
    </div>
  </div>
</div>

<div class="top-bar-wrapper show-for-small">
	  <div id="toggle-mobile-nav">
	  	<ul class="nav-bar">
	  		<li class="has-flyout">
	  			<a href="#"><img src="<?php print $GLOBALS['base_path'] . $GLOBALS['theme_path']; ?>/images/navigation/logo_small.gif"></a>
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

	<div class="twelve columns content-header">
		<?php if (!empty($page['content_header'])) { ?>
		<?php print render($page['content_header']); ?>
		<?php } else if (!$is_front) { ?>
		<hr class="top">
		<?php } ?>
    <div class="row">
		<div class="twelve columns content-header">
			<?php if (!empty($page['content_header'])) { ?>
			<?php print render($page['content_header']); ?>
			<?php } else if (!$is_front) { ?>
			<hr class="top">
			<?php } ?>
		</div>
	</div>

  <div id="main">
    <?php if (!empty($page['highlighted'])): ?>
      	<div class="row">
	      <div class="highlight panel callout twelve columns">
	        <?php print render($page['highlighted']); ?>
	      </div>
	    </div>
    <?php endif; ?>

    <a id="main-content"></a>

    <?php if (!empty($tabs)): ?>
    	<div class="row">
    		<div class="twelve columns">
		      <?php print render($tabs); ?>
		      <?php if (!empty($tabs2)): print render($tabs2); endif; ?>
	      </div>
      	</div>
    <?php endif; ?>
    <?php if ($action_links): ?>
    	<div class="row">
    		<div class="twelve columns">
		      <ul class="action-links">
		        <?php print render($action_links); ?>
		      </ul>
			</div>
		</div>
    <?php endif; ?>

   </div>
</div>


    <?php if ($page['content_top']): ?>
    	<?php print render($page['content_top']); ?>
    	<hr class="top">
    </div>

</div>
	<?php endif; ?>
	<?php if ($page['content']): ?>
    	<?php print render($page['content']); ?>
    <?php endif; ?>
    <?php if ($page['content_bottom']): ?>
    	<hr class="top">
    	<?php print render($page['content_bottom']); ?>
    <?php endif; ?>



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
