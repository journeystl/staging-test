<?php

/**
 * VISIT "This Weekend" Modals
 */
?>


<?php
// Build Schedule stuff
if (isset($_GET['show_schedule'])) {
	print
	'<div id="scheduleModal_' . $output . '" class="schedule reveal-modal xlarge">' .
		jnet5_get_schedule($output, 'short') .
	  '<a class="close-reveal-modal">&#215;</a>
	</div>';

}
?>