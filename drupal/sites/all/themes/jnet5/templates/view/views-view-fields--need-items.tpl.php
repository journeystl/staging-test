
<span class="need-item three columns"><?php print $fields['field_need_item_description']->content; ?></span>
<?php
  if (!empty($fields['field_need_item_author_longname']->content)) {
    $action = '<span class="one column"><a href="javascript:;" class="button tiny radius secondary disabled">' . $fields['field_need_item_author_longname']->content . '</a></span>';
  } else {
    $action = '<span class="one column"><a href="' . $fields['field_short_url']->content . '" class="button tiny radius">I Can Help!</a></span>';
  }
  print $action;
?>
