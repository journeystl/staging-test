<div class="row">
    <div class="tweleve columns">
    	<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
    		<div>
    			<?php print jnet5_add_this(); ?>
    			<?php print render($content['body']); ?>
    			<?php print jnet5_add_this(); ?>
    		</div>
		</div>
	</div>
</div>