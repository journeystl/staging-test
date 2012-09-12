<?php

/**
 * NODE: CHURCH TPL
 */
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

	<div class="row">
	
	
		<div class="six columns">
		      <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
		    
	<!-- VIEWS -->
	
		<?php print views_embed_view('church_info', 'block'); ?>
	    </div>
	    <div class="six columns">
	    	<?php print views_embed_view('church_photo', 'block'); ?>
	    </div>
			
	</div> <!-- end row -->
	
	<div class="row">
		<div class="twelve columns">
			<hr class="top">
		</div>
		
		<div class="twelve columns">
		<?php print views_embed_view('promo_thumbs_church_pages', 'block', $node->field_uid[LANGUAGE_NONE][0]['value']); ?>
		</div>
	</div> <!-- end row -->

	
	<div class="row">
		<div class="twelve columns">
			<hr class="top">
		</div>
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
