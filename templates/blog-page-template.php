<?php
/**
 * Template Name: Blog Page Template
 */
get_header();
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<?php 
    $postTitle = get_the_title();
    $showButtons = rwmb_meta( 'show-top-buttons', 'type=text' ) ? rwmb_meta( 'show-top-buttons', 'type=text' ) : ''; 
    $subTitle = rwmb_meta( 'blog-sub-title', 'type=text' ) ? rwmb_meta( 'blog-sub-title', 'type=text' ) : ''; 
    $buttonUrl = rwmb_meta( 'blog-button-url', 'type=text' ) ? rwmb_meta( 'blog-button-url', 'type=text' ) : '#'; 
    $blogBg = rwmb_meta( 'blog-bg-image', 'type=image_advanced' ) ? rwmb_meta( 'blog-bg-image', 'type=image_advanced' ) : ''; 
?>
<?php endwhile; endif; ?>

<?php

$taxonomies = array( 'blog-cat');
$args = array( 
    'hide_empty'=> false,
    'parent' => 0,    
);
$terms = getTaxTerms($taxonomies, $args);
//$terms = array_reverse($terms);

$leftContent = '';
$rightContent = '';
$pager = '';
$j =0;
for ($i=0; $i < 4; $i++) {
$blog_query = new WP_Query( array('post_type' => 'blog','blog-cat' => $terms[$i]->slug ) );
$activeTab = ($j==0) ? 'tab active' : 'tab';
$calses = $activeTab . ' ' . $terms[$i]->slug;

    if ( $blog_query->have_posts() ) { 
        while ( $blog_query->have_posts() ) { 
            $blog_query->the_post();
            
            $calses = $activeTab . ' ' . $terms[$i]->slug;
            
            $imgUrl = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
            
                        
            $leftContent .=  '<li><div class="content-single">';
            //$leftContent .=  '<img src="'.$imgUrl.'" />';
            $leftContent .=  '<div class="title">'.get_the_title().'</div>';
            $leftContent .=  '<div class="meta">by '.get_the_author().' on '.get_the_time('F j, Y').'</div>';
            $leftContent .=  '<div class="text" >'. get_the_content().'</div>';
            $leftContent .= '</div></li>';
            
            $pager .= '<a data-slide-index="'.$j.'" >';
            $pager .= '<div class="'.$calses.'" >'; //classes
            $pager .= '<div class="blog-item">'; //blog-item            
            $pager .= '<div class="image"><img src="'.$imgUrl.'" /></div>';
            $pager .= '<div class="title">';
            $pager .= '<span>'.get_the_title().'</span>';
            $pager .= '<div class="line"></div>';
            $pager .= '</div>'; //title
            $pager .= '</div>'; //blog item
            $pager .= '</div>';//classes
            $pager .= '</a>';
         $j++;    
        } //and while 
    } else {
        // no posts found
    } 
    wp_reset_postdata(); 
                        
?>
 <?php } //endif ?>


<div class="blog-page single">
    <div class="right">
        <ul class="blog-cats">
            <?php for ($i=0; $i < 4; $i++){ ?>
                <li id="<?php echo $terms[$i]->slug; ?>">
                    <a class="<?php if( $i==0 ){ ?>active<?php }?>" ><?php echo $terms[$i]->name; ?></a>
                </li>
            <?php } ?>
        </ul>
        <div id="bx-blog-pager" class="blog-content">            
            <?php echo $pager; ?>            
        </div>
        <div class="blog-footer-buttons">
            <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
               <?php dynamic_sidebar( 'top-sidebar' ); ?>
            <?php endif; ?> 
        </div>
    </div>
    <div class="left">
        <div class="content-block">
            <ul class="bxslider"><?php echo $leftContent; ?></ul>
        </div>
        <div class="only-mobile">
            <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
               <?php dynamic_sidebar( 'top-sidebar' ); ?>
            <?php endif; ?> 
        </div>
    </div>
    
</div>

<?php get_footer(); ?>