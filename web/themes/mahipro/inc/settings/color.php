<?php
/**
 * Color Settings
 */
$form['colors']['color_info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Color Scheme Settings'),
    '#description'   => t('These settings adjust the look and feel of the theme. Changing the color below will change the color of MahiPro theme.'),
  ];
  $form['colors']['color_scheme_option'] = [
    '#type' => 'fieldset',
    '#title' => t('Color Scheme'),
  ];
  $form['colors']['color_scheme_option']['color_scheme'] = [
    '#type'          => 'select',
    '#title' => t('Select Color Scheme'),
    '#options' => array(
      'color_default' => t('Default'),
      'color_custom' => t('Custom'),
      ),
    '#default_value' => theme_get_setting('color_scheme', 'mahipro'),
    '#description'   => t('Default will set the theme to default color scheme. Custom will set the theme color as set below.')
  ];
  $form['colors']['color_custom'] = [
    '#type' => 'fieldset',
    '#title' => t('Custom Color Scheme'),
    '#description'   => t('Customize color of the theme. This will work if you have selected <strong>Custom</strong> color scheme above.')
  ];
  $form['colors']['color_custom']['color_primary'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('color_primary', 'mahipro'),
    '#title'       => t('Primary Color'),
    '#default_value' => theme_get_setting('color_primary', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#F1426C</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['color_secondary'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('color_secondary', 'mahipro'),
    '#title'       => t('Secondary Color'),
    '#default_value' => theme_get_setting('color_secondary', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#E9AB0D</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['color_primary_light'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('color_primary_light', 'mahipro'),
    '#title'       => t('Primary Color Light'),
    '#default_value' => theme_get_setting('color_primary_light', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#FFF0F4</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['bg_body'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('bg_body', 'mahipro'),
    '#title'       => t('Body Background Color'),
    '#default_value' => theme_get_setting('bg_body', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#ffffff</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['text_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('text_color', 'mahipro'),
    '#title'       => t('Text Color'),
    '#default_value' => theme_get_setting('text_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#4A4A4A</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['bold_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('bold_color', 'mahipro'),
    '#title'       => t('Heading Color'),
    '#default_value' => theme_get_setting('bold_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#222222</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['light_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('light_color', 'mahipro'),
    '#title'       => t('Light Color'),
    '#default_value' => theme_get_setting('light_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#FFFBF6</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['dark_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('dark_color', 'mahipro'),
    '#title'       => t('Dark Color'),
    '#default_value' => theme_get_setting('dark_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#1F2433</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['dark_text_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('dark_text_color', 'mahipro'),
    '#title'       => t('Text Color on Dark Background'),
    '#default_value' => theme_get_setting('dark_text_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#C3C3C3</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['border_color'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('border_color', 'mahipro'),
    '#title'       => t('Line and Border Color'),
    '#default_value' => theme_get_setting('border_color', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#B5B6BE</strong></p><p><hr /></p>'),
  ];
  $form['colors']['color_custom']['border_dark'] = [
    '#type'        => 'color',
    '#field_suffix' => theme_get_setting('border_dark', 'mahipro'),
    '#title'       => t('Line and Border Color on Dark Background'),
    '#default_value' => theme_get_setting('border_dark', 'mahipro'),
    '#description' => t('<p>Default value is <strong>#3D4353</strong></p><p><hr /></p>'),
  ];
