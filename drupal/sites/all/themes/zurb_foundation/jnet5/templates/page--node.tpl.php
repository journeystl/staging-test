<?php

/**
 * PAGE:NODE TPL
 */
?>


<div class="top-bar">
  <div class="row">
      <div class="three columns">
      	<p>
        	<a href="/">
        		<img src="/<?php print path_to_theme(); ?>/images/navigation/JourneyLogo_05.png">
        	</a>
        </p>
      </div>

  <?php if (!empty($page['header'])): ?>
    <div id=header class="nine columns">
      <?php print render($page['header']); ?>
    </div>
  <?php endif; ?>

  </div>
</div>
<div class="row">
  <div class="<?php $site_slogan ? print 'six' : print 'four columns offset-by-eight'; ?> columns hide-for-small">
    <p>
      <?php print l(t('Login'), 'user/login', array('attributes' => array('class' => array('large', 'radius', 'button')))); ?>
      <?php print l(t('Sign Up'), 'user/register', array('attributes' => array('class' => array('large', 'radius', 'success', 'button')))); ?>
    </p>
  </div>
  <?php if ($site_slogan): ?>
    <div class="six columns panel radius hide-for-small">
      <?php print $site_slogan; ?>
    </div>
  <?php endif; ?>
  <div class="show-for-small">
    <div class="six mobile-two columns">
      <p><?php print l(t('Login'), 'user/login', array('attributes' => array('class' => array('radius', 'button')))); ?></p>
    </div>
    <div class="six mobile-two columns">
      <p><?php print l(t('Sign Up'), 'user/register', array('attributes' => array('class' => array('radius', 'success', 'button')))); ?></p>
    </div>
  </div>
</div>
<div class="row">
  <?php print $breadcrumb; ?>
  <?php if ($messages): print $messages; endif; ?>
  <?php if (!empty($page['help'])): print render($page['help']); endif; ?>
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
<?php if (!empty($page['footer_first']) || !empty($page['footer_middle']) || !empty($page['footer_last'])): ?>
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
<?php endif; ?>
<div class="bottom-bar">
  <div class="row">
    <div class="tweleve columns">
      &copy; <?php print date('Y') . ' ' . check_plain($site_name) . ' ' . t('All rights reserved.'); ?>
    </div>
  </div>
</div>
