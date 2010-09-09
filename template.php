<?php

//******************************************************************************************
// TODO: RENAME FUCNTION NAMES TO THE THEME'S NAME(s) WHEN CREATING NEW or SUB- THEMES!!!
//******************************************************************************************


/**
 * Override or insert variables into templates before other preprocess functions.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function jBase_preprocess(&$vars) {
  global $user;
  $vars['is_admin'] = in_array('admin', $user->roles);
  $vars['logged_in'] = ($user->uid > 0) ? TRUE : FALSE;
}


/**
 * Override or insert variables into the page templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function jBase_preprocess_page(&$vars) {
  global $language, $theme_key;
  // Remove sidebars if disabled e.g., for Panels
  if (!$vars['show_blocks']) {
    $vars['sidebar_first'] = '';
    $vars['sidebar_last'] = '';
  }
  
  // Give <body> tag a unique id depending on PAGE PATH
  $path_alias = strtolower(preg_replace('/[^a-zA-Z0-9-]+/', '-', drupal_get_path_alias($_GET['q'])));
  if ($path_alias == 'node') {
    $vars['body_id'] = 'page-front';
  }
  else {
    $vars['body_id'] = 'page-'. $path_alias;
  }
  
  // Build an array of body classes
  $body_classes = array();
  $body_classes[] = ($vars['logged_in']) ? 'logged-in' : 'not-logged-in';
  $body_classes[] = ($vars['is_front']) ? 'front' : 'not-front';
  if (isset($vars['node'])) {
    $body_classes[] = ($vars['node']) ? 'full-node' : '';
    $body_classes[] = (($vars['node']->type == 'forum') || (arg(0) == 'forum')) ? 'forum' : '';
    $body_classes[] = ($vars['node']->type) ? 'node-type-'. $vars['node']->type : '';
  }
  else {
    $body_classes[] = (arg(0) == 'forum') ? 'forum' : '';
  }
  $body_classes[] = (module_exists('panels') && (panels_get_current_page_display())) ? 'panels' : '';
  $body_classes[] = 'layout-'. (($vars['sidebar_first']) ? 'first-main' : 'main') . (($vars['sidebar_last']) ? '-last' : '');
  if ($vars['preface_first'] || $vars['preface_middle'] || $vars['preface_last']) {
    $preface_regions = 'preface';
    $preface_regions .= ($vars['preface_first']) ? '-first' : '';
    $preface_regions .= ($vars['preface_middle']) ? '-middle' : '';
    $preface_regions .= ($vars['preface_last']) ? '-last' : '';
    $body_classes[] = $preface_regions;
  }
  if ($vars['postscript_first'] || $vars['postscript_middle'] || $vars['postscript_last']) {
    $postscript_regions = 'postscript';
    $postscript_regions .= ($vars['postscript_first']) ? '-first' : '';
    $postscript_regions .= ($vars['postscript_middle']) ? '-middle' : '';
    $postscript_regions .= ($vars['postscript_last']) ? '-last' : '';
    $body_classes[] = $postscript_regions;
  }
  $body_classes = array_filter($body_classes);
  $vars['body_classes'] = implode(' ', $body_classes);

  // Add preface & postscript classes with number of active sub-regions
  $region_list = array(
    'prefaces' => array('preface_first', 'preface_middle', 'preface_last'), 
    'postscripts' => array('postscript_first', 'postscript_middle', 'postscript_last'),
    'footers' => array('footer_first', 'footer_middle', 'footer_last')
  );
  foreach ($region_list as $sub_region_key => $sub_region_list) {
    $active_regions = array();
    foreach ($sub_region_list as $region_item) {
      if (!empty($vars[$region_item])) {
        $active_regions[] = $region_item;
      }
    }
    $vars[$sub_region_key] = $sub_region_key .'-'. strval(count($active_regions));
  }
  
  // Generate menu tree from source of primary links
  $vars['primary_links_tree'] = menu_tree(variable_get('menu_primary_links_source', 'primary-links'));

  // Set IE stylesheets
  $themes = jBase_theme_paths($theme_key);
  $vars['setting_styles'] = $vars['ie6_styles'] = $vars['ie7_styles'] = $vars['ie8_styles'];
  foreach ($themes as $name => $path) {
    $link = '<link type="text/css" rel="stylesheet" media="all" href="' . base_path() . $path;
    $vars['ie6_styles'] .= (file_exists($path . '/css/ie6-fixes.css')) ? $link . '/css/ie6-fixes.css" />' . "\n" : '';
    $vars['ie7_styles'] .= (file_exists($path . '/css/ie7-fixes.css')) ? $link . '/css/ie7-fixes.css" />' . "\n" : '';
    $vars['ie8_styles'] .= (file_exists($path . '/css/ie8-fixes.css')) ? $link . '/css/ie8-fixes.css" />' . "\n" : '';
  }  
  
  // page-type template suggestion; ex: page-story.tpl.php
  $template_files = array();
  foreach ($vars['template_files'] as $file) {
    $template_files[] = $file;
    if ($file == 'page-node') {
      $template_files[] = 'page-'. $vars['node']->type;   
    }
  }
  $vars['template_files'] = $template_files;
}


/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function jBase_preprocess_node(&$vars) {
  // Build an array of node classes
  $node_classes = array();
  $node_classes[] = $vars['zebra'];
  $node_classes[] = (!$vars['node']->status) ? 'node-unpublished' : '';
  $node_classes[] = ($vars['sticky']) ? 'sticky' : '';
  $node_classes[] = (isset($vars['node']->teaser)) ? 'teaser' : 'full-node';
  $node_classes[] = 'node-type-'. $vars['node']->type;
  $node_classes = array_filter($node_classes);
  $vars['node_classes'] = implode(' ', $node_classes);
  
  // Add node-type-page template suggestion
  if ($vars['page']) {
    $vars['template_files'][] = 'node-'. $vars['node']->type .'-page';
  }
  else {
    $vars['template_files'][] = 'node-'. $vars['node']->type .'-teaser';
    $vars['template_files'][] = 'node-'. $vars['node']->nid;
  }
}


/**
 * Override or insert variables into the block templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function jBase_preprocess_block(&$vars) {
  // Id & classes for blocks
  $block = $vars['block'];
  $block_id = 'block-'. $block->module .'-'. $block->delta;
  $block_classes = array('block');
  $block_classes[] = 'region-'. str_replace('_','-', $block->region);
  $block_classes[] = 'block-' . $block->module;
  $vars['edit_links_array'] = array();
  $vars['edit_links'] = '';
  
  // first/last block position
  $vars['position'] = ($vars['block_id'] == 1) ? 'first' : '';
  if ($vars['block_id'] == count(block_list($block->region))) {
    $vars['position'] = ($vars['position']) ? 'first last' : 'last';
  }
  
  // Does the user have block admin perms? if so then load template.block-editing.inc
  // and add block-editing class to $block_classes array
  if (user_access('administer blocks')) {
    include_once './' . drupal_get_path('theme', 'jBase') . '/template.block-editing.inc';
    phptemplate_preprocess_block_editing($vars, $hook);
    $block_classes[] = 'block-editing';
  }

  // Render block id & classes.
  $vars['block_id'] = $block_id;
  $vars['block_classes'] = implode(' ', $block_classes);
}


/**
 * Override or insert variables into the comment templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 */
function jBase_preprocess_comment(&$vars) {
  global $user;
  // Build an array comment classes
  $comment_classes = array();
  static $comment_odd = TRUE;
  $comment_classes[] = $comment_odd ? 'odd' : 'even';
  $comment_odd = !$comment_odd;
  $comment_classes[] = ($vars['comment']->status == COMMENT_NOT_PUBLISHED) ? 'comment-unpublished' : '';
  $comment_classes[] = ($vars['comment']->new) ? 'comment-new' : '';
  $comment_classes[] = ($vars['comment']->uid == 0) ? 'comment-by-anon' : '';
  $comment_classes[] = ($user->uid && $vars['comment']->uid == $user->uid) ? 'comment-mine' : '';
  $node = node_load($vars['comment']->nid);
  $vars['author_comment'] = ($vars['comment']->uid == $node->uid) ? TRUE : FALSE;
  $comment_classes[] = ($vars['author_comment']) ? 'comment-by-author' : '';
  $comment_classes = array_filter($comment_classes);
  $vars['comment_classes'] = implode(' ', $comment_classes);
}


/**
 * Set form file input max char size 
 */
function jBase_file($element) {
  $element['#size'] = ($element['#size'] > 30) ? 30 : $element['#size'];
  return theme_file($element);
}

/**
 * Theme paths function
 * Retrieves current theme path and its parent
 * theme paths, in parent-to-child order.
 */
function jBase_theme_paths($theme) {
  $all_parents = array();
  $themes = list_themes();
  $all_parents[$theme] = drupal_get_path('theme', $theme);
  $base_theme = $themes[$theme]->info['base theme'];
  while ($base_theme) {
    $all_parents[$base_theme] = drupal_get_path('theme', $base_theme);
    $base_theme = (isset($themes[$base_theme]->info['base theme'])) ? $themes[$base_theme]->info['base theme'] : '';
  }
  return array_reverse($all_parents);
}
