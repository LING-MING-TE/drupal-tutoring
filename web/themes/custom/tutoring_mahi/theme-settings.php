<?php

/**
 * @file
 * Theme settings for Tutoring Mahi subtheme.
 */

use Drupal\Core\Form\FormStateInterface;

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function tutoring_mahi_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  // Inherit parent theme settings form from mahipro
  // This ensures the form is properly processed for tutoring_mahi theme

  // You can add custom settings here for the subtheme if needed
  // Example:
  // $form['tutoring_mahi_custom'] = [
  //   '#type' => 'details',
  //   '#title' => t('Tutoring Mahi Custom Settings'),
  //   '#group' => 'mahipro',
  // ];
}
