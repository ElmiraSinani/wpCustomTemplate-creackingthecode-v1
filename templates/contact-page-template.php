<?php

/**
 * Template Name: Contact Page Template
 */

get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="page-content-block" id="post-<?php the_ID(); ?>">
        
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
                <!--  <a class="btn-view">View Book</a>
                <a class="btn-download">Download Chapter</a>-->
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
                <?php  
                    $contactAddress = rwmb_meta( 'contact-address', 'type=textarea' ) ? rwmb_meta( 'contact-address', 'type=text' ) : ''; 
                    $contactPhone = rwmb_meta( 'contact-phone', 'type=text' ) ? rwmb_meta( 'contact-phone', 'type=text' ) : ''; 
                    $contactMobile = rwmb_meta( 'contact-mobile', 'type=text' ) ? rwmb_meta( 'contact-mobile', 'type=text' ) : ''; 
                    $contactEmail = rwmb_meta( 'contact-email', 'type=text' ) ? rwmb_meta( 'contact-email', 'type=text' ) : ''; 
                    $contactFormTitle = rwmb_meta( 'contact-form-title', 'type=text' ) ? rwmb_meta( 'contact-form-title', 'type=text' ) : ''; 
                    $contactFormText = rwmb_meta( 'contact-form-text', 'type=text' ) ? rwmb_meta( 'contact-form-text', 'type=text' ) : ''; 
                    $contactFormCode = rwmb_meta( 'contact-form-shortcode', 'type=text' ) ? rwmb_meta( 'contact-form-shortcode', 'type=text' ) : ''; 
                ?>
                
                <div class="contact-page-content">
                    <h2>Address</h2>
                    <?php if($contactAddress != ''){ ?>
                    <div class="address-icon"><?php echo $contactAddress; ?></div>
                    <?php } ?>
                    
                    <hr />
                    <h2>Contact</h2>
                    <?php if($contactPhone != ''){ ?>
                        <div class="phone-icon"><?php echo $contactPhone; ?>
                    </div>
                    <?php } ?>
                    
                    <?php if($contactMobile != ''){ ?>
                    <div class="mobile-icon"><?php echo $contactMobile; ?></div>
                    <?php } ?>
                    
                    <?php if($contactEmail != ''){ ?>
                    <div class="mail-icon"><?php echo $contactEmail; ?></div>
                    <?php } ?>
                    <hr />
                    
                    <?php if($contactFormTitle != ''){ ?>
                    <h3><?php echo $contactFormTitle; ?></h3>
                    <?php } ?>
                    
                    <?php if($contactFormCode != ''){ ?>
                    <div class="form-block">
                    <?php echo do_shortcode($contactFormCode); ?>                    
                    </div>
                    <?php } ?>
                    
                </div>
                    
                <?php //the_content(); ?>
            </div>
        </div>

    </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>