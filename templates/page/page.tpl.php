<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">
  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if IE 7]>
      <?php print $ie7_styles; ?>
    <![endif]-->
    <?php print $scripts; ?>
  </head>
  <body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?>">
    <div id="page">
      <?php if ($content): ?>
        <div id="skip">
          <a href="#main-content"><?php print t('Skip to Main Content'); ?></a>
        </div>
      <?php endif; ?>
      
      <?php if ($secondary_links): ?>
        <div id="secondary-menu">
          <?php print theme('links', $secondary_links); ?>
        </div><!-- /secondary_menu -->
      <?php endif; ?>
      
      <?php if ($banner): ?>
        <div id="banner" class="clearfix">
          <?php print $banner; ?>
        </div><!-- /banner -->
      <?php endif; ?>
      
      <?php if ($primary_links || $search_box || $header_top): ?>
        <div id="header-top" class="clearfix">
          <?php if ($primary_links): ?>
            <div id="primary-menu">
              <?php print $primary_links_tree; ?>
            </div><!-- /primary_menu -->
          <?php endif; ?>
          <?php if ($search_box): ?>
            <div id="search-box">
              <?php print $search_box; ?>
            </div><!-- /search-box -->
          <?php endif; ?>
          <?php if ($header_top): ?>
            <?php print $header_top; ?>
          <?php endif; ?>
        </div><!-- /header-top -->
      <?php endif; ?>
      
      <?php $header_first_region = $logo || $site_name || $site_slogan || $header_first; ?>
      <?php if ($header_first_region || $header_middle || $header_last): ?>
        <div id="header-wrapper" class="clearfix">
          <?php if ($header_first_region): ?>
            <div id="header-first">
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
              <?php if ($header_first): ?>
                <?php print $header_first; ?>
              <?php endif; ?>
            </div><!-- /header-first -->
          <?php endif; ?>
          <?php if ($header_middle): ?>
            <div id="header-middle">
              <?php print $header_middle; ?>
            </div><!-- /header-middle -->
          <?php endif; ?>
          <?php if ($header_last): ?>
            <div id="header-last">
              <?php print $header_last; ?>
            </div><!-- /header-last -->
          <?php endif; ?>
        </div><!-- /header-wrapper -->
      <?php endif; ?>
      
      <?php if ($breadcrumb || $header_bottom): ?>
        <div id="header-bottom" class="clearfix">
          <?php if ($breadcrumb): ?>
            <div id="breadcrumb">
              <?php print $breadcrumb; ?>
            </div><!-- /breadcrumb -->
          <?php endif; ?>
          <?php if ($header_bottom): ?>
            <?php print $header_bottom; ?>
          <?php endif; ?>
        </div><!-- /header-bottom -->
      <?php endif; ?>
      
      <div id="main-content" class="clearfix">
        <?php if ($preface_first || $preface_middle || $preface_last): ?>
          <div id="preface-wrapper" class="<?php print $prefaces; ?> clearfix">
            <?php if ($preface_first): ?>
              <div id="preface-first" class="column">
                <?php print $preface_first; ?>
              </div><!-- /preface-first -->
            <?php endif; ?>
            <?php if ($preface_middle): ?>
              <div id="preface-middle" class="column">
                <?php print $preface_middle; ?>
              </div><!-- /preface-middle -->
            <?php endif; ?>
            <?php if ($preface_last): ?>
              <div id="preface-last" class="column">
                <?php print $preface_last; ?>
              </div><!-- /preface-last -->
            <?php endif; ?>
          </div><!-- /preface-wrapper -->
        <?php endif; ?>
        
        <?php $content_top_region = $help || $messages || $mission || $content_top; ?>
        <?php $content_region = $tabs || $title || $content; ?>
        <?php if ($sidebar_first || $content_top_region || $content_region || $content_bottom || $sidebar_last): ?>
          <div id="main-wrapper" class="clearfix">
            <?php if ($sidebar_first): ?>
              <div id="sidebar-first" class="sidebar">
                <?php print $sidebar_first; ?>
              </div><!-- /sidebar-first -->
            <?php endif; ?>
            <?php if ($content_top_region || $content_region || $content_bottom): ?>
              <div id="content-wrapper">
                <?php if ($content_top_region): ?>
                  <div id="content-top">
                    <?php if ($help): ?>
                      <?php print $help; ?>
                    <?php endif; ?>
                    <?php if ($messages): ?>
                      <?php print $messages; ?>
                    <?php endif; ?>
                    <?php if ($mission): ?>
                      <div id="mission">
                        <?php print $mission; ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($content_top):?>
                      <?php print $content_top; ?>
                    <?php endif; ?>
                  </div><!-- /content-top -->
                <?php endif; ?>
                <?php if ($content_region): ?>
                  <div id="content">
                    <a name="main-content" id="main-content"></a>
                    <?php if ($tabs): ?>
                      <div id="content-tabs" class="clear">
                        <?php print $tabs; ?>
                      </div>
                    <?php endif; ?>
                    <?php if ($title || $content): ?>
                      <div id="content-inner" class="clear">
                        <?php if ($title): ?>
                          <h1 class="title"><?php print $title; ?></h1>
                        <?php endif; ?>
                        <?php if ($content): ?>
                          <div id="content-content">
                            <?php print $content; ?>
                          </div><!-- /content-content -->
                        <?php endif; ?>
                      </div><!-- /content-inner -->
                    <?php endif; ?>
                  </div><!-- /content -->
                <?php endif; ?>
                <?php if ($content_bottom): ?>
                  <div id="content-bottom">
                    <?php print $content_bottom; ?>
                  </div><!-- /content-bottom -->
                <?php endif; ?>
              </div><!-- /content-wrapper -->
            <?php endif; ?>
            <?php if ($sidebar_last): ?>
              <div id="sidebar-last" class="sidebar">
                <?php print $sidebar_last; ?>
              </div><!-- /sidebar_last -->
            <?php endif; ?>
          </div><!-- /main-wrapper -->
        <?php endif; ?>
        
        <?php if ($postscript_first || $postscript_middle || $postscript_last): ?>
          <div id="postscript-wrapper" class="<?php print $postscripts; ?> clearfix">
            <?php if ($postscript_first): ?>
              <div id="postscript-first" class="column">
                <?php print $postscript_first; ?>
              </div><!-- /postscript-first -->
            <?php endif; ?>
            <?php if ($postscript_middle): ?>
              <div id="postscript-middle" class="column">
                <?php print $postscript_middle; ?>
              </div><!-- /postscript-middle -->
            <?php endif; ?>
            <?php if ($postscript_last): ?>
              <div id="postscript-last" class="column">
                <?php print $postscript_last; ?>
              </div><!-- /postscript-last -->
            <?php endif; ?>
          </div><!-- /postscript-wrapper -->
        <?php endif; ?>
        <?php print $feed_icons; ?> 
      </div><!-- /main-content -->
      
      <?php if ($footer_top): ?>
        <div id="footer-top" class="clearfix">
          <?php print $footer_top; ?>
        </div><!-- /footer-top -->
      <?php endif; ?>
    
      <?php if ($footer_first || $footer_middle || $footer_last): ?>
        <div id="footer-wrapper" class="<?php print $footers; ?> clearfix">
          <?php if ($footer_first): ?>
            <div id="footer-first" class="column">
              <?php print $footer_first; ?>
            </div><!-- /footer-first -->
          <?php endif; ?>
          
          <?php if ($footer_middle): ?>
            <div id="footer-middle" class="column">
              <?php print $footer_middle; ?>
            </div><!-- /footer-middle -->
          <?php endif; ?>
          
          <?php if ($footer_last): ?>
            <div id="footer-last" class="column">
              <?php print $footer_last; ?>
            </div><!-- /footer-last -->
          <?php endif; ?> 
        </div><!-- /footer-wrapper -->
      <?php endif; ?>
    
      <?php if ($footer_bottom || $footer_message): ?>
        <div id="footer-bottom" class="clearfix">
          <?php print $footer_bottom; ?>
          <?php print $footer_message; ?>
        </div><!-- footer-bottom -->
      <?php endif; ?>
    </div><!-- /page -->
    
    <?php print $closure; ?>
    
  </body>
</html>