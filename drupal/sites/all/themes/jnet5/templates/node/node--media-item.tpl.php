<?php

/**
 * MEDIA ITEMS TPL
 */
?>

<?php if (isset($title)): ?>
  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>
<?php endif;?>

<?php if (!empty($content['field_speaker'][0]['#markup'])): ?>
  <h5>By <?php print $content['field_speaker'][0]['#markup']; ?></h5>
<?php endif;?>


<dl class="tabs">
<?php if (strlen($content['field_youtube_url'][0]['#markup']) > 0): ?>
  <dd class="active"><a href="#video">Video</a></dd>
  <?php if (isset($content['field_mp3_audio']['#items'][0]['value']) && strlen($content['field_mp3_audio']['#items'][0]['value'])): ?>
    <dd><a href="#audio">Audio</a></dd>
  <?php endif;?>
<?php else:?>
  <?php if (isset($content['field_mp3_audio']['#items'][0]['value']) && strlen($content['field_mp3_audio']['#items'][0]['value'])): ?>
    <dd class="active"><a href="#audio">Audio</a></dd>
  <?php endif;?>
 <?php endif;?>
  <dd><a href="#description">Description</a></dd>
<?php if (isset($content['field_scripture_reference'][0]['#markup']) && strlen($content['field_scripture_reference'][0]['#markup'])): ?>
  <dd class="hide-for-small"><a href="#scripture">Scripture</a></dd>
<?php endif;?>
</dl>

<ul class="tabs-content">

<?php if (strlen($content['field_youtube_url'][0]['#markup']) > 0): ?>
<li class="active" id="videoTab">
	<!-- START VIDEO YOUTUBE -->
	<div class="flex-video widescreen">
		<iframe width="560" height="315" src="<?php print str_replace('http://www.youtube.com/watch?v=', 'http://www.youtube.com/embed/', $content['field_youtube_url'][0]['#markup']); ?>?rel=0&amp;hd=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
	</div>
	<!-- END VIDEO YOUTUBE -->
</li>
<?php if (isset($content['field_mp3_audio']['#items'][0]['value']) && strlen($content['field_mp3_audio']['#items'][0]['value'])): ?>
<li class="audio" id="audioTab">
<?php endif;?>
<?php else:?>

  <?php if (isset($content['field_mp3_audio']['#items'][0]['value']) && strlen($content['field_mp3_audio']['#items'][0]['value'])): ?>
  <li class="active audio" id="audioTab">
  <?php endif;?>
 <?php endif;?>
  <?php if (isset($content['field_mp3_audio']['#items'][0]['value']) && strlen($content['field_mp3_audio']['#items'][0]['value'])): ?>
    <?php print render($content['field_mp3_audio']); ?>

    <a class="button radius secondary" href="<?php print $content['field_mp3_audio']['#items'][0]['value']; ?>">Download Audio</a>
    </li>
  <?php endif;?>

  <li id="descriptionTab">

    <?php
    // Hide misc info from 'stories' media items.
    if ($node->field_series['und'][0]['target_id'] != '13711') {
    ?>

      <strong><?php print $content['field_sermondate'][0]['#markup']; ?></strong>
      <span>/</span>
      <em><?php print $content['field_length'][0]['#markup']; ?></em>
      <br>
      <a href="http://www.esvbible.org/search/?q=<?php print $content['field_scripture_reference'][0]['#markup']; ?>"><?php print $content['field_scripture_reference'][0]['#markup']; ?></a>

    <?php } ?>

  	<p><?php print $content['field_description'][0]['#markup']; ?></p>

  </li>

  <?php if (isset($content['field_scripture_reference'][0]['#markup']) && strlen($content['field_scripture_reference'][0]['#markup'])): ?>
	<li id="scriptureTab">
  <?php
    if (function_exists('curl_init') && isset($content['field_scripture_reference'][0]['#markup']) && strlen($content['field_scripture_reference'][0]['#markup'])) {
      $key = "IP";
      $passage = urlencode($content['field_scripture_reference'][0]['#markup']);
      $options = "include-passage-references=true&include-audio-link=false";
      $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
      $response = curl_exec($ch);
      curl_close($ch);

      print $response;
    }
	?>
  </li>
  <?php endif;?>

</ul>

<p><?php print jnet5_add_this(); ?></p>
