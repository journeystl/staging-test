<?php
/**
 * @file
 * Template for a Vertical Tabs panel layout.
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

	<?php if ($content['top']): ?>
		<div class="row">
			<div class="twelve columns">
				<?php print $content['top']; ?>
			</div>
		</div>
	<?php endif; ?>

<!-- keep above -->
	<div class="row">
	
	<?php if ($content['tabs']): ?>		
		<dl class="vertical tabs four columns">
		  <?php print $content['tabs']; ?>
		</dl>	
	<?php endif; ?>
	
	<?php if($content['tab1'] or $content['tab2'] or $content['tab3'] or $content['tab4'] or $content['tab5'] or $content['tab6'] or $content['tab7'] or $content['tab8']): ?>
	<ul class="tabs-content seven columns">
		<?php if ($content['tab1']): ?>
			<?php print $content['tab1']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab2']): ?>
			<?php print $content['tab2']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab3']): ?>
			<?php print $content['tab3']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab4']): ?>
			<?php print $content['tab4']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab5']): ?>
			<?php print $content['tab5']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab6']): ?>
			<?php print $content['tab7']; ?>
		<?php endif; ?>
		
		<?php if ($content['tab8']): ?>
			<?php print $content['tab8']; ?>
		<?php endif; ?>

	</ul>
	<?php endif; ?>

	
	</div> <!-- close row -->
	
<!-- keep below -->

	<?php if ($content['bottom_full']): ?>
		<?php print $content['bottom_full']; ?>
	<?php endif; ?>


  	<?php if ($content['bottom']): ?>
	  	<div class="row">
	  		<div class="twelve columns">
  			 	<?php print $content['bottom']; ?>
	  		</div>
	  	</div>
	<?php endif; ?>

</div>
