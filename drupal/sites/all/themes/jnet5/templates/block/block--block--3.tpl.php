<?php

/**
 * Topic Header
 */
?>
<?php $node = menu_get_object(); ?>

<div class="row">
	<div class="six columns">
		<h1><?php print render($node->title); ?></h1>
		<h5>By <?php print render($node->field_author_longname[$node->language][0]['value']); ?></h5>
		<span class="label secondary radius"><?php print render(ucfirst($node->field_type[$node->language][0]['value'])); ?></span>
	</div> <!--/.six columns-->
	<div class="four columns">
		
	</div> <!--/.four columns-->
	<div class="two columns">
		<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">Leave A Comment  <span class="label round secondary">3</span></a>
	</div> <!--/.two columns-->
</div> <!--/.row-->

