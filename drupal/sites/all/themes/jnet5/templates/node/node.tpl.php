<?php

/**
 * NODE
 */
?>

<div class="row">
    <div class="tweleve columns">
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
			  <?php print render($title_prefix); ?>
			  <?php if (!$page): ?>
			    <?php if (!$page): ?>
			      <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
			    <?php endif; ?>
			  <?php endif; ?>
			  <?php print render($title_suffix); ?>
		
		    <?php
		      // We hide the comments and links now so that we can render them later.
		      // hide($content['comments']);
		      // hide($content['links']);
		      // hide($content['field_tags']);
		      print render($content);
		    ?>
		</div>
	 </div>
</div>
