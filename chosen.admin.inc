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
  foreach (ctools_get_plugins('chosen', 'library') as $plugin_name => $plugin_settings) {
    $default_values[$plugin_name] = variable_get('chosen_' . $plugin_name);
  }
  $form = array_merge($form, chosen_generate_forms($default_values));

  return system_settings_form($form);
}