<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="nav">
    <a href="<?php echo home_url(); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/dist/images/logo.png" class="logo"alt="Logo">
    </a>
    <?php wp_nav_menu(['theme_location' => 'primary-menu']); ?>
    <div class="hamburger">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
    </div>
</div>


<main>