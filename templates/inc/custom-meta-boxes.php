<?php

add_filter( 'rwmb_meta_boxes', 'ccode_meta_boxes' );
function ccode_meta_boxes( $meta_boxes ) {
    
    
    
    $meta_boxes[] = array(
        'title'      => __( 'Page Settings', 'ccode' ),
        'post_types' => 'page',
        'fields'     => array(
            array(
                'id'   => 'show-top-buttons',
                'name' => __( 'Show Top Buttons', 'ccode' ),
                'type' => 'checkbox',
                'desc' => __( 'Show Page Top (View Book & Download Chapter) buttons.', 'ccode' ),
            ),
            array(
                'id'   => 'page-custom-title',
                'name' => __( 'Page Custom Title', 'ccode' ),
                'type' => 'textarea',
                'desc' => __( 'It Will Override Original Page Title. Leave it blank when don\'t need this option', 'ccode' ),
            ),
            
        ),
    );
    
    $meta_boxes[] = array(        
        'title'      => 'Testimonials Fields',
        'post_types' => array( 'testimonials' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'name'  => __( 'Name', 'ccode' ),
                'id'   => 'testimonial-name',
                'desc' => __( 'Author name', 'ccode' ),
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Position', 'ccode' ),
                'id'   => 'testimonial-position',
                'desc' => __( 'Author Position', 'ccode' ),
                'type'  => 'text',               
            ),
        )
    );
    
    $meta_boxes[] = array(
       
        'title'      => 'Product Fields',
        'post_types' => array( 'products' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
             array(
                'name'  => __( 'Author Name', 'ccode' ),
                'id'   => 'prod-name',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Book Px', 'ccode' ),
                'id'   => 'prod-book-px',
                'type'  => 'text',               
            ),
            array(
                'name'  => __( 'Item Amount', 'ccode' ),
                'id'   => 'prod-item-amount',
                'type'  => 'text'
            ),
            array(
                'name'  => __( 'Merchant Email', 'ccode' ),
                'id'   => 'prod-merchant-email',
                'type'  => 'text'
            ),
        )
    );
    $meta_boxes[] = array(
       
        'title'      => 'Custom Link',
        'post_types' => array( 'front-posts' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
             array(
                'name'  => __( 'Custom Post Link', 'ccode' ),
                'id'   => 'front-post-url',
                'type'  => 'text',               
            ),           
        )
    );
    
    $meta_boxes[] = array(       
        'title'      => 'Slider Settings',
        'post_types' => array( 'sl-front' ),
        'context'    => 'normal',
        'priority'   => 'high',
        'fields' => array(
            array(
                'id'   => 'sl-show-title',
                'name' => __( 'Show Title', 'ccode' ),
                'type' => 'checkbox',
                'desc' => __( 'Show Title on slidet', 'ccode' ),
            ),
            array(
                'name'  => __( 'Button Text', 'ccode' ),
                'id'   => 'sl-btn-text',
                'type'  => 'text',               
            ),           
            array(
                'name'  => __( 'Button URL', 'ccode' ),
                'id'   => 'sl-btn-url',
                'type'  => 'text',               
            ),           
        )
    );
    
    return $meta_boxes;
}


add_action('admin_init','my_meta_init');

function my_meta_init()
{
    if( !class_exists('RW_Meta_Box') )
        return;
    
    $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
   
    // checks for post/page ID
    if ($post_id == '19')
    {
        remove_post_type_support('page', 'editor');
        $meta_boxes = array();

        $meta_boxes[] = array(       
            'title'      => 'Contact Fields',
            'post_types' => array( 'page' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'fields' => array(
                array(
                    'name'  => __( 'Address', 'ccode' ),
                    'id'   => 'contact-address',
                    'type'  => 'textarea',               
                ),
                array(
                    'name'  => __( 'Phone', 'ccode' ),
                    'id'   => 'contact-phone',
                    'type'  => 'text',               
                ),
                array(
                    'name'  => __( 'Mobile', 'ccode' ),
                    'id'   => 'contact-mobile',
                    'type'  => 'text',               
                ),
                array(
                    'name'  => __( 'Email', 'ccode' ),
                    'id'   => 'contact-email',
                    'type'  => 'text',               
                ),
                array(
                    'name'  => __( 'Form Tile', 'ccode' ),
                    'id'   => 'contact-form-title',
                    'type'  => 'text',               
                ),
                array(
                    'name'  => __( 'Form Text', 'ccode' ),
                    'id'   => 'contact-form-text',
                    'type'  => 'textarea',               
                ),
                array(
                    'name'  => __( 'Form Shortcode', 'ccode' ),
                    'id'   => 'contact-form-shortcode',
                    'type'  => 'text',               
                ),
            )
        );

        foreach ( $meta_boxes as $meta_box )
        {
                new RW_Meta_Box( $meta_box );
        }
    }
    
    if ($post_id == '17')
    {
        $meta_boxes = array();
        remove_post_type_support('page', 'editor');
            
        $meta_boxes[] = array(       
            'title'      => 'Blog Page Fields',
            'post_types' => array( 'page' ),
            'context'    => 'normal',
            'priority'   => 'high',
            'fields' => array(                   
                array(
                    'name'  => __( 'Sub Tile', 'ccode' ),
                    'id'   => 'blog-sub-title',
                    'type'  => 'text',               
                ),
                array(
                    'name'  => __( 'Button Url', 'ccode' ),
                    'id'   => 'blog-button-url',
                    'type'  => 'text',               
                ),
                array(
                    'id'               => 'blog-bg-image',
                    'name'             => __( 'Blog Page Background', 'ccode' ),
                    'type'             => 'image_advanced',
                    // Delete image from Media Library when remove it from post meta?
                    // Note: it might affect other posts if you use same image for multiple posts
                    'force_delete'     => false,
                    // Maximum image uploads
                    'max_file_uploads' => 1,
                ),

            )
        );

        foreach ( $meta_boxes as $meta_box )
        {
                new RW_Meta_Box( $meta_box );
        }
    }
}