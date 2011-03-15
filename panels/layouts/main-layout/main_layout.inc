<?php

$plugin = array(
  'title' => t('Main Layout'),
  'category' => t('Custom'),
  'icon' => 'main_layout.png',
  'theme' => 'main_layout',
  'css' => 'main_layout.css',
  'regions' => array(
    'top' => t('Top'),
    'left_first' => t('Left column'),
    'right_first' => t('Right column'),
    'left_second' => t('Left column'),
    'right_second' => t('Right column'),
    'bottom' => t('Bottom'),
  ),
);