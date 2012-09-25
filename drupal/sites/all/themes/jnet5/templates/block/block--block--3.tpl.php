<?php

/**
 * Topic Header
 */
?>
<?php $node = menu_get_object(); ?>

<?php dpm($node); ?>

<div class="row">
	<h1 class="twelve columns"><?php print render($node->title); ?></h1>

	<div class="eight columns">
		<?php if ($node->field_author_longname): ?>
			<h5>By <?php print render($node->field_author_longname[$node->language][0]['value']); ?></h5>
		<?php endif; ?>
		<span class="label radius">
			<?php print render(ucfirst($node->field_type[$node->language][0]['value'])); ?>
		</span>
		<span class="secondary label radius">ChurchName Here</span>
	</div> <!--/.eight-->

	<div class="four columns">
		<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">Leave A Comment  <span class="label round"><?php print count($node->field_topic_posts[LANGUAGE_NONE]); ?></span></a>
	</div> <!--/.four columns-->



</div> <!--/.row-->

