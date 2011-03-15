<div <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?> class="main-layout">
  
  <?php if ($content['top']): ?>
    <div class="top-container">
      <?php print $content['top']; ?>
    </div><!-- /panel-top -->
  <?php endif; ?>
  
  <?php $row_content = $content['left_first'] || $content['right_first'] || $content['left_seond'] || $content['right_second']; ?>
  <?php if ($row_content): ?>
      
    <div class="container-row clearfix">
      <div class="left">
        <?php print $content['left_first']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['right_first']; ?>
      </div><!-- /right -->
    </div><!-- /container-row first -->
      
    <div class="container-row clearfix">
      <div class="left">
        <?php print $content['left_second']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['right_second']; ?>
      </div><!-- /right -->
    </div><!-- /container-row last -->
      
  <?php endif; ?>
  
  <?php if ($content['bottom']): ?>
    <div class="bottom-content">
      <?php print $content['bottom']; ?>
    </div>
  <?php endif; ?>

</div><!-- /main-layout -->
