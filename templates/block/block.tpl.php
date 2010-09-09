<div class="block-wrapper <?php print $block_zebra; ?>  <?php print $position; ?>">
  <div id="<?php print $block_id; ?>" class="<?php print $block_classes; ?>">
    <div class="block-inner">
      <?php if ($block->subject): ?>
      <h2 class="title block-title"><?php print $block->subject ?></h2>
      <?php endif;?>
      <div class="content">
        <?php print $block->content ?>
      </div>
    </div>
    <?php print $edit_links; ?>
  </div>
</div><!-- /block-wrapper -->