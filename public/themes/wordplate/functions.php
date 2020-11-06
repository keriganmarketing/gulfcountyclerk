<?php

declare(strict_types=1);

use KeriganSolutions\KMAContactInfo\ContactInfo;

// Register plugin helpers.
require template_path('includes/plugins/plate.php');
require template_path('includes/plugins/theme-setup.php');
require template_path('includes/plugins/acf-page-fields.php');
require template_path('post-types/foreclosure.php');
require template_path('post-types/tax-deed-sale.php');

(new ContactInfo())->addField([
    'key' => 'mailing_address',
    'label' => 'Mailing Address',
    'name' => 'mailing_address',
    'type' => 'wysiwyg',
    'parent' => 'group_contact_info',
])->addField([
    'key' => 'psj_location',
    'label' => 'Port St. Joe Location',
    'name' => 'psj_location',
    'type' => 'wysiwyg',
    'parent' => 'group_contact_info',
])->addField([
    'key' => 'wewa_location',
    'label' => 'Wewahitchka Location',
    'name' => 'wewa_location',
    'type' => 'wysiwyg',
    'parent' => 'group_contact_info',
])->use();

new KeriganSolutions\KMASlider\KMASliderModule();

// Set theme defaults.
add_action('after_setup_theme', function () {
    // Disable the admin toolbar.
    show_admin_bar(false);

    // Add post thumbnails support.
    add_theme_support('post-thumbnails');

    // Add title tag theme support.
    add_theme_support('title-tag');

    // Add HTML5 theme support.
    add_theme_support('html5', [
        'caption',
        'comment-form',
        'comment-list',
        'gallery',
        'search-form',
        'widgets',
    ]);
});

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('wordplate', mix('styles/main.css'));
    wp_deregister_script('jquery');
    wp_register_script('wordplate', mix('scripts/app.js'), '', '', true);
    wp_enqueue_script('wordplate', mix('scripts/app.js'), '', '', true);
});

// Remove Plugin stylesheets
function removePluginStyles() {
    wp_dequeue_style('tablepress-default');
    wp_dequeue_style('dlm-frontend');
}
// if(!is_user_logged_in()){
    add_action( 'wp_print_styles', 'removePluginStyles', 9999 );
// }

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

// Custom Blade Cache Path
add_filter('bladerunner/cache/path', function () {
    return '../../uploads/.cache';
});

function expand_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            width: auto;
        }
    </style>
<?php
}
add_action('login_enqueue_scripts', 'expand_login_logo');