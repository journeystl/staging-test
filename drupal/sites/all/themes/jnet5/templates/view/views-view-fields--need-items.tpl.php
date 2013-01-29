<ul class="tabs-content">
  <li class="active" id="need-rolesTab">
        <?php print $fields['field_need_item_description']->content; ?>

          <?php

            if (!empty($fields['field_need_item_author_longname']->content)) {
              $respondee = $fields['field_need_item_author_longname']->content;
              $need_action = '<a class="button tiny radius secondary disabled" href="javascript:;">' . $respondee . '</a>';
            } else {
              $need_action = '<a href="' . $fields['field_short_url']->content . '" class="button tiny radius">I Can Help!</a>';
            }

            print $need_action;



            ?>
  </li>
  <li id="need-commentsTab">
    <div class="panel">
      <div class="blockquote">
        <?php print $fields['field_need_response_body']->content; ?>
        <div class="cite">
          <?php print $fields['field_need_response_author_longname']->content; ?>
        </div>
        <a href=" <?php print $fields['field_short_url']->content; ?> " class="button tiny radius">Reply</a>
      </div>
    </div>
  </li>
</ul>

