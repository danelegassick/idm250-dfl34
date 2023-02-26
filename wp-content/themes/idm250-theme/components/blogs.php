<?php get_header();?>
<!-- <h1><?php echo get_the_title();?></h1> -->
<div class="blog-blocks">
    <?php 
    if (have_posts()) {
        while (have_posts()) {
            the_post();
            the_content();
        }
    } else {
        echo 'no posts found';
    }
    ?>
</div>

<?php get_footer();?>