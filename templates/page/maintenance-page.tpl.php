<?php
/**
 * @file
 * Theme implementation to display a single Drupal page while offline.
 *
 * All the available variables are mirrored in page.tpl.php. Some may be left
 * blank but they are provided for consistency.
 *
 * @see template_preprocess()
 * @see template_preprocess_maintenance_page()
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
</head>
  <body class="<?php print $classes; ?>">
    <div id="page" class="clearfix">
      
      <div id="header-wrapper" class="clearfix">
        <?php if ($header_first_region): ?>
          <div id="header-first">
            <div class="region-inner">
                
              <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php print check_url($front_page) ?>" title="<?php print t('Home') ?>">
                    <img src="<?php print $logo ?>" alt="<?php print t('Home') ?>" />
                  </a>
                </div>
              <?php endif; ?>
              
              <?php if ($site_name): ?>
                <div id="site-name">
                  <h1>
                    <a href="<?php print check_url($front_page) ?>" title="<?php print t('Home'); ?>">
                      <?php print $site_name; ?>
                    </a>
                  </h1>
                </div>
              <?php endif; ?>
              
              <?php if ($site_slogan): ?>
                <div id="slogan"><?php print $site_slogan; ?></div>
              <?php endif; ?>
                
            </div><!-- /region-inner -->
          </div><!-- /header-first -->
        <?php endif; ?>
          
      </div><!-- /header-wrapper -->
      
      <div id="main-wrapper" class="clearfix">  
        <div id="content-wrapper">
          <div id="content">
            <?php if ($tabs): ?>
            <div id="content-tabs" class="clear">
              <?php print $tabs; ?>
            </div>
            <?php endif; ?>
            <?php if ($content || $title): ?>
            <div id="content-inner" class="clear">
              <?php if ($title): ?>
              <h1 class="title"><?php print $title; ?></h1>
              <?php endif; ?>
              <?php if ($content): ?>
              <?php print $content; ?>
              <?php endif; ?>
            </div>
            <?php endif; ?>
          </div><!-- /content -->
        </div><!-- /content-wrapper -->
      </div><!-- /main-wrapper -->
    </div><!-- /page -->
  </body>
</html>