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
		<?php
			if (!empty($node->field_external_form_id[$node->language][0]['value'])) {
				$form_id = $node->field_external_form_id[$node->language][0]['value'];
				$signup_btn = '<a href="javascript:;" class="button radius large" data-reveal-id="form-' . $form_id . '">Sign Up</a>';

				$form_modal = '<div id="form-' . $form_id . '" class="reveal-modal large wufoo-modal">';
				$wufoo_embed_code = "<div id='wufoo-[%wufoo_key]' style='margin: 15px auto; width: 600px; height: auto;'></div>
				<script type='text/javascript'>var [%wufoo_key];(function(d, t) {
				var s = d.createElement(t), options = {
				'userName':'journeyon',
				'formHash':'[%wufoo_key]',
				'autoResize':true,
				'height':'932',
				'async':true,
				'header':'show',
				'ssl':true};
				s.src = ('https:' == d.location.protocol ? 'https://' : 'http://') + 'wufoo.com/scripts/embed/form.js';
				s.onload = s.onreadystatechange = function() {
				var rs = this.readyState; if (rs) if (rs != 'complete') if (rs != 'loaded') return;
				try { [%wufoo_key] = new WufooForm();[%wufoo_key].initialize(options);[%wufoo_key].display(); } catch (e) {}};
				var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
				})(document, 'script');</script>";
				$form_modal .= str_replace('[%wufoo_key]', $form_id, $wufoo_embed_code);
				$form_modal .= '<a class="close-reveal-modal">&#215;</a>
				</div>';
				$GLOBALS['jorg_modal_markup'] .= $form_modal;

				print $signup_btn;
			} else {
				$rsvp_count = (isset($node->field_event_responses, $node->field_event_responses['und'])) ? count($node->field_event_responses['und']) : 0;
				$rsvp_btn = '<a href="' . render($node->field_short_url[$node->language][0]['value']) . '" class="button radius large">RSVP  <span class="label round">' . $rsvp_count . '</span></a>';
				print $rsvp_btn;
			}
		?>

		<a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="button secondary radius large" id="event-map-btn">Map It</a>
	</div> <!--/.four columns-->
</div>
<div class="row">


		<?php if (!empty($node->field_event_address_street[$node->language][0]['value']) && !empty($node->field_event_address_city[$node->language][0]['value']) && !empty($node->field_event_address_state[$node->language][0]['value']) && !empty($node->field_event_address_zip[$node->language][0]['value'])): ?>
			<div class="four columns">
				<div class="location-link"><strong>Location:</strong> <a href="http://maps.google.com?q=<?php print render($node->field_event_address_street[$node->language][0]['value']); ?> <?php print render($node->field_event_address_city[$node->language][0]['value']); ?> <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?>" class="" id="event-map-link"><?php print render($node->field_event_address_street[$node->language][0]['value']); ?>, <?php print render($node->field_event_address_city[$node->language][0]['value']); ?>, <?php print render($node->field_event_address_state[$node->language][0]['value']); ?> <?php print render($node->field_event_address_zip[$node->language][0]['value']); ?></a></div>
			</div> <!--/.four columns-->
		<?php endif;?>
	<div class="four columns">
		<strong>Event Starting At:</strong> <?php print date("F j, Y \a\\t g:ia", strtotime($node->field_event_starting_at[$node->language][0]['value'])); ?>
	</div> <!--/.eight columns-->
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
	</div>
</div> <!--/.row-->
