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

			<?php print render($content['body']); ?>
		</div>
	</div>
	<div class="four columns sidebar">
		<div class="panel">
			<h5>Status: <?php print $content['field_status']['#items'][0]['value']; ?></h5>

			<h5>Church: <?php print $content['field_church'][0]['#markup']; ?></h5>

			 
			<?php 
				$items = array();
				if (isset($content['field_team']['#items'])) {
					foreach ($content['field_team']['#items'] as $item) {
						if (isset($item)) {
							$items[] = $item['value'];
						}
					}
					if (count($items)) { print "<h5>Team: " . implode($items, ", ") . "</h5>"; }
				}
			?>

			<h5>Job Type</h5>
			<?php 
				$items = array();
				foreach ($content['field_job_type']['#items'] as $item) {
					if (isset($item)) {
						$items[] = $item['value'];
					}
				}
				print theme('item_list', array('items' => $items));
			?>
		</div>
		<div class="panel">
			<h5>Application Requirements</h5>
			<p>To apply for this position, please send the following to <a href="mailto:jobs@journeyon.net">jobs@journeyon.net</a> :</p>
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
