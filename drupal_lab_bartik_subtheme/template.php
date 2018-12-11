<?php

/**
 * Override or insert variables into the node template.
 *
 * @param $variables
 */

function drupal_lab_bartik_subtheme_preprocess_node(&$variables) {

  // Added a variable for node via creation date.

  $variables['creation_date'] = NULL;
  if ($variables['node']->created) {
    $variables['creation_date'] = format_date($variables['node']->created, 'custom', 'j M Y, H:i');
  }

  // Added a variable for name node author.
  $variables['author_name'] = $variables['name'];
}
