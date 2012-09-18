<?php
/**
 * @file
 * Template for a 2 column panel layout.
 *
 * This template provides a two column panel display layout, with
 * each column roughly equal in width.
 *
 * Variables:
 * - $id: An optional CSS id to use for the layout.
 * - $content: An array of content, each item in the array is keyed to one
 *   panel of the layout. This layout supports the following sections:
 *   - $content['left']: Content in the left column.
 *   - $content['right']: Content in the right column.
 */
?>
<div <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	
	<?php if ($content['top']): ?>
		<?php print $content['top']; ?>
		<hr class="top">
	<?php endif; ?>
	
	<?php if($content['left1'] or $content['right1']): ?>
		<div class="row">
		  	<div class="six columns">
		    	<?php print $content['left1']; ?>
		  	</div>
	
		  	<div class="six columns">
		    	<?php print $content['right1']; ?>
		  	</div>
	  	</div>
	  	<hr class="top">
	 <?php endif; ?>
	 
	 <?php if ($content['middle']): ?>
	 	<div class="row">
	 		<div class="twelve columns">
	 			<?php print $content['middle']; ?>
	 		</div>
	 	</div>
	 	<hr class="top">
	 <?php endif; ?>
	 
	<?php if($content['left2'] or $content['right2'] or $content['middle2']): ?>
		<div class="row">
		  	<div class="four columns">
		    	<?php print $content['left2']; ?>
		  	</div>
		  	
		  	<div class="four columns">
		  		<?php print $content['middle2']; ?>
		  	</div>
	
		  	<div class="four columns">
		    	<?php print $content['right2']; ?>
		  	</div>
	  	</div>
	  	<hr class="top">
	 <?php endif; ?>
	  
	  <?php if($content['left3'] or $content['right3']): ?>
	  	<div class="row">
	  	  	<div class="six columns">
	  	    	<?php print $content['left3']; ?>
	  	  	</div>
	  
	  	  	<div class="six columns">
	  	    	<?php print $content['right3']; ?>
	  	  	</div>
	    </div>
	    <hr class="top">
	   <?php endif; ?>
	   
	   <?php if($content['left4'] or $content['right4']): ?>
	   	<div class="row">
	   	  	<div class="six columns">
	   	    	<?php print $content['left4']; ?>
	   	  	</div>
	   
	   	  	<div class="six columns">
	   	    	<?php print $content['right4']; ?>
	   	  	</div>
	    </div>
	    <hr class="top">
	    <?php endif; ?>
	    
	    <?php if($content['left5'] or $content['right5']): ?>
	    	<div class="row">
	    	  	<div class="six columns">
	    	    	<?php print $content['left5']; ?>
	    	  	</div>
	    
	    	  	<div class="six columns">
	    	    	<?php print $content['right5']; ?>
	    	  	</div>
	      	</div>
	      	<hr class="top">
	     <?php endif; ?>
	 
	 
  	<?php if ($content['bottom']): ?>
	  	<div class="row">
	  		<div class="twelve columns">
  			 	<?php print $content['bottom']; ?>
	  		</div>
	  	</div>
	<?php endif; ?>
</div>
