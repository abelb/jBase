<?php
/**
 * @file
 * Theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlight']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 *
 * <?php print render($page['Region_Name']); ?>
 * 
 */
?>

  <div id="page">
    
    <?php if ($page['banner'] || $secondary_menu): ?>
      <div id="banner" class="clearfix">
        
        <?php if ($secondary_menu): ?>
          <div id="secondary-menu">
            <?php print theme('links__system_secondary_menu', array(
              'links' => $secondary_menu,
            )); ?>
          </div><!-- /secondary_menu -->
        <?php endif; ?>
        
        <?php print render($page['banner']); ?>
      </div><!-- /banner -->
    <?php endif; ?>
      
    <?php if ($main_menu || $page['header_top']): ?>
      <div id="header-top" class="clearfix">
        
        <?php if ($main_menu): ?>
          <div id="main-menu">
            <?php print $main_menu_tree; ?>
          </div>
        <?php endif; ?>
            
        <?php if ($page['header_top']): ?>
          <?php print render($page['header_top']); ?>
        <?php endif; ?>
          
      </div><!-- /header-top -->
    <?php endif; ?>

    <?php $header_first_region = $logo || $site_name || $site_slogan || $page['header_first']; ?>
    <?php if ($header_first_region || $header_second || $header_third): ?>
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
              
            <?php if ($page['header_first']): ?>
              <?php print render($page['header_first']); ?>
            <?php endif; ?>
              
          </div><!-- /header-first -->
        <?php endif; ?>

        <?php if ($page['header_second']): ?>
          <div id="header-second">
            <?php print render($page['header_second']); ?>
          </div><!-- /header-second -->
        <?php endif; ?>

        <?php if ($page['header_third']): ?>
          <div id="header-third">
            <?php print render($page['header_third']); ?>
          </div><!-- /header-third -->
        <?php endif; ?>
          
      </div><!-- /header-wrapper -->
    <?php endif; ?>

    <?php if ($breadcrumb || $page['header_bottom']): ?>
      <div id="header-bottom" class="clearfix">
        
        <?php if ($breadcrumb): ?>
          <div id="breadcrumb">
            <?php print $breadcrumb; ?>
          </div><!-- /breadcrumb -->
        <?php endif; ?>
            
        <?php if ($page['header_bottom']): ?>
          <?php print render($page['header_bottom']); ?>
        <?php endif; ?>
          
        <?php print render($page['highlight']); ?>
          
      </div><!-- /header-bottom -->
    <?php endif; ?>

    <?php if ($page['preface_first'] || $page['preface_second'] || $page['preface_third']): ?>
      <div id="preface-wrapper" class="<?php print $prefaces; ?> clearfix">
        
        <?php if ($page['preface_first']): ?>
          <div id="preface-first" class="column">
            <?php print render($page['preface_first']); ?>
          </div><!-- /preface-first -->
        <?php endif; ?>

        <?php if ($page['preface_second']): ?>
          <div id="preface-second" class="column">
            <?php print render($page['preface_second']); ?>
          </div><!-- /preface-second -->
        <?php endif; ?>

        <?php if ($page['preface_third']): ?>
          <div id="preface-third" class="column">
            <?php print render($page['preface_third']); ?>
          </div><!-- /preface-third -->
        <?php endif; ?>
          
      </div><!-- /preface-wrapper -->
    <?php endif; ?>

    <?php $content_top_region = $page['help'] || $messages; ?>
    <?php $content_region = $tabs || $title || $page['content']; ?>
    <?php if ($content_top_region || $content_region || $page['content_bottom'] || $page['sidebar_second']): ?>
      <div id="main-wrapper" class="clearfix">
          
        <?php if ($page['sidebar_first']): ?>
          <div id="sidebar-first" class="sidebar">
            <?php print render($page['sidebar_first']); ?>
          </div><!-- /sidebar-first -->
        <?php endif; ?>

        <?php if ($content_top_region || $content_region || $content_bottom): ?>
          <div id="content-wrapper">
            
            <?php if ($content_top_region): ?>
              <div id="content-top">
                
                <?php if ($page['help']): ?>
                  <?php print render($page['help']); ?>
                <?php endif; ?>
                    
                <?php if ($messages): ?>
                  <?php print $messages; ?>
                <?php endif; ?>
                
              </div><!-- /content-top -->
            <?php endif; ?>

            <?php if ($content_region): ?>
              <div id="content">
                <a name="main-content" id="main-content"></a>
                <?php if ($tabs['#primary'] > 0): ?>
                  <div id="content-tabs" class="clearfix">
                    <?php print render($tabs); ?>
                  </div>
                <?php endif; ?>
                    
                <?php if ($title || $page['content']): ?>
                  <div id="content-inner">
                      
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                      <h1 id="page-title"><?php print $title; ?></h1>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                      
                    <?php if ($action_links): ?>
                      <ul class="action-links"><?php print render($action_links); ?></ul>
                    <?php endif; ?>
                        
                    <?php if ($page['content']): ?>
                      <?php print render($page['content']); ?>
                    <?php endif; ?>
                      
                  </div><!-- /content-inner -->
                <?php endif; ?>
              </div><!-- /content -->
            <?php endif; ?>
          </div><!-- /content-wrapper -->
        <?php endif; ?>

        <?php if ($page['sidebar_second']): ?>
          <div id="sidebar-second" class="sidebar">
            <?php print render($page['sidebar_second']); ?>
          </div><!-- /sidebar_second -->
        <?php endif; ?>
          
      </div><!-- /main-wrapper -->
    <?php endif; ?>

    <?php if ($page['postscript_first'] || $page['postscript_second'] || $page['postscript_third']): ?>
      <div id="postscript-wrapper" class="<?php print $postscripts; ?> clearfix">
      
        <?php if ($page['postscript_first']): ?>
          <div id="postscript-first" class="column">
            <?php print render($page['postscript_first']); ?>
          </div><!-- /postscript-first -->
        <?php endif; ?>

        <?php if ($page['postscript_second']): ?>
          <div id="postscript-second" class="column">
            <?php print render($page['postscript_second']); ?>
          </div><!-- /postscript-second -->
        <?php endif; ?>

        <?php if ($page['postscript_third']): ?>
          <div id="postscript-third" class="column">
            <?php print render($page['postscript_third']); ?>
          </div><!-- /postscript-third -->
        <?php endif; ?>
        
      </div><!-- /postscript-wrapper -->
    <?php endif; ?>

    <?php if ($page['footer_top']): ?>
      <div id="footer-top" class="clearfix">
        <?php print render($page['footer_top']); ?>
      </div><!-- /footer-top -->
    <?php endif; ?>
  
    <?php if ($page['footer_first'] || $page['footer_second'] || $page['footer_third']): ?>
      <div id="footer-wrapper" class="<?php print $footers; ?> clearfix">
        <?php if ($page['footer_first']): ?>
          <div id="footer-first" class="column">
            <?php print render($page['footer_first']); ?>
          </div><!-- /footer-first -->
        <?php endif; ?>
        
        <?php if ($page['footer_second']): ?>
          <div id="footer-middle" class="column">
            <?php print render($page['footer_second']); ?>
          </div><!-- /footer-middle -->
        <?php endif; ?>
        
        <?php if ($page['footer_third']): ?>
          <div id="footer-last" class="column">
            <?php print render($page['footer_third']); ?>
          </div><!-- /footer-last -->
        <?php endif; ?> 
      </div><!-- /footer-wrapper -->
    <?php endif; ?>
  
    <?php if ($page['footer_bottom']): ?>
      <div id="footer-bottom" class="clearfix">
        <?php print render($page['footer_bottom']); ?>
      </div><!-- footer-bottom -->
    <?php endif; ?>
    
  </div><!-- /page -->