<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
	<hr class="top">
	<?php print render($content['body']); ?>
	<hr class="bottom">
	<?php print jnet5_add_this(); ?>
</div>
