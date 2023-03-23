<?php
/**
 * This template is used to display the front page of the site.
 * It has to be set in your settings > reading > front page displays > a static page
 */
get_header();
get_template_part('components/hero-home');
get_template_part('components/recent-songs');
get_template_part('components/featured-block');
get_footer();


