<?php
$currentPostId = get_the_id();
$terms = get_the_terms($currentPostId, 'category');

if ($terms) {
    $total_category_count = count($terms);
    echo '<div>';
    foreach ($terms as $index => $term) {
        $taxonomy_url = get_term_link($term->term_id);
        // Only show comma if not last item in loop
        // Commenting out this comma logic since my design doesn't need it but leaving it here for reference
        // $comma = $index < $total_category_count - 1 ? ', ' : '';
        echo "<a href='{$taxonomy_url}'>{$term->name}</a>";
    }
    echo '</div>';
}
