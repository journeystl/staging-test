<!-- THIS IS FOR PRODUCTION -->
<div>
  <dl class="tabs">
    <dd class="active"><a href="#need-roles">Roles</a></dd>
    <dd><a href="#need-comments">Comments</a></dd>
  </dl>
  <ul class="tabs-content">
    <li class="active" id="need-rolesTab"><?php print views_embed_view('need_items', 'block'); ?></li>
    <li id="need-commentsTab"><?php print views_embed_view('need_responses', 'block'); ?></li>
  </ul>
</div>
