<?php

/**
 * Event Header
 */

$node = menu_get_object();

// Get the campus name for this item.
$campus_id = field_get_items('node', $node, 'field_campus_id');
$campus_name = ($campus_id) ? jnet5_campus_name_by_pbid($campus_id[0]['value']) : FALSE;

?>

<div class="row">
	<div class="eight columns">
		<h1><?php print render($node->title); ?></h1>
	</div> <!--/.eight columns-->
	<div class="four columns" id="event-rsvp">
		<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">RSVP  <span class="label round"><?php print count($node->field_event_responses); ?></span></a>
		<a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="button secondary radius large" id="event-map-btn">Map It</a>
	</div> <!--/.four columns-->
</div> <!--/.row-->
<div class="row">
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

	<div class="four columns" id="event-deets">
		<div><?php print render(field_view_field('node', $node, 'field_event_starting_at')); ?></div><br>
		<div><strong>Location:</strong></div>
		<div><?php print render($node->field_event_address_street[$node->language][0]['value']); ?></div>
		<div><?php print render($node->field_event_address_city[$node->language][0]['value']); ?>
		<?php print render($node->field_event_address_state[$node->language][0]['value']); ?>
		<?php print render($node->field_event_address_zip[$node->language][0]['value']); ?></div>
		
	</div> <!--/.four columns-->

</div> <!--/.row-->
