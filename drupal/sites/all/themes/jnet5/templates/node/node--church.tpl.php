<?php
/**
 * NODE: CHURCH TPL
 */

// Get the addresses for this church in easier to use arrays.
$location_ids = field_get_items('node', $node, 'field_addresses');
if (isset($location_ids[0])) {
	$address_services = reset(entity_load('field_collection_item', array($location_ids[0]['value'])));
}
// If we have an 'office' address, use it; otherwise use the church address as the office address.
if (isset($location_ids[1])) {
	$address_office = reset(entity_load('field_collection_item', array($location_ids[1]['value'])));
} else if (isset($address_services)) {
	$address_office = $address_services;
}

// Build Schedule stuff
$schedule_modal = '				
<div id="scheduleModal" class="schedule reveal-modal xlarge" style="top: 100px;">' .
	jnet5_get_schedule($node->field_uid['und'][0]['value'], 'long') .
  '<a class="close-reveal-modal">&#215;</a>
</div>';

$schedule = '				
<div class="six columns schedule">
	<span id="this_weekend"></span>
	<div class="row">' .
		jnet5_get_schedule($node->field_uid['und'][0]['value'], 'short') .
	'<p class="twelve columns"><a href="#" class="radius medium button" data-reveal-id="scheduleModal">View More Weekends</a></p>
	</div>
</div>';

print $schedule_modal;

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<div class="row">
		<div class="six mobile-four columns">
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
			<div class="row">
				<div class="two mobile-four columns">
					<strong>Services</strong>
				</div>
				<div class="five mobile-two columns">

					<?php if ($address_services->field_church_location[$node->language][0]['value'] != null) {
						print $address_services->field_church_location[$node->language][0]['value'] . '<br>';
						}
					?>
					<?php print $address_services->field_church_street[$node->language][0]['value']; ?><br>
					<?php print $address_services->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?><br>
					<i class="g-foundicon-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_services->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
				</div>
				<div class="five mobile-two columns">
		            <?php
		           	unset($content['group_services']['#prefix']);
		           	unset($content['group_services']['#suffix']);
		           	$content['field_image']['#label_display'] = 'hidden';
		            ?>
		            <?php print render($content['group_services']); ?>

		            <?php if (stristr($content['group_services']['#children'], '*')) {
		            	print "<p class='muted smaller'>* No children's ministry provided during this service.</p>";
		            } ?>
				</div>
				<div class="twelve columns">
					<hr class="bottom hide-for-small">
					<hr class="top show-for-small">
				</div>
			</div>
			<div class="row office">
				<div class="two mobile-four columns">
					<strong>Church Office</strong>
				</div>
				<div class="five mobile-two columns">
					<?php if ($address_services->field_church_location[$node->language][1]['value'] != null) {
						print $address_services->field_church_location[$node->language][1]['value'] . '<br>';
						}
					?>
	           		<?php print $address_office->field_church_street[$node->language][0]['value']; ?><br>
								<?php print $address_office->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?><br>
		<i class="g-foundicon-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_office->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
				</div>
				<div class="five mobile-two columns">
		           	<i class="foundation-phone"></i>&#32;<?php print $field_church_phone[$node->language][0]['value']; ?><br>
		           	<i class="foundation-mail"></i>&#32;<a href="mailto:<?php print $field_church_email[$node->language][0]['value']; ?>"><?php print $field_church_email[$node->language][0]['value']; ?></a>
				</div>
			</div>
	    </div> <!--/.six columns-->
	    <div class="six columns hide-for-small">
	    	<?php print views_embed_view('church_photo', 'block'); ?>
	    </div>

	</div> <!-- end row -->

	<hr class="top hide-for-small">
	<hr class="bottom show-for-small">

	<div class="row">
		<div class="twelve columns">
		<?php print views_embed_view('promo_thumbs_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']); ?>
		</div>
	</div> <!-- end row -->

	<hr class="top">

<!-- BLOCKS -->
<?php

// meet the staff view
$view_meet_the_staff = views_get_view('meet_the_staff_churches');
$view_meet_the_staff->set_display('block');
$view_meet_the_staff->execute();
if (count($view_meet_the_staff->result) > 0) {
	$meetStaff = '<h3>Meet Our Staff</h3>' . $view_meet_the_staff->render();
} else {
	$meetStaff = '';
}

// upcoming events
$view_upcoming_events = views_get_view('event_list_church_pages');
$view_upcoming_events->set_display('block');
$view_upcoming_events->set_arguments(array($node->field_uid[LANGUAGE_NONE][0]['value']));
$view_upcoming_events->execute();
if (count($view_meet_the_staff->result) > 0) {
	$upcomingEvents = '<h3>Upcoming Events</h3>' . $view_upcoming_events->render();
} else {
	$upcomingEvents = '';
}

// get involved
$view_get_involved = views_get_view('signup_list_church_pages');
$view_get_involved->set_display('block');
$view_get_involved->set_arguments(array($node->field_uid[LANGUAGE_NONE][0]['value']));
$view_get_involved->execute();
if (count($view_get_involved->result) > 0) {
	$getInvolved = '<h3>Get Involved</h3>' . $view_get_involved->render();
} else {
	$getInvolved = '';
}	


?>


<?php if (count($view_meet_the_staff->result) >= 4): ?>
<div class="row">
	<div class="six columns hide-for-small">
		<?php print $meetStaff; ?>
	</div>
	
	<?php print $schedule; ?>
	
	<?php if ($schedule != ''): ?>
		<div class="six columns">
			<hr class="top double">
		</div>
	<?php endif; ?>
		
	<div class="six columns">
		<?php print $upcomingEvents; ?>
		<?php if ($upcomingEvents != ''): ?>
			<hr class="top double">
		<?php endif; ?>
		<?php print $getInvolved; ?>
	</div>
<hr class="top">


<?php elseif ($schedule == ''): ?>
<div class="row">
	<div class="six columns">
		<?php print $meetStaff; ?>
	</div>
	<div class="six columns hide-for-small">
		<?php print $upcomingEvents; ?>
	</div>

	<div class="six columns">
		<hr class="top double">
		<?php print $getInvolved; ?>
	</div>
</div> <!-- end row -->


<?php else: ?>
<div class="row">
	<div class="six columns">
		<?php print $meetStaff; ?>
	</div>

	<?php print $schedule; ?>
</div>
<div class="row">
	<div class="six columns hide-for-small">
		<hr class="top double">
		<?php print $upcomingEvents; ?>
	</div>
	<div class="six columns">
		<hr class="top double">
		<?php print $getInvolved; ?>
	</div>
</div> <!-- end row -->
<?php endif; ?>





<!-- END BLOCKS -->

</div> <!-- end node -->
