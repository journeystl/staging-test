<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>

<div class="row">
	<h2 class="two columns"><i class="g-foundicon-refresh"></i> News</h2>
	<div class="ten columns">
		<div id="News">
		<?php foreach ($rows as $id => $row): ?>
		  <div class="<?php print $classes_array[$id]; ?>">
		    <?php print $row; ?>
		  </div>
		<?php endforeach; ?>
		</div>
	</div>

</div>

<script type="text/javascript">
(function ($) {$(document).ready(function() {
  $(window).load(function() {
    $('#News').orbit({
			animation: 'horizontal-push', // fade, horizontal-slide, vertical-slide, horizontal-push
			animationSpeed: 800, // how fast animtions are
			timer: true, // true or false to have the timer
			resetTimerOnClick: false, // true resets the timer instead of pausing slideshow progress
			advanceSpeed: 2000, // if timer is enabled, time between transitions
			pauseOnHover: true, // if you hover pauses the slider
			startClockOnMouseOut: true, // if clock should start on MouseOut
			startClockOnMouseOutAfter: 500, // how long after MouseOut should the timer start again
			directionalNav: true, // manual advancing directional navs
			captions: false, // do you want captions?
			captionAnimation: 'fade', // fade, slideOpen, none
			captionAnimationSpeed: 800, // if so how quickly should they animate in
			bullets: false, // true or false to activate the bullet navigation
			bulletThumbs: false, // thumbnails for the bullets
			bulletThumbLocation: '', // location from this file where thumbs will be
			fluid: '25x1' // or set a aspect ratio for content slides (ex: '4x3')
    });
  });
});})(jQuery);
</script>
