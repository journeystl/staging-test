<?php

/**
 * Event Header
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