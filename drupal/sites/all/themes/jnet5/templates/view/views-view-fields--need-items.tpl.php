
<div class="row">
<div class="need-item eight columns mobile-three"><?php print $fields['field_need_item_description']->content; ?></div>
<?php
  if (!empty($fields['field_need_item_author_longname']->content)) {
    $action = '<div class="four columns mobile-one"><a href="javascript:;" class="button tiny radius secondary disabled">' . $fields['field_need_item_author_longname']->content . '</a></div>';
  } else {
    $action = '<div class="four columns mobile-one"><a href="' . $fields['field_short_url']->content . '" class="button tiny radius">I Can Help!</a></div>';
  }
  print $action;
?>
</div>
