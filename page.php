<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="page-content-block" id="post-<?php the_ID(); ?>">
        
        <div class="page-title row">
            <div class="col-md-6">
                <?php 
                    $customTitle = rwmb_meta( 'page-custom-title', 'type=textarea' ) ? rwmb_meta( 'page-custom-title', 'type=textarea' ) : ''; 
                    if ( $customTitle != '' ){
                        echo '<h2>'.$customTitle.'</h2>';
                    }else{
                ?>
                <h2><?php the_title(); ?></h2>
                <?php  }?>
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
        
        <div class="page-content">            
           
            <div class="image">
                <?php
                if (has_post_thumbnail()) :
                    the_post_thumbnail('full');
                endif;
                ?> 
            </div>
            <div class="text">
                <?php the_content(); ?>
            </div>
        </div>
         <div class="only-mobile">
            <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
               <?php dynamic_sidebar( 'top-sidebar' ); ?>
            <?php endif; ?> 
        </div>

    </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>