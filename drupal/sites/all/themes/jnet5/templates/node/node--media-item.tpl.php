<?php

/**
 * MEDIA ITEMS TPL
 */
?>

<?php if ($content['field_speaker']): ?>
	<h5>By <?php print $content['field_speaker'][0]['#markup']; ?></h5>
<?php endif;?>

<!-- START VIDEO YOUTUBE -->
<?php if (strlen($content['field_youtube_url'][0]['#markup']) > 0): ?>
	<div class="flex-video widescreen">
		<iframe width="560" height="315" src="<?php print str_replace('http://www.youtube.com/watch?v=', 'http://www.youtube.com/embed/', $content['field_youtube_url'][0]['#markup']); ?>?rel=0&amp;hd=1&amp;showinfo=0" frameborder="0" allowfullscreen></iframe>
	</div>
<?php else:?>
	<h3>no youtube video.</h3>
<?php endif;?>
<!-- END VIDEO YOUTUBE -->



<dl class="tabs">
  <dd class="active"><a href="#description">Description</a></dd>
  <dd><a href="#scripture">Scripture</a></dd>
  <dd><a href="#audio">Audio</a></dd>
</dl>


<ul class="tabs-content">
  <li class="active" id="descriptionTab">

  		<strong><?php print $content['field_sermondate'][0]['#markup']; ?></strong>
  		<span>/</span>
  		<em><?php print $content['field_length'][0]['#markup']; ?></em>
  		<br>
  		<a href="http://www.esvbible.org/search/?q=<?php print $content['field_scripture_book'][0]['#markup']; ?>+<?php print $content['field_scripture_reference'][0]['#markup']; ?>"><?php print $content['field_scripture_book'][0]['#markup']; ?> <?php print $content['field_scripture_reference'][0]['#markup']; ?></a>

  		<!--<table>
  			<tr>
  				<td>Speaker:</td>
  				<td><?php print $content['field_speaker'][0]['#markup']; ?></td>
  			</tr>
  			<tr>
  				<td>Date:</td>
  				<td><?php print $content['field_sermondate'][0]['#markup']; ?></td>
  			<tr>
  				<td>Length:</td>
  				<td><?php print $content['field_length'][0]['#markup']; ?></td>
  			</tr>
  			<tr>
  				<td>Scripture:</td>
  				<td><a href="http://www.esvbible.org/search/?q=<?php print $content['field_scripture_book'][0]['#markup']; ?>+<?php print $content['field_scripture_reference'][0]['#markup']; ?>"><?php print $content['field_scripture_book'][0]['#markup']; ?> <?php print $content['field_scripture_reference'][0]['#markup']; ?></a></td>
  			</tr>

  		</table>-->

  		<p><?php print $content['field_description'][0]['#markup']; ?></p>

  </li>
  <li id="scriptureTab">

  	<?php
  	  $key = "IP";
  	  $passage = urlencode($content['field_scripture_book'][0]['#markup'].$content['field_scripture_reference'][0]['#markup']);
  	  $options = "include-passage-references=true&include-audio-link=false";
  	  $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";
  	  $ch = curl_init($url);
  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  	  $response = curl_exec($ch);
  	  curl_close($ch);
  	  print $response;
  	?>


  </li>
  <li id="audioTab"><?php print render($content['field_mp3_audio']); ?></li>
</ul>



