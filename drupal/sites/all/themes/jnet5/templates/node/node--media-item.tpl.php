<?php

/**
 * MEDIA ITEMS TPL
 */
?>

<?php if (!empty($content['field_speaker'])): ?>
	<h5>By <?php print $content['field_speaker'][0]['#markup']; ?></h5>
<?php endif;?>


<dl class="tabs">
<?php if (strlen($content['field_youtube_url'][0]['#markup']) > 0): ?>
  <dd class="active"><a href="#video">Video</a></dd>
  <dd><a href="#audio">Audio</a></dd>
<?php else:?>
  <dd class="active"><a href="#audio">Audio</a></dd>
 <?php endif;?>
  <dd><a href="#description">Description</a></dd>
  <dd><a href="#scripture">Scripture</a></dd>
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

<li class="audio" id="audioTab">
<?php else:?>
	

  <li class="active audio" id="audioTab">
 <?php endif;?> 
  
  <?php print render($content['field_mp3_audio']); ?>
  
  <a class="button radius secondary" href="<?php print $content['field_mp3_audio']['#items'][0]['value']; ?>">Download Audio</a>
  </li>
  
  <li id="descriptionTab">

  		<strong><?php print $content['field_sermondate'][0]['#markup']; ?></strong>
  		<span>/</span>
  		<em><?php print $content['field_length'][0]['#markup']; ?></em>
  		<br>
  		<a href="http://www.esvbible.org/search/?q=<?php print $content['field_scripture_reference'][0]['#markup']; ?>"><?php print $content['field_scripture_reference'][0]['#markup']; ?></a>


  		<p><?php print $content['field_description'][0]['#markup']; ?></p>

  </li>
  <li id="scriptureTab">

  	<?php
  	  $key = "IP";
  	  $passage = urlencode($content['field_scripture_reference'][0]['#markup']);
  	  $options = "include-passage-references=true&include-audio-link=false";
  	  $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";
  	  $ch = curl_init($url);
  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	  $response = curl_exec($ch);
  	  curl_close($ch);
  	  print $response;
  	?>

  </li>
  
</ul>

<p><?php print jnet5_add_this(); ?></p>