<?php
/**
 * @file jBase_default.inc
 * Definition of the style.
 * 
 * Based  on rounded_corner.inc from panels.module
 * 
 */

function jBase_default_get_path($file, $base_path = FALSE, $theme = 'jBase') {
  $output = $base_path ? base_path() : '';
  return $output . drupal_get_path('theme', $theme) . '/' . $file;
}


/**
 * Implementation of THEME_STYLENAME_panels_style().
 * 
 * Where THEME is the theme name, and STYLENAME matches this inc filename.
 */
function jBase_jBase_default_panels_styles() {
  return array(
    'jBase_default' => array(
      'title' => t('jBase default block styles'),
      'description' => t('Presents the panes or panels with a box around them'),
      'render panel' => 'jBase_jBase_default_style_render_panel',
      'render pane' => 'jBase_jBase_default_style_render_pane',
      'settings form' => 'jBase_jBase_default_style_settings_form',
      'hook theme' => array(
        'jBase_jBase_default_box' => array(
          'arguments' => array('content' => NULL),
          'path' => jBase_default_get_path('panels/styles/jBase_default'),
          'template' => 'jBase-default-box',
        ),
      ),
    ),
  );
}


/**
 * Render callback.
 * 
 * Declared by name in THEME_STYLENAME_panels_style() above.
 *
 * @ingroup themeable
 */
function theme_jBase_jBase_default_style_render_panel($display, $panel_id, $panes, $settings) {
  $output = '';

  // Determine where to put the box. If empty or 'pane' around each pane. If
  // 'panel' then just around the whole panel.
  $where = empty($settings['jBase_default_location']) ? 'pane' : $settings['jBase_default_location'];

  $print_separator = FALSE;
  foreach ($panes as $pane_id => $pane) {
    $text = panels_render_pane($pane, $display->content[$pane_id], $display);
    if ($text) {
      // Add the separator if we've already displayed a pane.
      if ($print_separator) {
        $output .= '<div class="panel-separator"></div>';
      }

      if ($where == 'pane') {
        $output .= theme('jBase_jBase_default_box', $text);
      }
      else {
        $output .= $text;
        $print_separator = TRUE;
      }
    }
  }

  if ($where == 'panel') {
    $output = theme('jBase_jBase_default_box', $output);
  }

  jBase_add_jBase_default_css();

  return $output;
}


/**
 * Render callback for a single pane.
 */
function theme_jBase_jBase_default_style_render_pane($content, $pane, $display) {
  $output = theme('panels_pane', $content, $pane, $display);

  if (!$output) {
    return;
  }

  // Just stick a box around the standard theme_panels_pane.
  $output = theme('jBase_jBase_default_box', $output);
  jBase_add_jBase_default_css();
  return $output;
}

function jBase_add_jBase_default_css() {
  static $css_loaded;
  if (!$css_loaded == TRUE) {
    $filename = drupal_get_path('theme', 'jBase') . '/panels/styles/jBase_default/jBase_default.css';
    drupal_add_css($filename, 'module', 'all', FALSE);
    $css_loaded = TRUE;
  }
}


/**
 * Settings form callback. 
 */
function jBase_jBase_default_style_settings_form($style_settings) {
  $form['jBase_default_location'] = array(
    '#type' => 'select',
    '#title' => t('Box around'),
    '#options' => array(
      'pane' => t('Each pane'),
      'panel' => t('Each panel'),
    ),
    '#default_value' => (isset($style_settings['jBase_default_location'])) ? $style_settings['jBase_default_location'] : 'pane',
    '#description' => t('Choose whether to include the box around each pane (piece of content) or panel (each column or region)'),
  );

  return $form;
}
