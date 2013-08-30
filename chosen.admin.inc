<?php

/**
 * @file
 * Chosen administration pages.
 */

/**
 * Returns with the general configuration form.
 */
function chosen_admin_settings($form, &$form_state) {


    ctools_include('plugins');
  foreach (ctools_get_plugins('chosen', 'library') as $plugin => $plugin_settings) {
    $chosen_plugins[$plugin] = $plugin_settings['name'];
    $chosen_descriptions[$plugin] = $plugin_settings['description'];
  }

    $form['chosen_plugin'] = array(
      '#type' => 'select',
      '#title' => t('Select library chosen should use'),
      '#options' => $chosen_plugins,
      '#default_value' => variable_get('chosen_active_plugin', 'chosen'),
      '#description' => $chosen_descriptions[variable_get('chosen_active_plugin', 'chosen')],
    );


  foreach (ctools_get_plugins('chosen', 'library') as $plugin_name => $plugin_settings) {
    $plugin_class_name = ctools_plugin_load_class('chosen', 'library', $plugin_name, 'class');
    $plugin = new $plugin_class_name();

    $default_values = variable_get('chosen_' . $plugin_name);

    $form[$plugin_name] = array(
      '#type' => 'fieldset',
      '#title' => t($plugin_settings['name'] . ' options'),
      '#states' => array(
        'visible' => array(
          'select[name="chosen_plugin"]' => array('value' => $plugin_name),
        ),
      ),
    );

    // TODO: attach default values (existing values).
    // TODO: Add prefix.
    // TODO: Save values per plugin in a single variable.
    $fields = array_flatten($plugin->options($default_values), $plugin_name);
    dsm($fields);
    foreach ($fields as $option => $values) {
      // Iterate through $values, check if it has ?
      $form[$plugin_name][$plugin_name . '_' . $option] = $values;
    }
  }

  return system_settings_form($form);
}


// TODO: NOt loose the hirarchiy.
function array_flatten($array, $plugin_name) {

   $return = array();
   foreach ($array as $key => $value) {
       if (is_array($value) && !isset($value['#default_value'])){
        $return = array_merge($return, array_flatten($value, $plugin_name));
      }
      else if(!isset($value['#default_value'])) {
        continue;
      }
       else {
        $return[$plugin_name . '_' . $key] = $value;
        }
   }
   return $return;

}
