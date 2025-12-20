<?php
use Drupal\Core\Form\FormStateInterface;
/**
 * @file
 * Custom setting for Mahi Pro theme.
 */
function mahipro_form_system_theme_settings_alter(&$form, FormStateInterface $form_state) {
  $form['#attached']['library'][] = 'mahipro/theme-settings';
  $ver = '1.1.1';
  $theme_update_info = file_get_contents("https://drupar.com/theme-update-info/mahipro.txt");
  $form['mahipro'] = [
    '#type'       => 'vertical_tabs',
    '#title'      => '<h3 class="settings-form-title">' . t('') . '</h3>',
    '#default_tab' => 'general',
  ];
  // General settings tab.
  $form['general'] = [
    '#type'  => 'details',
    '#title' => t('General'),
    '#description' => t('<h4>Thanks for using Mahi Pro Theme</h4><p>Mahi Pro is a premium Drupal 9, 10 & 11 theme designed and developed by <a href="https://drupar.com" target="_blank">Drupar.com</a></p>'),
    '#group' => 'mahipro',
  ];
  // layout tab.
  $form['layout'] = [
    '#type'  => 'details',
    '#title' => t('Layout'),
    '#group' => 'mahipro',
  ];
  // Theme Color tab.
  $form['colors'] = [
    '#type'  => 'details',
    '#title' => t('Color'),
    '#group' => 'mahipro',
  ];
  // Social tab.
  $form['social'] = [
    '#type'  => 'details',
    '#title' => t('Social'),
    '#description' => t('These icons appear in footer region.'),
    '#group' => 'mahipro',
  ];
  // Slider tab.
  $form['slider'] = [
    '#type'  => 'details',
    '#title' => t('Homepage Slider'),
    '#description' => t('<h4>Manage Homepage Slider</h4>'),
    '#group' => 'mahipro',
  ];
  // Header tab.
  $form['header'] = [
    '#type'  => 'details',
    '#title' => t('Header'),
    '#group' => 'mahipro',
  ];
  // Sidebar tab.
  $form['sidebar'] = [
    '#type'  => 'details',
    '#title' => t('Sidebar'),
    '#group' => 'mahipro',
  ];
  // Content tab.
  $form['content'] = [
    '#type'  => 'details',
    '#title' => t('Content'),
    '#group' => 'mahipro',
  ];
  // Footer tab.
  $form['footer'] = [
    '#type'  => 'details',
    '#title' => t('Footer'),
    '#group' => 'mahipro',
  ];
  // components tab.
  $form['components'] = [
    '#type'  => 'details',
    '#title' => t('Components'),
    '#group' => 'mahipro',
  ];
  // SEO
  $form['seo'] = [
    '#type'  => 'details',
    '#title' => t('SEO'),
    '#group' => 'mahipro',
    '#description'  => t('<stong>Under Development</strong>'),
  ];
  // Insert codes
  $form['insert_codes'] = [
    '#type'  => 'details',
    '#title' => t('Insert Codes'),
    '#group' => 'mahipro',
  ];
  //Licensing
  $form['license'] = [
    '#type'  => 'details',
    '#title' => t('Theme License'),
    '#group' => 'mahipro',
  ];
  // Update.
  $form['update'] = [
    '#type'  => 'details',
    '#title' => t('Update'),
    '#description' => t('<h4>Check For Update</h4><a href="https://drupar.com/node/2685" target="_blank">How to update theme</a>'),
    '#group' => 'mahipro',
  ];
  // Support tab.
  $form['support'] = [
    '#type'  => 'details',
    '#title' => t('Support'),
    '#group' => 'mahipro',
    '#description' => t('<h4>Documentation</h4>
    <p>We have a detailed documentation about how to use theme. Please read the <a href="https://drupar.com/doc/mahipro" target="_blank">Mahi Pro Theme Documentation</a>.</p>
    <hr />
    <h4>Create a Support Ticket</h4>
    <p>If you need support that is beyond our theme documentation, please <a href="https://drupar.com/node/add/ticket" target="_blank">open a support ticket</a></p><p>You need to login to create a support ticket on our website.</p>'),
  ];
  // General
  $form['general']['general_info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Theme Info'),
    '#description' => t('<a href="https://drupar.com/theme/mahipro" target="_blank">Theme Homepage</a> || <a href="https://demo.drupar.com/mahipro/" target="_blank">Theme Demo</a> || <a href="https://drupar.com/doc/mahipro" target="_blank">Theme Documentation</a> || <a href="https://drupar.com/doc/mahipro/support" target="_blank">Theme Support</a>'),
  ];
  // Layout -> Container width
  $form['layout']['layout_container'] = [
    '#type'        => 'fieldset',
    '#title'         => t('Container width (px)'),
  ];
  $form['layout']['layout_container']['container_width'] = [
    '#type'          => 'number',
    '#default_value' => theme_get_setting('container_width', 'mahipro'),
    '#description'   => t('Set width of the container in px. Default width is 1200px.'),
  ];
  // Layout -> Header Layout
  $form['layout']['layout_header'] = [
    '#type'        => 'fieldset',
    '#title'         => t('Header Layout'),
  ];
  $form['layout']['layout_header']['header_width'] = [
    '#type'          => 'select',
    '#options' => array(
    	'header_width_contained' => t('contained'),
    	'header_width_full' => t('Full Width'),),
    '#default_value' => theme_get_setting('header_width', 'mahipro'),
  ];
  // Layout -> Main Layout
  $form['layout']['layout_main'] = [
    '#type'        => 'fieldset',
    '#title'         => t('Main Layout'),
  ];
  $form['layout']['layout_main']['main_width'] = [
    '#type'          => 'select',
    '#options' => array(
    	'main_width_contained' => t('contained'),
    	'main_width_full' => t('Full Width'),),
    '#default_value' => theme_get_setting('main_width', 'mahipro'),
  ];
  // Layout -> Footer Layout
  $form['layout']['layout_footer'] = [
    '#type'        => 'fieldset',
    '#title'         => t('Footer Layout'),
  ];
  $form['layout']['layout_footer']['footer_width'] = [
    '#type'          => 'select',
    '#options' => array(
    	'footer_width_contained' => t('contained'),
    	'footer_width_full' => t('Full Width'),),
    '#default_value' => theme_get_setting('footer_width', 'mahipro'),
  ];
  // Color
  include_once 'inc/settings/color.php';

  // Social settings
  /* Social -> Show or hide all icons */
  $form['social']['all_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Show Social Icons'),
  ];
  $form['social']['all_icons']['all_icons_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show social icons in footer'),
    '#default_value' => theme_get_setting('all_icons_show', 'mahipro'),
    '#description'   => t("Check this option to show social icons in footer. Uncheck to hide."),
  ];
  // Facebook.
    $form['social']['facebook'] = [
    '#type'        => 'details',
    '#title'       => t("Facebook"),
  ];
  $form['social']['facebook']['facebook_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Facebook Url'),
    '#description'   => t("Enter yours facebook profile or page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('facebook_url', 'mahipro'),
  ];
  // Twitter.
  $form['social']['twitter'] = [
    '#type'        => 'details',
    '#title'       => t("Twitter"),
  ];
  $form['social']['twitter']['twitter_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Twitter Url'),
    '#description'   => t("Enter yours twitter page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('twitter_url', 'mahipro'),
  ];
  // Instagram.
  $form['social']['instagram'] = [
    '#type'        => 'details',
    '#title'       => t("Instagram"),
  ];
  $form['social']['instagram']['instagram_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Instagram Url'),
    '#description'   => t("Enter yours instagram page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('instagram_url', 'mahipro'),
  ];
  // Linkedin.
  $form['social']['linkedin'] = [
    '#type'        => 'details',
    '#title'       => t("Linkedin"),
  ];
  $form['social']['linkedin']['linkedin_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Linkedin Url'),
    '#description'   => t("Enter yours linkedin page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('linkedin_url', 'mahipro'),
  ];
  // YouTube.
  $form['social']['youtube'] = [
    '#type'        => 'details',
    '#title'       => t("YouTube"),
  ];
  $form['social']['youtube']['youtube_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('YouTube Url'),
    '#description'   => t("Enter yours youtube.com page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('youtube_url', 'mahipro'),
  ];
  // Vimeo.
  $form['social']['vimeo'] = [
    '#type'        => 'details',
    '#title'       => t("Vimeo"),
  ];
  $form['social']['vimeo']['vimeo_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('YouTube Url'),
    '#description'   => t("Enter yours vimeo.com page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('vimeo_url', 'mahipro'),
  ];
  // Social -> vk.com url.
  $form['social']['vk'] = [
    '#type'        => 'details',
    '#title'       => t("vk.com"),
  ];
  $form['social']['vk']['vk_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('vk.com'),
    '#description'   => t("Enter yours vk.com page url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('vk_url', 'mahipro'),
  ];
  // Social -> whatsapp.
  $form['social']['whatsapp'] = [
    '#type'        => 'details',
    '#title'       => t("whatsapp"),
  ];
  $form['social']['whatsapp']['whatsapp_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('WhatsApp'),
    '#description'   => t("Enter yours whatsapp url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('whatsapp_url', 'mahipro'),
  ];
  // Social -> github.
  $form['social']['github'] = [
    '#type'        => 'details',
    '#title'       => t("Github"),
  ];
  $form['social']['github']['github_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Github'),
    '#description'   => t("Enter yours github url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('github_url', 'mahipro'),
  ];
  // Social -> telegram.
  $form['social']['telegram'] = [
    '#type'        => 'details',
    '#title'       => t("Telegram"),
  ];
  $form['social']['telegram']['telegram_url'] = [
    '#type'          => 'textfield',
    '#title'         => t('Telegram'),
    '#description'   => t("Enter yours telegram url. Leave the url field blank to hide this icon."),
    '#default_value' => theme_get_setting('telegram_url', 'mahipro'),
  ];
  // Homepage slider
  // Show or hide slider on homepage.
  $form['slider']['slider_show_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Enable Slider'),
  ];
  $form['slider']['slider_show_section']['slider_show'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show Slider on Homepage'),
    '#default_value' => theme_get_setting('slider_show', 'mahipro'),
    '#description'   => t("Check this option to show slider on homepage. Uncheck to hide."),
  ];
  $form['slider']['slider_image_section'] = [
    '#type'          => 'fieldset',
    '#title'         => t('Upload Slider Images'),
  ];
  $form['slider']['slider_image_section']['slider_images'] = [
    '#type'          => 'managed_file',
    '#multiple' => TRUE,
    '#upload_location' => 'public://',
    '#upload_validators' => array(
      'file_validate_extensions' => array('gif png jpg jpeg svg'),
    ),
    '#default_value'  => theme_get_setting('slider_images', 'mahipro'),
    '#description'   => t('<p><hr /></p><p><ul><li>You can upload multiple images.</li><li>Recommended size is 1920px X 1080px</li><li>Right click the image to copy the image path and use it in the slider code below.</li></ul></p>'),
  ];
  // Slider -> Slider code.
  $form['slider']['slider_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Slider Code'),
    '#default_value' => theme_get_setting('slider_code', 'mahipro'),
    '#description'   => t('Please refer to this <a href="https://drupar.com/node/2778" target="_blank">tutorial page</a> for slider code tutorial.<br />Leave slider code box empty to show default slider.'),
  ];
  // Header
  $form['header']['header_links'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Documentation Links'),
    '#description'   => t('<p><a href="https://drupar.com/node/2622">How to change favicon icon</a></p><p><a href="https://drupar.com/node/2623">How to manage website logo</a></p><p><a href="https://drupar.com/node/2625">Fancy Search Form</a></p><p><a href="https://drupar.com/node/2624">Header main menu</a></p>'),
  ];
  $form['header']['sticky_header_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Sticky Header'),
  ];
  $form['header']['sticky_header_section']['sticky_header'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable Sticky Header'),
    '#default_value' => theme_get_setting('sticky_header', 'mahipro'),
    '#description'   => t("Check this option to enable sticky header. Uncheck to disable."),
  ];
  // Sidebar
  $form['sidebar']['animated_sidebar'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Animated Sliding Sidebar'),
  ];
  $form['sidebar']['animated_sidebar']['sliding_sidebar'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable Sliding Sidebar'),
    '#default_value' => theme_get_setting('sliding_sidebar', 'mahipro'),
    '#description'   => t("Check this option to enable animated sidebar feature. Uncheck to hide.<br />Refer to this documentation page for details. <a href='https://www.drupar.com/#' target='_blank'>How To Create Animated Sliding Sidebar</a>"),
  ];
  // Content
  $form['content']['content_tab'] = [
    '#type'  => 'vertical_tabs',
  ];
  // content -> Homepage  content
  $form['content_tab']['home_content'] = [
    '#type'        => 'details',
    '#title'       => t('Homepage content'),
    '#description' => t('<p>Please follow this tutorial to add content on homepage.</p><p><a href="https://drupar.com/node/2627" target="_blank">How To Create Homepage</a></p><p><a href="https://drupar.com/node/2628" target="_blank">How to add content on homepage</a></p>'),
    '#group' => 'content_tab',
  ];
  // content -> Animated Content
  $form['content_tab']['animated_content_sec'] = [
    '#type'        => 'details',
    '#title'       => t('Animated Content'),
    '#description' => t('Under Development'),
    '#group' => 'content_tab',
  ];
  // content -> theme font
  $form['content_tab']['font_tab'] = [
    '#type'        => 'details',
    '#title'       => t('Fonts'),
    '#group' => 'content_tab',
  ];
  // content -> Font icons
  $form['content_tab']['icon_tab'] = [
    '#type'        => 'details',
    '#title'       => t('Font Icons'),
    '#group' => 'content_tab',
  ];
  // content -> shortcodes
  $form['content_tab']['shortcode'] = [
    '#type'        => 'details',
    '#title'       => t('Shortcodes'),
    '#description' => t('<p>Mahi Pro theme has some custom shortcodes. You can create some styling content using these shortcodes. Please visit below documentation page for all shortcodes.</p><p><a href="https://drupar.com/node/2636" target="_blank">Shortcodes in Mahi theme</a>.</p><p><a href="https://drupar.com/node/2679" target="_blank">Shortcodes in Mahi Pro theme</a>.</p>'),
    '#group' => 'content_tab',
  ];
  // content -> comment
  $form['content_tab']['comment'] = [
    '#type'        => 'details',
    '#title'       => t('Comment'),
    '#description' => t(''),
    '#group' => 'content_tab',
  ];
  // content -> share page
  $form['content_tab']['node_share'] = [
    '#type'        => 'details',
    '#title'       => t('Share Page'),
    '#description' => t('<p><strong>Share Page On Social Media</strong></p><p>This is a pending task and will be available soon.</p>'),
    '#group' => 'content_tab',
  ];
  // content -> share page
  $form['content_tab']['demo_content'] = [
    '#type'        => 'details',
    '#title'       => t('Demo Site Content'),
    '#description' => t('<p>Content of theme MahiPro demo site is available on our website.</p><p><a href="https://demo.drupar.com/mahipro/" target="_blank">Mahi Pro Theme Demo</a> | <a href="https://drupar.com/node/2678/" target="_blank">Get Demo Site Content</a></p>'),
    '#group' => 'content_tab',
  ];
  // content -> animated page content
  $form['content_tab']['animated_content_sec']['animated_content'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable Animated Page Content when in view'),
    '#default_value' => theme_get_setting('animated_content', 'mahipro'),
    '#description'   => t('<p>Check this option to enable animated page content when in view feature. Uncheck to disable this feature.</p><hr /></p><p>With animated page content shortcodes, you can create contents with animation effects. These contents will appear with some animation effect when it will come in browser view.</p><p>Please visit this tutorial page for details. <a href="https://www.drupar.com/node/2697" target="_blank">How to create animated content</a>.</p>'),
  ];
  // content -> theme font -> Font source
  $form['content_tab']['font_tab']['font_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Theme Font Source'),
  ];
  $form['content_tab']['font_tab']['font_section']['font_src'] = [
    '#type'          => 'select',
    '#title'         => t('Select Google Fonts Location'),
    '#options' => array(
    	'local' => t('Local Self Hosted'),
      'googlecdn' => t('Google CDN Server')
    ),
    '#default_value' => theme_get_setting('font_src', 'mahipro'),
    '#description'   => t('Mahi theme uses following Google fonts: Plus Jakarta Sans and Poppins. You can serve these fonts locally or from Google server.'),
  ];
  // content -> font icon -> fontaweome 5
  $form['content_tab']['icon_tab']['fontawesome5_sec'] = [
    '#type'        => 'fieldset',
    '#title'       => t('FontAwesome 5'),
		'#description'   => t("<mark>Please do not enable both FontAwesome 5 and FontAwesome 6</mark>")
  ];
  $form['content_tab']['icon_tab']['fontawesome5_sec']['fontawesome_five'] = [
    '#type'          => 'checkbox',
    '#title'         => t("Enable FontAwesome 5 font icons library."),
    '#default_value' => theme_get_setting('fontawesome_five', 'mahipro'),
    '#description'   => t('Check this option to enable FontAwesome5 font icons.<br />Please refer to <a href="https://fontawesome.com/v5/search?o=r&m=free" target="_blank">FontAwesome 5 page</a> for icons code.'),
  ];
  // content -> font icon -> fontaweome 6
  $form['content_tab']['icon_tab']['fontawesome6_sec'] = [
    '#type'        => 'fieldset',
    '#title'       => t('FontAwesome 6'),
		'#description'   => t("<mark>Please do not enable both FontAwesome 5 and FontAwesome 6</mark>")
  ];
  $form['content_tab']['icon_tab']['fontawesome6_sec']['fontawesome_six'] = [
    '#type'          => 'checkbox',
    '#title'         => t("Enable FontAwesome 6 font icons library."),
    '#default_value' => theme_get_setting('fontawesome_six', 'mahipro'),
    '#description'   => t('Check this option to enable FontAwesome6 font icons.<br />Please refer to <a href="https://fontawesome.com/v6/search?o=r&m=free" target="_blank">FontAwesome 5 page</a> for icons code.'),
  ];
  // content -> font icon -> bootstrap
  $form['content_tab']['icon_tab']['bootstrap_icons'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Bootstrap Font Icons'),
  ];
  $form['content_tab']['icon_tab']['bootstrap_icons']['bootstrapicons'] = [
    '#type'          => 'checkbox',
    '#title'         => t("Enable Bootstrap Icons"),
    '#default_value' => theme_get_setting('bootstrapicons', 'mahipro'),
    '#description'   => t('Check this option to enable Bootstrap Font Icons. Read more about <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a>'),
  ];
  // content -> comment -> Highlight author comment
  $form['content_tab']['comment']['comment_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Highlight Node Author Comment'),
  ];
  $form['content_tab']['comment']['comment_section']['highlight_author_comment'] = [
    '#type'          => 'checkbox',
    '#title'         => t("Highlight Node Author's Comments"),
    '#default_value' => theme_get_setting('highlight_author_comment', 'mahipro'),
    '#description'   => t("Check this option to highlight node author's comments."),
  ];
  // Scroll to top.
  $form['footer']['scrolltotop'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Scroll To Top'),
  ];

  $form['footer']['scrolltotop']['scrolltotop_on'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable scroll to top feature.'),
    '#default_value' => theme_get_setting('scrolltotop_on', 'mahipro'),
    '#description'   => t("Check this option to enable scroll to top feature. Uncheck to disable this fearure and hide scroll to top icon."),
  ];

  // Footer -> Copyright.
  $form['footer']['copyright'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Website Copyright Text'),
  ];

  $form['footer']['copyright']['copyright_text'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show website copyright text in footer.'),
    '#default_value' => theme_get_setting('copyright_text', 'mahipro'),
    '#description'   => t("Check this option to show website copyright text in footer. Uncheck to hide."),
  ];

  $form['footer']['copyright']['copyright_text_custom'] = [
    '#type'          => 'textarea',
    '#title'         => t('Custom Copyright Text'),
    '#default_value' => theme_get_setting('copyright_text_custom', 'mahipro'),
    '#description'   => t("Enter custom copyright text. Leave it blank to show default copyright text."),
  ];

  // Footer -> Cookie message.
  $form['footer']['cookie'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Cookie Consent message'),
  ];
  $form['footer']['cookie']['cookie_message'] = [
    '#type'          => 'checkbox',
    '#title'       => t('Show Cookie Consent Message'),
    '#default_value' => theme_get_setting('cookie_message', 'mahipro'),
    '#description'   => t('Make your website EU Cookie Law Compliant. According to EU cookies law, websites need to get consent from visitors to store or retrieve cookies.'),
  ];
  $form['footer']['cookie']['cookie_message_custom'] = [
    '#type'          => 'textarea',
    '#title'         => t('Custom Cookie Consent Message'),
    '#default_value' => theme_get_setting('cookie_message_custom', 'mahipro'),
    '#description'   => t("Enter Cookie Consent Message. Leave it blank to show default message text."),
  ];
  /**
   * Components
   */
  $form['components']['preloader_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Pre Page Loader'),
  ];
  $form['components']['preloader_section']['preloader'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Show a loading icon before page loads.'),
    '#default_value' => theme_get_setting('preloader', 'mahipro'),
    '#description'   => t("Check this option to show a cool animated image until your website is loading. Uncheck to disable this feature."),
  ];
  $form['components']['component_button'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Buttons'),
    '#description' => t('<a href="https://drupar.com/node/2667" target="_blank">Buttons</a>'),
  ];
  $form['components']['component_text_box'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Text Box'),
    '#description' => t('<a href="https://drupar.com/node/2649" target="_blank">Text Box</a>'),
  ];
  $form['components']['component_message_box'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Message Box'),
    '#description' => t('<a href="https://drupar.com/node/2665" target="_blank">Message Box</a>'),
  ];
  /**
   * Insert Codes
   */
  $form['insert_codes']['insert_codes_tab'] = [
    '#type'  => 'vertical_tabs',
  ];
  // Insert Codes -> CSS
  $form['insert_codes']['css'] = [
    '#type'        => 'details',
    '#title'       => t('CSS Codes'),
    '#group'       => 'insert_codes_tab',
  ];
  // Insert Codes -> Head
  $form['insert_codes']['head'] = [
    '#type'        => 'details',
    '#title'       => t('Head'),
    '#description' => t('<h4>Insert Codes Before &lt;/HEAD&gt;</h4><hr />'),
    '#group' => 'insert_codes_tab',
  ];
  // Insert Codes -> Body
  $form['insert_codes']['body'] = [
    '#type'        => 'details',
    '#title'       => t('Body'),
    '#group' => 'insert_codes_tab',
  ];
  // Insert Codes -> css
  $form['insert_codes']['css']['css_custom'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Addtional CSS'),
  ];
  $form['insert_codes']['css']['css_custom']['css_extra'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable Addtional CSS'),
    '#default_value' => theme_get_setting('css_extra', 'mahipro'),
    '#description'   => t("Check this option to enable additional styling / css. Uncheck to disable this feature."),
  ];
  $form['insert_codes']['css']['css_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Addtional CSS Codes'),
    '#default_value' => theme_get_setting('css_code', 'mahipro'),
    '#description'   => t('Add your own CSS codes here to customize the appearance of your site. Please refer to this tutorial for detail: <a href="https://drupar.com/node/2688" target="_blank">Custom CSS</a>'),
  ];
  // Insert Codes -> Head -> Head codes
  $form['insert_codes']['head']['insert_head'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable custom codes in &lt;head&gt; section'),
    '#default_value' => theme_get_setting('insert_head', 'mahipro'),
    '#description'   => t("Check this option to enable custom codes in &lt;head&gt; section. Uncheck to disable this feature."),
  ];
  $form['insert_codes']['head']['head_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('&lt;head&gt; Codes'),
    '#default_value' => theme_get_setting('head_code', 'mahipro'),
    '#description'   => t("Please enter your custom codes for &lt;head&gt; section. These codes will be inserted just before <strong>&lt;/head&gt;</strong>."),
  ];
  // Insert Codes -> Body -> Body start codes
  $form['insert_codes']['body']['insert_body_start_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Insert code after &lt;BODY&gt; tag'),
  ];
  $form['insert_codes']['body']['insert_body_start'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable custom codes after &lt;body&gt; tag'),
    '#default_value' => theme_get_setting('insert_body_start', 'mahipro'),
    '#description'   => t("Check this option to enable custom codes after &lt;body&gt; tag. Uncheck to disable this feature."),
  ];
  $form['insert_codes']['body']['body_start_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Codes'),
    '#default_value' => theme_get_setting('body_start_code', 'mahipro'),
    '#description'   => t("Please enter your custom codes after &lt;body&gt; tag. These codes will be inserted just after <strong>&lt;body&gt;</strong> tag."),
  ];
  // Insert Codes -> Body -> Body end codes
  $form['insert_codes']['body']['insert_body_end_section'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Insert code before &lt;/BODY&gt; tag'),
  ];
  $form['insert_codes']['body']['insert_body_end'] = [
    '#type'          => 'checkbox',
    '#title'         => t('Enable custom codes before &lt;/body&gt; tag.'),
    '#default_value' => theme_get_setting('insert_body_end', 'mahipro'),
    '#description'   => t("Check this option to enable custom codes before &lt;/body&gt; tag. Uncheck to disable this feature."),
  ];
  $form['insert_codes']['body']['body_end_code'] = [
    '#type'          => 'textarea',
    '#title'         => t('Codes'),
    '#default_value' => theme_get_setting('body_end_code', 'mahipro'),
    '#description'   => t("Please enter your custom codes before &lt;/body&gt; tag. These codes will be inserted just before <strong>&lt;/body&gt;</strong>."),
  ];
  // Liense
  $form['license']['info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('License Type'),
    '#description' => t("<p>Your theme license is: <strong>Unlimited Domain License</strong></p>
    <p><ol><li>You are allowed to use this theme on unlmited website.</li>		
		<li>Use for your own unlimited website or for your client's unlimited website.</li>
		<li>You cannot redistribute theme.</li>
		<li>You cannot re-sale theme.</li></ol></p>"),
  ];
  // Update
  $form['update']['update_version'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Current Theme Version'),
    '#description' => t("$ver"),
  ];
  $form['update']['update_info'] = [
    '#type'        => 'fieldset',
    '#title'       => t('Latest mahipro Version'),
    '#description' => t("<pre>$theme_update_info</pre>"),
  ];
}
