<?php


require_once("templates/inc/custom-meta-boxes.php");

// Add RSS links to <head> section
automatic_feed_links();

// Clean up the <head>
function removeHeadLinks() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
}
add_action('init', 'removeHeadLinks');
remove_action('wp_head', 'wp_generator');

// Page Settings
add_theme_support('post-thumbnails');  

/*set_post_thumbnail_size( 'front_slider_small', 169, 169, true );    
add_image_size( 'front_slider_small', 169, 169, true ); 

set_post_thumbnail_size( 'front_slider_big', 450, 370, true );
add_image_size( 'front_slider_big', 450, 370, true );

set_post_thumbnail_size( 'about_slider_small', 196, 150, true );
add_image_size( 'about_slider_small', 196, 150, true );

set_post_thumbnail_size( 'about_slider_big', 574, 264, true );
add_image_size( 'about_slider_big', 574, 264, true );*/


function register_crackingthecode_menus() {
    register_nav_menus(
        array(
            'main-menu' => __('Main Menu','crackingthecode')
        )
    );
}
add_action('init', 'register_crackingthecode_menus');

function crackingthecode_sidebar_init() {
 register_sidebar(array(
        'name' => 'Page Top Buttons',
        'id' => 'top-sidebar',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h4>',
        'after_title' => '</h4>',
    ));
}
 add_action( 'init', 'crackingthecode_sidebar_init' );
 
 function load_styles_and_scripts() {
    
//load styles     
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/libs/bootstrap-3.3.6/dist/css/bootstrap.min.css');  
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css');  
    wp_enqueue_style('animatecss', get_template_directory_uri() . '/css/animate.css'); 
    wp_enqueue_style('scrollbarcss', get_template_directory_uri() . '/libs/scrollbar/jquery.mCustomScrollbar.min.css'); 
    
    if ( is_page( 'buy' ) ){
        wp_enqueue_style('bebostore_woo', get_template_directory_uri() . '/css/buypage_book.css'); 
        wp_enqueue_style('flipbook', get_template_directory_uri() . '/css/buypage_flipbook.css'); 
    }else{
        wp_enqueue_style('bebostore_woo', get_template_directory_uri() . '/css/bebostore_woo.css'); 
        wp_enqueue_style('flipbook', get_template_directory_uri() . '/css/css-flipbook.css'); 
    }
    
    wp_enqueue_style('custom-styles', get_template_directory_uri() . '/css/custom-styles.css');   
    
     //load scripts
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true);
    }
    
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/libs/bootstrap-3.3.6/dist/js/bootstrap.min.js', array(), '', true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array(), '', true);
    
    wp_deregister_script( 'bxslider' );
    wp_enqueue_script('bxslider', get_template_directory_uri() . '/libs/jquery.bxslider/jquery.bxslider.min.js', array(), '', true);
    
    wp_enqueue_script('scrollbarjs', get_template_directory_uri() . '/libs/scrollbar/jquery.mCustomScrollbar.concat.min.js', array(), '', true);
    
    wp_enqueue_script('custom-scripts', get_template_directory_uri() . '/js/custom-scripts.js', array(), '', true);
    
 }
 
 add_action('wp_enqueue_scripts', 'load_styles_and_scripts');

 
function getTaxTerms($taxonomies, $args){
    $terms = get_terms($taxonomies, $args);
    return $terms;
}