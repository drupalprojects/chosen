<?php

/**
 * TODO: Documentation.
 */
class select2_library implements chosen_library_interface {

  public $title = 'Select2';
  public $website = 'http://ivaynberg.github.io/select2';
  public $version = '3.42.0';
  public $directory = 'select2';
  public $library_name = 'select2';
  public $file_name = 'select2.jquery.min.js';
  public $css = 'select2.css';


  public function options($default_values = array()) {
    $form = array();



    $form['minimum_single'] = array(
      '#type' => 'select',
      '#title' => t('Minimum number of options for single select'),
      '#options' => drupal_map_assoc(array_merge(array('0' => t('Always Apply')), range(1, 25))),
      '#default_value' => isset($default_values['minimum_single']) ? $default_values['minimum_single'] : 20,
      '#description' => t('The minimum number of options to apply Chosen for single select fields. Example : choosing 10 will only apply Chosen if the number of options is greater or equal to 10.')
    );

    return $form;
  }

}
