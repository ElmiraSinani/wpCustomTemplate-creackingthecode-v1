<?php
/**
 * Template Name: Marcus Laws Page Template
 */
get_header('buy');
?>

<div class="laws-page">
    
    
    
    <?php $lows_query = new WP_Query( array('post_type' => 'laws') );
    if ( $lows_query->have_posts() ) { 
        echo '<ul class="bxslider">';
        while ( $lows_query->have_posts() ) {
            $lows_query->the_post();  
    ?>
    
    <li>
        
        <div class="right">
            <?php
                if (has_post_thumbnail()) :
                    the_post_thumbnail('full');
                endif;
            ?> 
        </div>
        <div class="left">
            <h1 class="page-title"><?php the_title(); ?></h1>
            <div class="line"></div>
            <div class="content-text" ><?php the_content(); ?></div>   
            <div class="get-connected"><a  href="mailto:info@marcus-lim.com?Subject=Get%20Connected" target="_top">Get Connected With Marcus</a></div>
        </div>
    </li>
            
    <?php     } //and while 
    echo '</ul>';
    } else {
                // no posts found
    } 
    
    
    wp_reset_postdata(); 
    ?>
    
</div>

<?php        
// The Query
$testimonialsArgs = array(
    'post_type' => 'testimonials',
    'testimonial-cat'=>'laws'
);
$testimonial_query = new WP_Query( $testimonialsArgs );
?>

<div class="testimonials laws">
    <div class="testimonials-content">
        <ul class="bxslider">
            <?php  if ( $testimonial_query->have_posts() ) { ?>
            <?php  while ( $testimonial_query->have_posts() ) { ?>
            <?php  $testimonial_query->the_post(); ?>
            <?php  
                $author = rwmb_meta( 'testimonial-name', 'type=text' ) ? rwmb_meta( 'testimonial-name', 'type=text' ) : ''; 
                $position = rwmb_meta( 'testimonial-position', 'type=text' ) ? rwmb_meta( 'testimonial-position', 'type=text' ) : ''; 
            ?>
            <li >  
                <div class="meta">
                    <div class="author"><?php echo $author; ?></div>
                    <div class="position"><?php echo $position; ?></div>
                </div>
                <div class="testimonial-text">
                    <?php the_content(); ?>
                </div>                
            </li>
            <?php } //and while 
                } else {
                        // no posts found
                } //end if
                // Restore original Post Data 
                wp_reset_postdata(); 
            ?>
        </ul>
    </div>
</div>


<?php get_footer('buy'); ?>