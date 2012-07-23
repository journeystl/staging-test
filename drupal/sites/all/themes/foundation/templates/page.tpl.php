  <div class="row">
    <div class="twelve columns">
      <h2><?php print $site_name; ?></h2>
      <p>This is version 3.0 released on June 30, 2012.</p>
      <hr />
    </div>
  </div>

  <div class="row">
    <div class="eight columns">
      <h1><?php print $title; ?></h1>

      <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Main menu'))); ?>
      <?php print theme('links__system_secondary_menu', array('links' => $secondary_menu, 'attributes' => array('id' => 'secondary-menu', 'class' => array('links', 'inline', 'clearfix')), 'heading' => t('Secondary menu'))); ?>

      <?php if ($breadcrumb): ?>
        <div id="breadcrumb"><?php print $breadcrumb; ?></div>
      <?php endif; ?>

      <?php if ($tabs): ?><dl class="tabs"><?php dpm($tabs); ?></dl><?php endif; ?>

        <dd class="active"><a href="#simple1">Simple Tab 1</a></dd>
        <dd><a href="#simple2">Simple Tab 2</a></dd>
        <dd><a href="#simple3">Simple Tab 3</a></dd>
      </dl>

      <?php print $messages; ?>
      <?php print render($page['help']); ?>

      <?php print render($page['content_top']); ?>
      <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
      <?php print render($page['content']); ?>
      <?php print render($page['content_bottom']); ?>
      <?php print $feed_icons; ?>

      <!-- Grid Example -->
      <div class="row">
        <div class="twelve columns">
          <div class="panel">
            <p>This is a twelve column section in a row. Each of these includes a div.panel element so you can see where the columns are - it's not required at all for the grid.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="six columns">
          <div class="panel">
            <p>Six columns</p>
          </div>
        </div>
        <div class="six columns">
          <div class="panel">
            <p>Six columns</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
        <div class="four columns">
          <div class="panel">
            <p>Four columns</p>
          </div>
        </div>
      </div>

      <h3>Buttons</h3>

      <div class="row">
        <div class="six columns">
          <p><a href="#" class="small button">Small Button</a></p>
          <p><a href="#" class="button">Medium Button</a></p>
          <p><a href="#" class="large button">Large Button</a></p>
        </div>
        <div class="six columns">
          <p><a href="#" class="small alert button">Small Alert Button</a></p>
          <p><a href="#" class="success button">Medium Success Button</a></p>
          <p><a href="#" class="large secondary button">Large Secondary Button</a></p>
        </div>
      </div>
    </div>

    <div class="four columns">
      <?php print render($page['sidebar_first']); ?>
    </div>
  </div>

  <footer class="row">
    <section class="five columns">
      <?php print render($page['footer']); ?>
    </section>
  </div>
