<?php get_header(); ?>
<h1><?php echo get_the_title(); ?></h1>
<div><?php echo get_the_excerpt(); ?></div>


<?php
//check if page has assigned image
if (has_post_thumbnail()) {
    the_post_thumbnail();
} 
?>

<?php get_template_part('components/content')?>


<?php get_footer(); ?>
