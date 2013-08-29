<?php

/**
 * TODO: Documentation.
 */
class chosen_library implements chosen_library_interface {

  public $directory = 'chosen';
  public $file_name = 'chosen.jquery.min.js';


  public function library() {
    $module_path = drupal_get_path('module', 'chosen');

    return array(
      'title' => 'Drupal Chosen integration',
      'website' => 'http://drupal.org/project/chosen',
      'version' => '1.0',
      'js' => array(
        $module_path . '/chosen.js' => array(),
        array(
          'data' => array(
            'chosen' => array(
              'selector' => variable_get('chosen_jquery_selector', 'select:visible'),
              'minimum' => variable_get('chosen_minimum', 20),
              'minimum_width' => variable_get('chosen_minimum_width', 200),
              'search_contains' => (variable_get('chosen_search_contains', FALSE)) ? TRUE : FALSE,
              'disable_search' => (variable_get('chosen_disable_search', FALSE)) ? TRUE : FALSE,
              'disable_search_threshold' => variable_get('chosen_disable_search_threshold', 0),
              'placeholder_text_multiple' => t(variable_get('chosen_placeholder_text_multiple', 'Choose some options')),
              'placeholder_text_single' => t(variable_get('chosen_placeholder_text_single', 'Choose an option')),
              'no_results_text' => t(variable_get('chosen_no_results_text', 'No results match')),
            ),
          ),
          'type' => 'setting',
        ),
      ),
      'css' => array(
        $module_path . '/css/chosen-drupal.css' => array(),
      ),
      'dependencies' => array(
        array('chosen', 'chosen'),
      ),
    );
  }
}
