<?php get_header();?>
<h1><?php echo get_the_title();?></h1>
<br>
<h5>Categories For This Post</h5>
<p>
<?php
$currentPostId = get_the_id();
$terms = get_the_terms($currentPostId, 'category');

foreach($terms as $term) {
    echo "<span class='category-listing'>{$term->name}, </span>";
}
?>
</p>

<div class="content-blocks">
    
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