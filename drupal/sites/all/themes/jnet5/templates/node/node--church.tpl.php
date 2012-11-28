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

?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<div class="row">
		<div class="six mobile-four columns">
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
			<div class="row">
				<div class="four mobile-four columns">
					<strong>Services</strong>
				</div>
				<div class="four mobile-two columns">

					<?php if ($address_services->field_church_location[$node->language][0]['value'] != null) {
						print $address_services->field_church_location[$node->language][0]['value'] . '<br>';
						}
					?>
					<?php print $address_services->field_church_street[$node->language][0]['value']; ?><br>
					<?php print $address_services->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?><br>
					<i class="g-foundicon-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_services->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
				</div>
				<div class="four mobile-two columns">
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
				<div class="four mobile-four columns">
					<strong>Church Office</strong>
				</div>
				<div class="four mobile-two columns">
					<?php if ($address_services->field_church_location[$node->language][1]['value'] != null) {
						print $address_services->field_church_location[$node->language][1]['value'] . '<br>';
						}
					?>
	           		<?php print $address_office->field_church_street[$node->language][0]['value']; ?><br>
								<?php print $address_office->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?><br>
		<i class="g-foundicon-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_office->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
				</div>
				<div class="four mobile-two columns">
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

	<div class="row">
		<?php

			if (isset($_GET['show_schedule'])) {
				$schedule = '
				<div class="six columns schedule">
					<div class="row">' .
						jnet5_get_schedule($node->field_uid['und'][0]['value'], 'short') .
					'</div>
				</div>';
			} else {
				$schedule = '';
			}

			$view_meet_the_staff = views_get_view('meet_the_staff_churches');
			$view_meet_the_staff->set_display('block');
			$view_meet_the_staff->execute();
			if (count($view_meet_the_staff->result) > 0) {
				print '
				<div class="six columns hide-for-small">
					' . render(block_get_blocks_by_region('inner_first')) . '
					<h3>Meet Our Staff</h3>
					' . $view_meet_the_staff->render() . '
				</div>

				<div class="six columns">
					' . render(block_get_blocks_by_region('inner_second')) . '
					<h3>Upcoming Events</h3>
					' . views_embed_view('event_list_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']) . '
					<hr class="top double">
					<h3>Get Involved</h3>
					' . views_embed_view('signup_list_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']) . 
				'</div>' .
				$schedule;

			} else {
				print '
				<div class="six columns">
					' . render(block_get_blocks_by_region('inner_first')) . '
					<h3>Upcoming Events</h3>
					' . views_embed_view('event_list_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']) . '
				</div>

				<div class="six columns">
					' . render(block_get_blocks_by_region('inner_second')) . '
					<h3>Get Involved</h3>
					' . views_embed_view('signup_list_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']) .
				'</div>' .
				$schedule;
			}

		?>

	</div> <!-- end row -->

</div> <!-- end node -->
