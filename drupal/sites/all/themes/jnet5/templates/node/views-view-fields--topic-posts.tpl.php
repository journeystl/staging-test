<?php //print dpm($fields); ?> 

<div class="panel">
	<div class="blockquote">
		<?php print $fields['field_topic_post_body']->content; ?>
	
		<div class="cite">
			<?php print $fields['field_topic_post_author_longname']->content; ?>
		</div>
		<a href="<?php print $fields['field_short_url']->content; ?>" class="button tiny radius">Reply</a>
	</div>


</div>