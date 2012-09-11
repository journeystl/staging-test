<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user module
 *     is responsible for handling the default user navigation block. In that case
 *     the class would be "block-user".
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 */
?>


<?php $node = menu_get_object(); ?>


<div class="row">
<div class="twelve columns">
	<div class="row">
		<div class="six columns">
			<h1><?php print render($node->title); ?></h1>
			<h5>By <?php print render($node->field_author_longname[$node->language][0]['value']); ?></h5>
			<span class="label secondary radius"><?php print render(ucfirst($node->field_type[$node->language][0]['value'])); ?></span>
		</div> <!--/.six columns-->
		<div class="four columns">
			<div><?php print render(field_view_field('node', $node, 'field_event_starting_at')); ?></div>
			<div><?php print render($node->field_event_address_street[$node->language][0]['value']); ?></div>
			<div><?php print render($node->field_event_address_city[$node->language][0]['value']); ?>
			<?php print render($node->field_event_address_state[$node->language][0]['value']); ?> 
			<?php print render($node->field_event_address_zip[$node->language][0]['value']); ?></div>
			<a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="button tiny secondary radius">Map It</a>
		</div> <!--/.four columns-->
		<div class="two columns">
			<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">RSVP  <span class="label round secondary">3</span></a>
		</div> <!--/.two columns-->
	</div> <!--/.row-->
</div> <!--/.twelve columns-->
</div> <!--/.row-->