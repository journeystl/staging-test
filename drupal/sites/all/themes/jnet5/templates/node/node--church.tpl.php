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
		<div class="six columns">
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
			<table class="table table-condensed">
		    <tbody>
		    	<tr>
						<td><strong>Services</strong></td>
			      <td>
			        <?php print $address_services->field_church_street[$node->language][0]['value']; ?><br>
							<?php print $address_services->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?><br>
							<i class="foundation-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_services->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_services->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
						</td>
           	<td>
	            <?php
	           	unset($content['group_services']['#prefix']);
	           	unset($content['group_services']['#suffix']);
	           	$content['field_image']['#label_display'] = 'hidden';
	            ?>
	            <?php print render($content['group_services']); ?>
           	</td>
		      </tr>

          <tr>
          	<td colspan="3"><hr class="top"></td>
          </tr>

          <tr>
           	<td><strong>Church Office</strong></td>
           	<td>
           		<?php print $address_office->field_church_street[$node->language][0]['value']; ?><br>
							<?php print $address_office->field_church_city[$node->language][0]['value']; ?>,&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?><br>
							<i class="foundation-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $address_office->field_church_street[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_state[$node->language][0]['value']; ?>&#32;<?php print $address_office->field_church_zipcode[$node->language][0]['value']; ?>">Map</a>
           	</td>
           	<td>
	           	<i class="foundation-phone"></i>&#32;<?php print $field_church_phone[$node->language][0]['value']; ?><br>
	           	<i class="foundation-mail"></i>&#32;<a href="mailto:<?php print $field_church_email[$node->language][0]['value']; ?>"><?php print $field_church_email[$node->language][0]['value']; ?></a>
           	</td>
	        </tr>
				</tbody>
			</table>
	    </div> <!--/.six columns-->
	    <div class="six columns">
	    	<?php print views_embed_view('church_photo', 'block'); ?>
	    </div>

	</div> <!-- end row -->

	<hr class="top">

	<div class="row">
		<div class="twelve columns">
		<?php print views_embed_view('promo_thumbs_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']); ?>
		</div>
	</div> <!-- end row -->

	<hr class="top">

	<div class="row">
		<div class="six columns">
			<h3>Meet Our Staff</h3>
			<?php print views_embed_view('meet_the_staff_churches', 'block'); ?>
		</div>

		<div class="six columns">
			<h3>Upcoming Events</h3>
			<?php print views_embed_view('event_list_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']); ?>
		</div>

	</div> <!-- end row -->

</div> <!-- end node -->
