TOPIC

<?php hide($content); ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  
    <h1<?php if($title_attributes)print $title_attributes; ?>><?php if($title)print $title; ?></h1>
    <h4>By <?php print render($content['field_author_longname']); ?></h4>
    <?php render($content['field_type']); ?>
	



	<?php dpm(get_defined_vars()); ?>
	
<!--    <?php print render($content); ?>-->
  

</div>