<?php get_header(); ?>
This is single.php
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php get_template_part('components/content'); ?>
</article>

<h2>Categories For This Post</h2>
<?php
$currentPostId = get_the_id();
$terms = get_the_terms($currentPostId, 'category');

foreach($terms as $term) {
    echo "<span>{$term->name}, </span>";
}
?>

<br>
<br>
<?php get_footer(); ?>