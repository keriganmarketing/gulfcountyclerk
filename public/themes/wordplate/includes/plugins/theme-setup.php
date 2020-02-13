<?php
/*
 * This file is used to automatically create default nav menus.
 * 
 * 
 */

if(is_admin()){
    add_action('after_setup_theme', 'create_default_pages'); // Install default pages
    add_action('after_setup_theme', 'create_default_nav_locations'); // Install default nav locations
    add_action('after_setup_theme', 'create_default_menus'); // Install default navs
}

function create_default_nav_locations() {
    register_nav_menus([
        'main-navigation'   => __('Top Navigation', 'wordplate'),
        'mobile-navigation' => __('Mobile Navigation', 'wordplate'),
        'footer-navigation' => __('Footer Navigation', 'wordplate'),
        'how-do-i-navigation' => __('How Do I Navigation', 'wordplate'),
    ]);
}

function create_default_pages(){
    $homePage = get_page_by_path('home');

    if(!$homePage){
        wp_insert_post([
            'post_type' => 'page',
            'post_title' => 'Home',
            'post_content' => 'This is the home page.',
            'post_status' => 'publish',
            'post_slug' => 'home'
        ]);

        $homePage = get_page_by_path('home');
    }

    update_option( 'page_on_front', $homePage->ID );
	update_option( 'show_on_front', 'page' );
}

function create_default_menus(){

    // Get Menu Locations
    $locations = get_theme_mod( 'nav_menu_locations' );

    // Create Main Menu
    $mainmenu = 'Main Navigation';    
    if( !wp_get_nav_menu_object($mainmenu) ){
        wp_create_nav_menu($mainmenu);
        $menu_id = get_term_by( 'name', $mainmenu, 'nav_menu' );
        add_page_to_menu(
            $menu_id,
            'Home',
            '/'
        );        
    }

    // Create Footer Menu
    $footermenu = 'Footer Navigation';    
    if( !wp_get_nav_menu_object($footermenu) ){
        wp_create_nav_menu($footermenu);
        $menu_id = get_term_by( 'name', $footermenu, 'nav_menu' );
        add_page_to_menu(
            $menu_id,
            'Home',
            '/'
        );
        $locations['footer-navigation'] = $menu_id;
    }

    // Create Mobile Menu
    $mobilemenu = 'Mobile Navigation';    
    if( !wp_get_nav_menu_object($mobilemenu) ){
        wp_create_nav_menu($mobilemenu);
        $menu_id = get_term_by( 'name', $mobilemenu, 'nav_menu' );
        add_page_to_menu(
            $menu_id,
            'Home',
            '/'
        );
        $locations['mobile-navigation'] = $menu_id;
    }

    // Set Menu Locations
    if(!empty($locations)) { 
        foreach($locations as $locationId => $menuValue) { 
            switch($locationId) { 
                case 'main-navigation': 
                    $menu = get_term_by('name', 'Main Navigation', 'nav_menu'); 
                    break; 
                case 'footer-navigation': 
                    $menu = get_term_by('name', 'Footer Navigation', 'nav_menu'); 
                    break; 
                case 'mobile-navigation': 
                    $menu = get_term_by('name', 'Mobile Navigation', 'nav_menu'); 
                    break; 
            } 
            
            if(isset($menu)) { 
                $locations[$locationId] = $menu->term_id; 
            } 
        } 
        set_theme_mod('nav_menu_locations', $locations); 
    }
}

function add_page_to_menu($menu, $name, $link){
    wp_update_nav_menu_item($menu->term_id, 0, [
        'menu-item-title' => __($name),
        'menu-item-classes' => '',
        'menu-item-url' => $link,
        'menu-item-type' => 'custom',
        'menu-item-status' => 'publish'
    ]);
}

// website menu data-only
function website_menu( $menuID ){

    $data = wp_get_nav_menu_items($menuID);
    $tempArray = [];
    $orderedArray = [];
    $output = [];

    if(!is_array($data)){
        return '';
    }

    foreach($data as $key => $item){
        $item->title = htmlspecialchars_decode($item->title);
        $item->classes = implode(' ', $item->classes);
        $orderedArray[$item->menu_order] = $item;
    }

    foreach($orderedArray as $item){
        $item->children = [];
        if($item->menu_item_parent == 0){
            $tempArray[] = $item;
        }else{
            foreach($tempArray as $child){
                if($item->menu_item_parent == $child->ID){
                    $child->children[] = $item;
                }else{
                    foreach($child->children as $c){
                        if($item->menu_item_parent == $c->ID){
                            $c->children[] = $item;
                        }
                    }
                }
            }
        }
    }

    $output = $tempArray;

    return json_encode($output);
}


function getPageList( $id ){
    $args = array(
        'post_parent' => $id,
        'post_type'   => 'page', 
        'numberposts' => -1,
        'post_status' => 'publish',
        'orderby'     => 'menu_order',
        'order'       => 'ASC'
    );
    $children = get_children( $args );

    $output = [];

    foreach($children as $child){
        $output[] = [
            'link'   => get_permalink($child->ID),
            'title'  => $child->post_title,
            'target' => '_self',
            'ID'     => $child->ID
        ];
    }

    return $output;
}