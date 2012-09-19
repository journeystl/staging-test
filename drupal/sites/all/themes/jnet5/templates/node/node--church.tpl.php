<?php

/**
 * NODE: CHURCH TPL
 */
?>

		<?php dpm( $content ); ?>
		
		
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

	<div class="row">
	
	
		<div class="six columns">
		      <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
		      
		     <table class="table table-condensed">
		       <tbody>
		         <tr>
		           <td><strong>Services</strong></td>
		           <td>
		           		<?php print $field_church_street[$node->language][0]['value']; ?>

		           
		           
		           </td>
		           <td>
		           	<?php 
		           		foreach($field_church_times[$node->language]  as $key => $value){
		           		   print $content['group_services']['field_church_times'][$key]['entity']['field_collection_item'][$value]['field_church_service_day']['0']['#markup'] . '<br>' . $content['group_services']['field_church_times'][$key]['entity']['field_collection_item'][$value]['field_church_service_time']['0']['#markup'];
		           		}
		           	 ?>	
		           
		           
		           
		           </td>
		         </tr>
		         
		         <tr>
		         	<td> </td>
		         	<td><?php print $field_church_city[$node->language][0]['value']; ?>, <?php print $field_church_state[$node->language][0]['value']; ?>&#32;<?php print $field_church_zipcode[$node->language][0]['value']; ?></td>
		         	<td></td>
		         </tr>
		         <tr>
		         	<td> </td>
		         	<td><i class="foundation-location"></i>&#32;<a href="http://maps.google.com/?q=<?php print $field_church_street[$node->language][0]['value']; ?>&#32;<?php print $field_church_state[$node->language][0]['value']; ?>&#32;<?php print $field_church_zipcode[$node->language][0]['value']; ?>">Map</a></td>
		         </tr>
		         <tr>
		         </tr>
		         <tr>
		           <td><strong>Church Office</strong></td>
		           <td>Content</td>
		           <td>Content</td>
		         </tr>
		       </tbody>
		     </table>
		    
	<!-- VIEWS -->
	
<!--		<?php print views_embed_view('church_info', 'block'); ?>-->


		
	    </div> <!--/.six columns-->
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
