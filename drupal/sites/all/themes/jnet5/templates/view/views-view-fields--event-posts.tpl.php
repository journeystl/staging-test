<?php print dpm($fields); ?> 

<div class="panel">
	<div class="blockquote">
		<?php print $fields['field_event_note_body']->content; ?>
	
		<div class="cite">
			<?php print $fields['field_event_note_author_longname']->content; ?>
		</div>
		<a href="<?php print $fields['field_short_url']->content; ?>" class="button tiny radius">Reply</a>
	</div>
</div>