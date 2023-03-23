<!-- Start ./components/header -->
<div class="hero-image">
  <img src="<?php echo get_the_post_thumbnail_url() ?>" />
  <div class="hero-content">
    <h1><?php echo get_the_title(); ?></h1>
    <p><?php the_field('home_hero_description'); ?></p>
    <div>
      <?php
      $link = get_field('home_hero_cta');
      if($link):
        $link_url = $link['url'];
        $link_title = $link['title'];
        $link_target = $link['target'] ? $link['target'] : '_self';
      ?>
      <a class="btn" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- End ./components/header -->