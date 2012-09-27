<?php

/**
 * NODE
 */
?>

<div class="row">
	<?php dpm($content); ?>
	<div class="eight columns">
		<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
			<?php print render($title_prefix); ?>
			<h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
			<?php print render($title_suffix); ?>

			<?php print render($content['body']); ?>
		</div>
	</div>
	<div class="four columns sidebar">
		<div class="panel">
			<h4>Status: <?php print $content['field_status']['#items'][0]['value']; ?></h4>

			<h4>Church: <?php print $content['field_church'][0]['#markup']; ?></h4>

			<h4>Job Type</h4>
			<?php 
				$items = array();
				foreach ($content['field_job_type']['#items'] as $item) {
					if (isset($item)) {
						$items[] = $item['value'];
					}
				}
				print theme('item_list', array('items' => $items));
			?>

			<!-- <h4>Team</h4> -->
			<?php 
				/* $items = array();
				foreach ($content['field_team']['#items'] as $item) {
					if (isset($item)) {
						$items[] = $item['value'];
					}
				}
				print theme('item_list', array('items' => $items)); */
			?>
		</div>
		<div class="panel">
			<h4>Application Requirements</h4>
			<?php 
				$items = array();
				foreach ($content['field_application_requirements']['#items'] as $item) {
					if (isset($item)) {
						$items[] = $item['value'];
					}
				}
				print theme('item_list', array('items' => $items));
			?>
		</div>
	</div>
</div>
