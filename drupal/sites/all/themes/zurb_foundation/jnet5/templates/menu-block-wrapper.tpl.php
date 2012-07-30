<?php
/**
 * @file
 * Default theme implementation to wrap menu blocks.
 *
 * Available variables:
 * - $content: The renderable array containing the menu.
 * - $classes: A string containing the CSS classes for the DIV tag. Includes:
 *   menu-block-DELTA, menu-name-NAME, parent-mlid-MLID, and menu-level-LEVEL.
 * - $classes_array: An array containing each of the CSS classes.
 *
 * The following variables are provided for contextual information.
 * - $delta: (string) The menu_block's block delta.
 * - $config: An array of the block's configuration settings. Includes
 *   menu_name, parent_mlid, title_link, admin_title, level, follow, depth,
 *   expanded, and sort.
 *
 * @see template_preprocess_menu_block_wrapper()
 */


?>


<?php print render($content); ?>

<!--
<ul class="nav-bar">
  <li class="active"><a href="#">Nav Item 1</a></li>
  <li class="has-flyout">
    <a href="#">Nav Item 2</a>
    <a href="#" class="flyout-toggle"><span> </span></a>
    <ul class="flyout">
      <li><a href="#">Sub Nav 1</a></li>
      <li><a href="#">Sub Nav 2</a></li>
      <li><a href="#">Sub Nav 3</a></li>
    </ul>
  </li>

</ul>
-->
