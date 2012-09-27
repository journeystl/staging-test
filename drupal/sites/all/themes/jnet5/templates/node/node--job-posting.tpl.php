<?php

/**
 * NODE
 */
?>

<div class="row">
	<div class="eight columns">
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
			<?php print render($title_prefix); ?>
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
			<?php print render($title_suffix); ?>

			<?php
				// We hide the comments and links now so that we can render them later.
				// hide($content['comments']);
				// hide($content['links']);
				// hide($content['field_tags']);
				// print render($content);
				print render($content['body']);
				// dpm($content);
			?>
		</div>
	</div>
	<div class="four columns sidebar">
		<div class="panel">
			<h3>Application Requirements</h3>
			<?php 
				$items = array();
				foreach ($content['field_application_requirements']['#items'] as $item) {
					$items[] = $item['value'];
				}
				print theme('item_list', array('items' => $items));
			?>
		</div>
	</div>
</div>
