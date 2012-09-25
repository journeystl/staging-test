<?php print dpm($fields); ?> 

<div class="panel">
	<div class="blockquote">
		<?php print $fields['field_need_item_description']->content; ?>
	
		<div class="cite">
			<?php print $fields['field_need_item_author_longname']->content; ?>
		</div>
		<a href="<?php print $fields['field_short_url']->content; ?>" class="button tiny radius">Reply</a>
	</div>
</div>