<?php
/**
 * Template Name: Consultation Page Template
 */
get_header();
?>

<?php
        
// The Query
$consultArgs = array(
    'post_type' => 'consult'
);
$the_query = new WP_Query( $consultArgs );

?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="page-content-block display-block" id="post-<?php the_ID(); ?>">        
        <div class="page-title row">
            <div class="col-md-6">
                <h2><?php the_title(); ?></h2>
            </div>
            <?php  
                $showButtons = rwmb_meta( 'show-top-buttons', 'type=text' ) ? rwmb_meta( 'show-top-buttons', 'type=text' ) : ''; 
                if( $showButtons ) {
            ?>
            <div class="col-md-6 page-top-btn">
                <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
                   <?php dynamic_sidebar( 'top-sidebar' ); ?>
                <?php endif; ?> 
            </div>
            <?php } ?>
        </div>
    </div>

<?php endwhile; endif; ?>

<div class="consultation-page">
    <ul class="bxslider">
    <?php  if ( $the_query->have_posts() ) { ?>
    <?php  while ( $the_query->have_posts() ) { ?>
    <?php  $the_query->the_post(); ?>
    <li class="consultation-item">  
        <div class="consult-content" >
            <div class="title"><?php the_title(); ?></div>
            <div class="line"></div>
            <div class="text"><?php the_content(); ?></div>
        </div>    
        <!--<div class="consultation-bg" <?php if(has_post_thumbnail()){?> style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>)" <?php }?> > &nbsp; </div>-->
        <img class="consultation-bg" <?php if(has_post_thumbnail()){?> src="<?php the_post_thumbnail_url( 'full' ); ?>" <?php }?>  />    </li>
    <?php } //and while 
        } else {
                // no posts found
        } //end if
        // Restore original Post Data 
        wp_reset_postdata(); 
    ?>
    </ul>   
    
    <div class="form-register-now">
        
        <div class="reg-header">
            <div class="header-content">
                <span class="regArrow">Register now </span>
            </div> 
            <div class="header-toggle closed"></div>
        </div>
        
        <div class="form-reg-now hide">
            <div class="form-title">Register with Marcus Lim</div>
            <!--<div class="form-txt">Duis et elit sagittis, aliquam mi vel, pellentesque enim. Lorem ipsum dolor sit amet.</div>-->
            <?php echo do_shortcode('[contact-form-7 id="106" title="Reg Form"]') ?>
        </div>
    </div>
</div>


<?php get_footer(); ?>