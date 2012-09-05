
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
<div class="row">
  <div class="panel twelve columns">
  	<div class="row">
  		<div class="six columns">
		    <h1<?php if($title_attributes)print $title_attributes; ?>><?php if($title)print $title; ?></h1>
		    <h6>By <?php print render($content['field_author_longname'][0]['#markup']); ?></h6>
		    <span class="label secondary radius"><?php print render(ucfirst($content['field_type'][0]['#markup'])); ?></span>
		</div> <!--/.five columns-->
		<div class="four columns">
			<div><?php print render($content['field_event_starting_at'][0]['#markup']); ?></div>
			<div><?php print render($content['field_event_address_street'][0]['#markup']); ?></div>
			<div><?php print render($content['field_event_address_city'][0]['#markup']); ?>
			<?php print render($content['field_event_address_state'][0]['#markup']); ?> 
			<?php print render($content['field_event_address_zip'][0]['#markup']); ?></div>
			<a href="#" class="button tiny secondary radius">Map It</a>
		</div> <!--/.four columns-->
		
		<div class="two columns">
			<a href="<?php print render($content['field_short_url'][0]['#markup']); ?>" class="button radius large">RSVP  <span class="label round secondary">3</span></a>
		</div> <!--/.two columns-->
		    
		    
  </div> <!--/.panel-->
</div> <!--/.row-->
<hr>

<?php print render($content['body']); ?>
		



	
	
<!--    <?php print render($content); ?>-->
  

</div>