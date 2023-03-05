<?php get_header(); ?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('components/content'); ?>
</article>


<?php get_footer(); ?>