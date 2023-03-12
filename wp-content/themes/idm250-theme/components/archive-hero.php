<?php
$title = get_the_archive_title();
// get the archive description
$description = get_the_archive_description();
?>
<div data-component="archive-hero">
  <div>
    <h2>
      <?php echo  $title ; ?>
    </h2>

    <?php if ($description) { ?>
    <p>
      <?php echo $description; ?>
    </p>
    <?php } ?>
  </div>
</div>