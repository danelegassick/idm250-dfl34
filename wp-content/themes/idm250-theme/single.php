<?php get_header(); ?>
<?php 
// if(null !==(the_post_thumbnail()))
// {
//     get_template_part('components/hero-image');
// } 
// else 
// {
//     echo "<h1>" . get_the_title() . "</h1>";
// }
get_template_part('components/hero-image')
?>

<?php get_template_part('components/content')?>

<?php get_footer(); ?>
