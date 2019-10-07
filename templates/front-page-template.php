<?php
/**
 * Template Name: Front Page Template
 */
get_header();
?>

<div class="top-banner">
    <?php 
    // The Query
    $sliderArgs = array(
        'post_type' => 'sl-front'
    );
    $sl_query = new WP_Query( $sliderArgs );
    ?>
    <ul class="bxslider">
    <?php  if ( $sl_query->have_posts() ) { ?>
    <?php  while ( $sl_query->have_posts() ) { ?>
    <?php  $sl_query->the_post(); ?>
    <?php
        $showTitle = rwmb_meta( 'sl-show-title', 'type=text' ) ? rwmb_meta( 'sl-show-title', 'type=text' ) : ''; 
        $btnText = rwmb_meta( 'sl-btn-text', 'type=text' ) ? rwmb_meta( 'sl-btn-text', 'type=text' ) : ''; 
        $btnUrl = rwmb_meta( 'sl-btn-url', 'type=text' ) ? rwmb_meta( 'sl-btn-url', 'type=text' ) : ''; 
    ?>
      <li>
          <img <?php if(has_post_thumbnail()){?> src="<?php the_post_thumbnail_url( 'full' ); ?>" <?php }?>  /> 
          <!--<img src="<?php bloginfo('template_directory'); ?>/images/forUpload/homebanner.jpg" />-->
           <div class="banner-abs-content">
                <?php if( $showTitle != '' ) { ?>
                <div class="text">
                   <?php the_title(); ?>
                </div>
                <div class="line"></div>
                <?php } ?>
               
                <?php if( $btnText != '') { ?>
                <div class="button">
                    <a href="/about" class="start-btn">Start here</a>
                </div>
                <?php } ?>
                
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

<div class="row home-posts">
    <div class="mobile-slider-controls">
        <div class="slide sl-right"></div>
        <div class="slide sl-left"></div>
    </div>
    
    <?php 
    // The Query
    $frontPostsArgs = array(
        'post_type' => 'front-posts'
    );
    $posts_query = new WP_Query( $frontPostsArgs );
    
    ?>
    
    <div class="overflow-hidden">
        <div class="home-posts-inner">
            <?php  if ( $posts_query->have_posts() ) { ?>
            <?php  while ( $posts_query->have_posts() ) { ?>
            <?php  $posts_query->the_post(); ?>
            <?php $url = rwmb_meta( 'front-post-url', 'type=text' ) ? rwmb_meta( 'front-post-url', 'type=text' ) : '#'; ?>
            <div class="col-md-4 mobile-slider">
                <div class="image">
                    <img <?php if(has_post_thumbnail()){?> src="<?php the_post_thumbnail_url(); ?>" <?php }?>  /> 
                </div>
                <div class="content">
                    <h1><a href="<?php echo $url; ?>"><?php the_title(); ?></a></h1>
                    <div class="line"></div>
                    <div class="text">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
            <?php } //and while 
                } else {
                        // no posts found
                } //end if
                // Restore original Post Data 
                wp_reset_postdata(); 
            ?>            
        </div>
    </div>
</div>


<?php get_footer(); ?>