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

		<!-- Lockerz Share BEGIN -->
		<div class="a2a_kit a2a_default_style">
		<a class="a2a_dd" href="http://www.addtoany.com/share_save">Share</a>
		<span class="a2a_divider"></span>
		<a class="a2a_button_facebook"></a>
		<a class="a2a_button_twitter"></a>
		<a class="a2a_button_email"></a>
		</div>
		<script type="text/javascript" src="http://static.addtoany.com/menu/page.js"></script>
		<!-- Lockerz Share END -->

	</div>
</div> <!--/.row-->

<div class="row">
	<div class="eight columns">
		<div class="flex-video">

<?php
print views_embed_view('purl_test', 'block_1', $active_campus);
?>

		</div>

		<dl class="tabs">
		  <dd class="active"><a href="#description">Description</a></dd>
		  <dd><a href="#scripture">Scripture</a></dd>
		  <dd><a href="#audio">Audio</a></dd>
		</dl>

		<ul class="tabs-content">
		  <li class="active" id="description">
		  	<dl>
		  		<dt>Speaker</dt>
		  		    <dd>Darrin Patrick</dd>
		  		<dt>Date</dt>
		  		    <dd>09-10-2011</dd>
		  		<dt>Length</dt>
		  		    <dd>45 Minutes, 28 Seconds</dd>
		  		<dt>Scripture</dt>
		  		    <dd><a href="http://www.esvbible.org/Mark+1.1-20/">Mark 1:1-20 (ESV)</a></dd>
		  	</dl>
	    	<div>
	    		<p>In this message, Pastor Darrin talks about how Jesus' example shows us how to be the Church in our city.</p>

	    	</div>

		  </li>
		  <li id="scripture">This is simple tab 2's content. Now you see it!</li>
		  <li id="audio">This is simple tab 3's content. It's, you know...okay.</li>
		</ul>


	</div>

	<div class="four columns">
		<h2>Jesus &amp;</h2>
		<dl class="tabs vertical hide-on-phones">
			<dd class="active"><a href="index.php"><h5>Part 1</h5><h6>Jesus &amp; Mission</h6></a></dd>
			<dd><a href="index.php"><h5>Part 2</h5><h6>Jesus &amp; Church</h6></a></dd>
			<dd><a href="index.php"><h5>Part 3</h5><h6>Jesus &amp; Sabbath</h6></a></dd>
		</dl>
		<dl class="tabs vertical hide-on-phones">
			<dd><a href="index.php"><h5>All Sermons</h5></a></dd>
		</dl>
	</div>


</div>







</div>
