<div class="content-block">
<?php
if (have_posts()) {
    //Load loop posts
    while (have_posts()) {
        the_post();
        the_content();
    }
} else {
    echo "No posts found.";
}
?>
</div>