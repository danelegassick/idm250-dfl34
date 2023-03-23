<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 */

/**
 * This function is called when the theme is activated. This is where we
 * will add all of our scripts and styles.
 * @return void
 */
function theme_scripts_and_styles()
{
    // Load CSS Reset
    wp_enqueue_style(
        'css-reset',
        'https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css',
        [],
        null
    );
    // Load in Google Fonts
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Syne:wght@400;500;600;700;800&display=swap',
        [],
        null
    );

    // Load in local CSS {@link https://developer.wordpress.org/reference/functions/wp_enqueue_style/}
    wp_enqueue_style(
        'idm250-styles', // name of the stylesheet
        get_template_directory_uri() . '/dist/styles/main.css', // http://localhost:250/wp-content/themes/idm250-theme-02/dist/styles/main.css
        [], // dependencies
        filemtime(get_template_directory() . '/dist/styles/main.css'), // version number
        'all' // media
    );

    // Load in local JS {@link https://developer.wordpress.org/reference/functions/wp_enqueue_script/}
    wp_enqueue_script(
        'idm250-scripts', // name of the script
        get_template_directory_uri() . '/dist/scripts/main.js', // http://localhost:250/wp-content/themes/idm250-theme-02/dist/scripts/main.js
        [], // dependencies
        filemtime(get_template_directory() . '/dist/scripts/main.js'), // version number
        true // load in footer
    );
}
add_action('wp_enqueue_scripts', 'theme_scripts_and_styles');

//add support for thumbnails in our theme
add_theme_support('post-thumbnails');

//add support for pages to have excerpts
add_post_type_support('page', 'excerpt');

function register_theme_menus()
{
    register_nav_menus(
        [
            'primary-menu' => 'Primary Menu',
            'footer-menu' => 'Footer Menu'
        ]
    );
}
add_action('init', 'register_theme_menus');


function remove_archive_title_prefix($title)
{
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>';
    } elseif (is_post_type_archive()) {
        $title = post_type_archive_title('', false);
    } elseif (is_tax()) {
        $title = single_term_title('', false);
    }
    return $title;
}
add_filter('get_the_archive_title', 'remove_archive_title_prefix');

/**
 * Register custom taxonomies
 * @link https://developer.wordpress.org/reference/functions/register_taxonomy/
 * @return void
 */
function register_custom_taxonomies()
{
    $args = [
        'labels' => [
            'name' => 'Song Categories',
            'singular_name' => 'Song Category',
            'search_items' => 'Search Song Categories',
            'all_items' => 'All Song Categories',
            'parent_item' => 'Parent Song Category',
            'parent_item_colon' => 'Parent Song Type:',
            'edit_item' => 'Edit Song Category',
            'update_item' => 'Update Song Category',
            'add_new_item' => 'Add New Song Category',
            'new_item_name' => 'New Song Type Name',
            'menu_name' => 'Song Categories',
        ],
        'hierarchical' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => ['slug' => 'song/categories'],
        'show_in_rest' => true,
    ];

    $taxonomy_name = 'project-categories'; // name of the taxonomy. Name should be in slug form (must not contain capital letters or spaces).
    $taxonomy_association = ['projects']; // post types to associate with this taxonomy
    register_taxonomy($taxonomy_name, $taxonomy_association, $args);
}
add_action('init', 'register_custom_taxonomies');

/**
 * Function to register custom post types
 * @link https://developer.wordpress.org/reference/functions/register_post_type/
 * @return void
 */
function register_custom_post_types()
{
    $arg = [
        'labels' => [
            'name' => 'Songs',
            'singular_name' => 'Song',
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'songs'],
        'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
        'menu_position' => 5,
        'taxonomies' => ['song-categories'], // Name of custom taxonomy. Only need if you have a custom taxonomy
        'show_in_rest' => true,
    ];
    $post_type_name = 'songs';

    // Register Albums post type
    register_post_type($post_type_name, $arg);
}

add_action('init', 'register_custom_post_types');

add_action('acf/init', 'my_acf_init');
function my_acf_init() {
    
    // check function exists
    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'logo-cloud',
            'title'             => __('Logo Cloud'),
            'description'       => __('A custom logo cloud block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'logo', 'grid', 'boxes', 'images' ),
        ));
    }


    if( function_exists('acf_register_block') ) {
        
        // register a testimonial block
        acf_register_block(array(
            'name'              => 'home_hero_section',
            'title'             => __('Home Hero Section'),
            'description'       => __('A custom Home Hero Section block.'),
            'render_callback'   => 'my_acf_block_render_callback',
            'category'          => 'formatting',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'home', 'hero', 'description', 'section' ),
        ));
    }
}

function my_acf_block_render_callback($block)
{
    // convert name ("acf/testimonial") into path friendly slug ("testimonial")
    $slug = str_replace('acf/', '', $block['name']);

    // include a template part from within the "template-parts/block" folder
    if (file_exists(get_theme_file_path("/blocks/{$slug}.php"))) {
        include get_theme_file_path("/blocks/{$slug}.php");
    }
}



// {
//     "key": "group_63fd4a9a62d8a",
//     "title": "Home Hero section",
//     "fields": [
//         {
//             "key": "field_63fd4a9a6d0e6",
//             "label": "Hero Descriptions",
//             "name": "home_hero_description",
//             "aria-label": "",
//             "type": "textarea",
//             "instructions": "Add some intro text to grab the user's attention in this section. Usually 3 sentences.",
//             "required": 0,
//             "conditional_logic": 0,
//             "wrapper": {
//                 "width": "",
//                 "class": "",
//                 "id": ""
//             },
//             "default_value": "",
//             "maxlength": "",
//             "rows": "",
//             "placeholder": "",
//             "new_lines": ""
//         },
//         {
//             "key": "field_63fd4c8aa051a",
//             "label": "Hero Button",
//             "name": "home_hero_cta",
//             "aria-label": "",
//             "type": "link",
//             "instructions": "",
//             "required": 0,
//             "conditional_logic": 0,
//             "wrapper": {
//                 "width": "",
//                 "class": "",
//                 "id": ""
//             },
//             "return_format": "array"
//         }
//     ],
//     "location": [
//         [
//             {
//                 "param": "page",
//                 "operator": "==",
//                 "value": "16"
//             }
//         ]
//     ],
//     "menu_order": 0,
//     "position": "normal",
//     "style": "default",
//     "label_placement": "top",
//     "instruction_placement": "label",
//     "hide_on_screen": "",
//     "active": true,
//     "description": "",
//     "show_in_rest": 0,
//     "modified": 1678235352
// }