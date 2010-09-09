<div id="front-layout">
  
  <?php if ($content['top']): ?>
    <div class="top-container">
      <?php print $content['top']; ?>
    </div><!-- /panel-top -->
  <?php endif; ?>
  
  <?php $container_first = $content['first_left_first'] || $content['first_right_first'] || $content['first_left_middle'] || $content['first_right_middle'] || $content['first_left_last'] || $content['first_right_last']; ?>
  <?php if ($container_first): ?>
  <div class="column-container first">
      
    <?php if($content['header_first']): ?>
      <div class="container-header">
        <?php print $content['header_first']; ?>
      </div>
    <?php endif; ?>
      
    <div class="container-row first">
      <div class="left">
        <?php print $content['first_left_first']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['first_right_first']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row middle">
      <div class="left">
        <?php print $content['first_left_middle']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['first_right_middle']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row last">
      <div class="left">
        <?php print $content['first_left_last']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['first_right_last']; ?>
      </div><!-- /right -->
    </div>
      
  </div><!-- /column-container -->
  <?php endif; ?>


  <?php $container_middle = $content['middle_left_first'] || $content['middle_right_first'] || $content['middle_left_middle'] || $content['middle_right_middle'] || $content['middle_left_last'] || $content['middle_right_last']; ?>
  <?php if ($container_middle): ?>
  <div class="column-container middle">
      
    <?php if($content['header_middle']): ?>
      <div class="container-header">
        <?php print $content['header_middle']; ?>
      </div>
    <?php endif; ?>
      
    <div class="container-row first">
      <div class="left">
        <?php print $content['middle_left_first']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['middle_right_first']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row middle">
      <div class="left">
        <?php print $content['middle_left_middle']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['middle_right_middle']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row last">
      <div class="left">
        <?php print $content['middle_left_last']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['middle_right_last']; ?>
      </div><!-- /right -->
    </div>
      
  </div><!-- /column-container -->
  <?php endif; ?>

  <?php $container_last = $content['last_left_first'] || $content['last_right_first'] || $content['last_left_middle'] || $content['last_right_middle'] || $content['last_left_last'] || $content['last_right_last']; ?>
  <?php if ($container_middle): ?>
  <div class="column-container last">
      
    <?php if($content['header_last']): ?>
      <div class="container-header">
        <?php print $content['header_last']; ?>
      </div>
    <?php endif; ?>
      
    <div class="container-row first">
      <div class="left">
        <?php print $content['last_left_first']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['last_right_first']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row middle">
      <div class="left">
        <?php print $content['last_left_middle']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['last_right_middle']; ?>
      </div><!-- /right -->
    </div>
      
    <div class="container-row last">
      <div class="left">
        <?php print $content['last_left_last']; ?>
      </div><!-- /left -->
      <div class="right">
        <?php print $content['last_right_last']; ?>
      </div><!-- /right -->
    </div>
      
  </div><!-- /column-container -->
  <?php endif; ?>

</div><!-- /front-layout -->
