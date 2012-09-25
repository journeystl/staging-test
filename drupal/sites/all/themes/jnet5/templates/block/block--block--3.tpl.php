<?php

/**
 * Topic Header
 */

$node = menu_get_object();

// Get the campus name for this item.
$campus_id = field_get_items('node', $node, 'field_campus_id');
$campus_name = ($campus_id) ? jnet5_campus_name_by_pbid($campus_id[0]['value']) : FALSE;

?>

<div class="row">
	<h1 class="twelve columns"><?php print render($node->title); ?></h1>

	<div class="eight columns">
		<?php if ($node->field_author_longname): ?>
			<h5>By <?php print render($node->field_author_longname[$node->language][0]['value']); ?></h5>
		<?php endif; ?>
		<span class="label radius">
			<?php print render(ucfirst($node->field_type[$node->language][0]['value'])); ?>
		</span>
		<?php if ($campus_name): ?>
			<span class="secondary label radius"><?php print $campus_name; ?></span>
		<?php endif; ?>
	</div> <!--/.eight-->

	<div class="four columns">
		<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">Leave A Comment  <span class="label round"><?php print count($node->field_topic_posts[LANGUAGE_NONE]); ?></span></a>
	</div> <!--/.four columns-->



</div> <!--/.row-->

