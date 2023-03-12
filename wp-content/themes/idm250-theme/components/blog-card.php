<?php
/**
 * This component is used to display a single blog post card.
 * It should be used inside a loop.
 */
?>
<article data-component="blog-card">
  <div>
    <img src="<?php echo get_the_post_thumbnail_url(); ?>"
      alt="<?php echo get_the_title(); ?> Featured Image">
    <div></div>
  </div>
  <div>
    <div>
      <time datetime="2020-03-16">
        <?php echo get_the_date(); ?>
      </time>
      <?php get_template_part('components/blog-categories-list'); ?>
    </div>
    <div>
      <h3>
        <a href="<?php echo get_the_permalink(); ?>">
          <span></span>
          <?php echo get_the_title(); ?>
        </a>
      </h3>
      <p>
        <?php echo get_the_excerpt(); ?>
      </p>
    </div>
  </div>
</article>