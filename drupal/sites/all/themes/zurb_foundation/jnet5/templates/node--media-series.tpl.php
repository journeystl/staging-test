<?php

/**
 * MEDIA SERIES TPL
 */
?>

<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <h1<?php print $title_attributes; ?>><?php print $title; ?></h1>


  <?php if ($display_submitted): ?>
    <div class="posted">
      <?php if ($user_picture): ?>
        <?php print $user_picture; ?>
      <?php endif; ?>
      <?php print $submitted; ?>
    </div>
  <?php endif; ?>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      hide($content['field_tags']);
      print render($content);
    ?>
  <div class="terms-links">
    <?php if (($content['field_tags']) && !$is_front): ?>
      <div class="tags">
        <?php print render($content['field_tags']) ?>
     </div>
    <?php endif; ?>
    <?php print render($content['links']); ?>
  </div>
  <?php print render($content['comments']); ?>

</div>
