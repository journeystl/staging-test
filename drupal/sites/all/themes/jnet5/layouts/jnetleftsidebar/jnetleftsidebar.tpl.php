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

	<?php if ($content['top_full']): ?>
		<?php print $content['top_full']; ?>
	<?php endif; ?>
	
	<?php if($content['sidebar'] or $content['main']): ?>
		<div class="row">
		  	<div class="four columns">
		    	<?php print $content['sidebar']; ?>
		  	</div>
	
		  	<div class="eight columns">
		    	<?php print $content['main']; ?>
		  	</div>
	  	</div>
	 <?php endif; ?>
	 
	 
	<?php if ($content['bottom_full']): ?>
		<?php print $content['bottom_full']; ?>
	<?php endif; ?>
		

</div>
