<?php
/**
 * This component is used to display the recent 3 projects.
 * The projects are defined in the custom post type "projects"
 * We use the WP_Query class to get the posts.
 * @link https://developer.wordpress.org/reference/classes/wp_query/
 */

$args = [
    'post_type' => 'songs', // This is the name of the custom post type we created
    'posts_per_page' => 3,
    'order' => 'DESC',
    'orderby' => 'date',
];
$project_posts_query = new WP_Query($args);

?>
<div data-component="recent-projects" class="songs-container">
  <div class="center-song-container">
    <div>
      <h2>Recent Songs</h2>
    </div>
    <div class="song-grid">
      <?php
        // Check if there are any posts
        if ($project_posts_query->have_posts()) {
            // Loop through the posts
            while ($project_posts_query->have_posts()) {
                // This is where the post's data is set up
                $project_posts_query->the_post();
                // This is where we include the blog card component
                get_template_part('components/song-card');
            }
            // Restore original Post Data
            wp_reset_postdata();
        } else {
            echo '<p>Sorry, no posts matched your criteria.</p>';
        }?>
    </div>
  </div>
</div>
<!-- 
Lorem, ipsum dolor sit amet consectetur adipisicing elit. Culpa placeat itaque facere animi sapiente sit nam distinctio aperiam, consequatur debitis laudantium, veniam fugiat molestiae! Dolore quae cumque itaque ullam impedit.
Beatae dignissimos ut dolore soluta ab. Minus, totam! Earum ea unde, alias voluptatibus libero eveniet iusto expedita voluptate quisquam, aliquid totam. Porro, eius iure odio unde harum magnam natus dolorem.
Culpa qui nulla quod consectetur atque mollitia, aliquam accusamus, similique nemo eius facere! Eveniet doloribus sit placeat, atque facere nostrum illum possimus rem suscipit dolorum recusandae quas quo dolore ipsam!
Reiciendis optio maxime dolorum explicabo sequi autem est nulla, sapiente quas at perferendis, debitis tempora aut fugit, alias distinctio perspiciatis animi iste dolorem obcaecati numquam officiis ratione excepturi. Facere, quidem. -->