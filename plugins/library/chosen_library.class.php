<?php

/**
 * TODO: Documentation.
 */
class chosen_library implements chosen_library_interface {

  public $title = 'Chosen';
  public $website = 'http://harvesthq.github.com/chosen';
  public $version = '0.10.0';
  public $directory = 'chosen';
  public $library_name = 'chosen';
  public $file_name = 'chosen.jquery.min.js';
  public $css = 'chosen.css';


  public function options($default_values) {
    $form = array();
    // dsm($default_values);


  $form['minimum_single'] = array(
    '#type' => 'select',
    '#title' => t('Minimum number of options for single select'),
    '#options' => drupal_map_assoc(array_merge(array('0' => t('Always Apply')), range(1, 25))),
    '#default_value' => isset($default_values['minimum_single']) ? $default_values['minimum_single'] : 20,
    '#description' => t('The minimum number of options to apply Chosen for single select fields. Example : choosing 10 will only apply Chosen if the number of options is greater or equal to 10.')
  );

  $form['minimum_multiple'] = array(
    '#type' => 'select',
    '#title' => t('Minimum number of options for multi select'),
    '#options' => drupal_map_assoc(array_merge(array('0' => t('Always Apply')), range(1, 25))),
    '#default_value' => isset($default_values['minimum_multiple']) ? $default_values['minimum_multiple'] : 20,
    '#description' => t('The minimum number of options to apply Chosen for multi select fields. Example : choosing 10 will only apply Chosen if the number of options is greater or equal to 10.')
  );

  $form['disable_search_threshold'] = array(
    '#type' => 'select',
    '#title' => t('Minimum number to show Search on Single Select'),
    '#options' => drupal_map_assoc(array_merge(array('0' => 'Never Apply'), range(1, 25))),
    '#default_value' => isset($default_values['disable_search_threshold']) ? $default_values['disable_search_threshold'] : 0,
    '#description' => t('The minimum number of options to apply Chosen search box. Example : choosing 10 will only apply Chosen search if the number of options is greater or equal to 10.')
  );

  $form['minimum_width'] = array(
    '#type' => 'textfield',
    '#title' => t('Minimum width of widget'),
    '#field_suffix' => 'px',
    '#required' => TRUE,
    '#size' => 3,
    '#default_value' => isset($default_values['minimum_width']) ? $default_values['minimum_width'] : 200,
    '#description' => t('The minimum width of the Chosen widget.'),
  );

  $form['jquery_selector'] = array(
    '#type' => 'textarea',
    '#title' => t('Apply Chosen to the following elements'),
    '#description' => t('A comma-separated list of jQuery selectors to apply Chosen to, such as <code>select#edit-operation, select#edit-type</code> or <code>.chosen-select</code>. Defaults to <code>select</code> to apply Chosen to all <code>&lt;select&gt;</code> elements.'),
    '#default_value' => isset($default_values['jquery_selector']) ? $default_values['jquery_selector'] : 'select:visible',
  );

  $form['options'] = array(
    '#type' => 'fieldset',
    '#title' => t('Chosen options'),
  );
  $form['options']['search_contains'] = array(
    '#type' => 'checkbox',
    '#title' => t('Search also in the middle of words'),
    '#default_value' => isset($default_values['search_contains']) ? $default_values['search_contains'] : FALSE,
    '#description' => t('Per default chosen searches only at beginning of words. Enable this option will also find results in the middle of words.
      Example: Search for <em>land</em> will also find <code>Switzer<strong>land</strong></code>.'),
  );
  $form['options']['disable_search'] = array(
    '#type' => 'checkbox',
    '#title' => t('Disable search box'),
    '#default_value' => isset($default_values['disable_search']) ? $default_values['disable_search'] : FALSE,
    '#description' => t('Enable or disable the search box in the results list to filter out possible options.'),
  );
  $form['options']['use_theme'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use the default chosen theme'),
    '#default_value' => isset($default_values['use_theme']) ? $default_values['use_theme'] : TRUE,
    '#description' => t('Enable or disable the default chosen CSS file. Disable this option if your theme contains custom styles for Chosen replacements.'),
  );

  $form['strings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Chosen strings'),
  );
  $form['strings']['placeholder_text_multiple'] = array(
    '#type' => 'textfield',
    '#title' => t('Placeholder text of multiple selects'),
    '#required' => isset($default_values['placeholder_text_multiple']) ? $default_values['placeholder_text_multiple'] : TRUE,
    '#default_value' => 'Choose some options',
  );
  $form['strings']['placeholder_text_single'] = array(
    '#type' => 'textfield',
    '#title' => t('Placeholder text of single selects'),
    '#required' => isset($default_values['placeholder_text_single']) ? $default_values['placeholder_text_single'] : TRUE,
    '#default_value' => 'Choose an option',
  );
  $form['strings']['no_results_text'] = array(
    '#type' => 'textfield',
    '#title' => t('No results text'),
    '#required' => isset($default_values['no_results_text']) ? $default_values['no_results_text'] : TRUE,
    '#default_value' => 'No results match',
  );

    return $form;
  }

}
