<?php
/**
 * This component is used to display the recent 3 blog posts.
 * We use the WP_Query class to get the posts.
 * @link https://developer.wordpress.org/reference/classes/wp_query/
 */

 $args = [
    'post_type' => 'song',
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'date',
];
$blog_posts_query = new WP_Query($args);

?>
<div data-component="recent-blog">
  <div>
    <h2>From the blog</h2>
    <div>
      <?php
        // The Loop
        if ($blog_posts_query->have_posts()) {
            while ($blog_posts_query->have_posts()) {
                // This is where the post's data is set up
                $blog_posts_query->the_post();
                get_template_part('components/blog-card');
            }
            // Restore original Post Data
            wp_reset_postdata();
        } else {
            echo '<p>Sorry, no posts matched your criteria.</p>';
        }?>
    </div>
  </div>
</div>