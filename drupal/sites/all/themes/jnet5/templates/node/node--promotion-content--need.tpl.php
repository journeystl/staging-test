<!-- NEED -->

		

<div class="row">
    <div class="tweleve columns">
    
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
		
		<div class="row">
			<div class="eight columns">
				<h1<?php if($title_attributes)print $title_attributes; ?>><?php if($title)print $title; ?></h1>
				<?php if ($content['field_author_longname']): ?>
					<h6>By <?php print render($content['field_author_longname'][0]['#markup']); ?></h6>
				<?php endif;?>
				<span class="label secondary radius"><?php print render(ucfirst($content['field_type'][0]['#markup'])); ?></span>
			</div> <!--/.eight columns-->
		
			<div class="four columns">
				<a href="<?php print render($content['field_short_url'][0]['#markup']); ?>" class="button large radius">I Can Help! <span class="label secondary radius">3</span></a>
			</div>
		</div> <!--/.row-->
		
		<hr>
		
		<div>
			<?php print jnet5_add_this(); ?>
			<?php print render($content['body']); ?>
			<?php print jnet5_add_this(); ?>
		</div>
		
		
		</div>
	</div>
</div>