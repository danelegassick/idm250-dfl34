<?php
/**
 * This component is used to display a single blog post card.
 * It should be used inside a loop.
 */
?>
<article class="song-card" data-component="song-card">
<a href="<?php echo get_the_permalink(); ?>">

  <div class="song-hero-card">
    <img src="<?php the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?> Featured Image">
    <div class="song-hero-overlay">
        <div class="song-content">
          <h1><?php echo get_the_title(); ?></h1>
          <time datetime="2020-03-16">
           <?php echo get_the_date(); ?>
          </time>
        </div>
    </div>
  </div>
  </a>

</article>