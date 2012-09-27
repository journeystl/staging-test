<?php

/**
 * Event Header
 */

$node = menu_get_object();

// Get the campus name for this item.
$campus_id = field_get_items('node', $node, 'field_campus_id');
$campus_name = ($campus_id) ? jnet5_campus_name_by_pbid($campus_id[0]['value']) : FALSE;

// Calculate post count.
$post_count = ($posts = field_get_items('node', $node, 'field_event_responses')) ? count($posts) : 0;

?>

<div class="row">
	<div class="eight columns">
		<h1><?php print render($node->title); ?></h1>
	</div> <!--/.eight columns-->
	<div class="four columns" id="event-rsvp">
		<a href="<?php print render($node->field_short_url[$node->language][0]['value']); ?>" class="button radius large">RSVP  <span class="label round"><?php print count($node->field_event_responses); ?></span></a>
		<a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="button secondary radius large" id="event-map-btn">Map It</a>
	</div> <!--/.four columns-->

	<div class="eight columns">
		<strong>Event Starting At:</strong> <?php print date("F j, Y \a\\t g:ia", strtotime($node->field_event_starting_at[$node->language][0]['value'])); ?></div>
	</div> <!--/.eight columns-->

	<div class="four columns">
		<div class="location-link"><strong>Location:</strong> <a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="" id="event-map-link"><?php print render($node->field_event_address_street[$node->language][0]['value']); ?>, <?php print render($node->field_event_address_city[$node->language][0]['value']); ?>, <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?></a></div>
	</div> <!--/.four columns-->

	<div class="twelve columns">
		<?php if ($node->field_author_longname): ?>
			<h5>By <?php print render($node->field_author_longname[$node->language][0]['value']); ?></h5>
		<?php endif; ?>
		<span class="label radius">
			<?php print render(ucfirst($node->field_type[$node->language][0]['value'])); ?>
		</span>
		<?php if ($campus_name): ?>
			<span class="secondary label radius"><?php print $campus_name; ?></span>
		<?php endif; ?>

</div> <!--/.row-->
