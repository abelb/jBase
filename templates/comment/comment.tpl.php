<div class="comment <?php print $comment_classes;?> clear-block">

  <?php print $picture ?>
  
  <?php if ($comment->new): ?>
    <a id="new"></a>
    <span class="new"><?php print $new ?></span>
  <?php endif; ?>
  
  <h3 class="title"><?php print $title ?></h3>
  
  <div class="submitted">
    <?php print $submitted ?>
  </div>
  
  <div class="content">
    <?php print $content ?>
    
    <?php if ($signature): ?>
      <div class="signature">
        <?php print $signature ?>
      </div>
    <?php endif; ?>
    
  </div><!-- /content -->
  
  <?php if ($links): ?>
    <?php print $links ?>
  <?php endif; ?>
  
</div><!-- /comment -->