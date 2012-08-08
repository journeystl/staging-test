<?php

/**
 * STATIC CODE
 */
?>

<div class="row">
	<div class="eight columns">
		<h1> <?php print($title); ?></h1>
		<h5>By <?php print $content['field_speaker'][0]['#markup']; ?></h5>
	</div>

	<div class="four columns">
		<ul class="button-group [radius, rounded]">
		  <li><a href="#" class="button tiny secondary radius">Like  <span class="label round secondary" style="top:1px;margin-left:5px;background-color:#D0D0D0;">10</span></a></li>
		  <li><a href="#" class="button tiny radius">Tweet  <span class="label round secondary" style="top:1px;margin-left:5px;background-color:#96d5e8;">2</span></a></li>
		  <li><a href="#" class="button tiny alert radius">+1  <span class="label round secondary" style="top:1px;margin-left:5px;background-color:#f4787b;">1</span></a></li>
		</ul>

	</div>
</div> <!--/.row-->

<div class="row">
	<div class="eight columns">
		<div class="flex-video">
			<iframe width="560" height="315" src="<?php print $content['field_youtube_url'][0]['#markup']; ?>" frameborder="0" allowfullscreen></iframe>


		</div>

		<dl class="tabs">
		  <dd class="active"><a href="#description">Description</a></dd>
		  <dd><a href="#scripture">Scripture</a></dd>
		  <dd><a href="#audio">Audio</a></dd>
		</dl>

		<ul class="tabs-content">
		  <li class="active" id="description">
		  
		  		<table>
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
		  			
		  		</table>
		  		

	    	<div>
	    		<p><?php print $content['body'][0]['#markup']; ?></p>

	    	</div>

		  </li>
		  <li id="scripture">
		  	<?php
		  	  $key = "IP";
		  	  $passage = urlencode("mark 1:1-20");
		  	  $options = "include-passage-references=true";
		  	  $url = "http://www.esvapi.org/v2/rest/passageQuery?key=$key&passage=$passage&$options";
		  	  $ch = curl_init($url); 
		  	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		  	  $response = curl_exec($ch);
		  	  curl_close($ch);
		  	  print $response;
		  	?>
		  
		  
		  </li>
		  <li id="audio">This is simple tab 3's content. It's, you know...okay.</li>
		</ul>


	</div>

	<div class="four columns">
	
	
		<h2>Jesus &amp;</h2>
			<ul class="nav-bar vertical">
			  <li class="active"><a href="#"><?php print $content['field_part'][0]['#markup']; ?> - Jesus &amp; Mission</a></li>
			  <li><a href="#">Part 2 - Jesus &amp; Church</a></li>
			  <li><a href="#">Part 3 - Jesus &amp; Sabbath</a></li>
			  <li><a href="#">Part 4 - Jesus &amp; Losers</a></li>
			</ul>
		<a href="#"><h4>All Sermons</h4>
	
	
	</div>


</div>







</div>
