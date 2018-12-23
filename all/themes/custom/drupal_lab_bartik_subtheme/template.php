<?php

/**
 * Implements hook_library().
 */
function drupal_lab_bartik_subtheme_library()
{
    // The ziehharmonika library .
    $libraries['ziehharmonika'] = [
        'title' => 'Ziehharmonika',
        'website' => 'https://github.com/Arcwise/ziehharmonika',
        'version' => 'alpha3',
        'js' => [
            'sites/all/libraries/ziehharmonika/src/ziehharmonika.js' => [],
        ],
        'css' => [
            'sites/all/libraries/ziehharmonika/src/ziehharmonika.css' => [],
        ],
    ];
    return $libraries;
}

/**
 * Implements hook_preprocess_views_view().
 */
function drupal_lab_bartik_subtheme_preprocess_views_view(&$variables)
{
    // Added Ziehharmonika css and js files for FAQ view.
    if ($variables['name'] == 'faq') {
        drupal_add_library('drupal_lab_bartik_subtheme', 'ziehharmonika');
        drupal_add_js('sites/all/themes/custom/drupal_lab_bartik_subtheme/js/drupal-lab-bartik-subtheme.js', [
            'group' => JS_THEME,
        ]);
        drupal_add_css('sites/all/themes/custom/drupal_lab_bartik_subtheme/css/drupal-lab-bartik-subtheme.css', [
            'group' => CSS_THEME,
        ]);
    }
}
