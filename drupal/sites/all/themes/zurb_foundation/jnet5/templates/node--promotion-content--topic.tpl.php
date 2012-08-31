TOPIC
<?php dpm(get_defined_vars()); ?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  
    <h1<?php if($title_attributes)print $title_attributes; ?>><?php if($title)print $title; ?></h1>
    <h6>By <?php print render($content['field_author_longname'][0]['#markup']); ?></h6>
    <span class="label secondary radius"><?php print render(ucfirst($content['field_type'][0]['#markup'])); ?></span>
    <hr>
    <div><?php print render($content['body']); ?></div>
	



	
	
<!--    <?php print render($content); ?>-->
  

</div>