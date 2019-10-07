<?php
/**
 * Template Name: Buy Page Template
 */
get_header('buy');
?>

<?php
        
// The Query
$prodArgs = array(
    'post_type' => 'products',
    'posts_per_page' => 1,
);
$product_query = new WP_Query( $prodArgs );

?>



<div class="buy-container">
    
    <?php  if ( $product_query->have_posts() ) { ?>
    <?php  while ( $product_query->have_posts() ) { ?>
    <?php  $product_query->the_post(); ?>
    <?php  
        $author = rwmb_meta( 'prod-name', 'type=text' ) ? rwmb_meta( 'prod-name', 'type=text' ) : ''; 
        $bookPx = rwmb_meta( 'prod-book-px', 'type=text' ) ? rwmb_meta( 'prod-book-px', 'type=text' ) : ''; 
        $amount = rwmb_meta( 'prod-item-amount', 'type=text' ) ? rwmb_meta( 'prod-item-amount', 'type=text' ) : ''; 
        $email = rwmb_meta( 'prod-merchant-email', 'type=text' ) ? rwmb_meta( 'prod-merchant-email', 'type=text' ) : ''; 
    ?>
    
    <div class="prod-content">
        <h1><?php the_title(); ?></h1>
        <h2>
            Author: <?php echo $author; ?> 
            <?php if( $bookPx != '' ){ ?>| Book Px - <span><?php echo $bookPx; ?></span> <?php } ?>
        </h2>
        <div class="line"></div>
        <div class="content-block">
           <?php the_content(); ?>
        </div>
        <div class="button">
            <form action="https://secure.smoovpay.com/access" method="post">
                <input type="hidden" name="action" value="pay" />
                <input type="hidden" name="currency" value="SGD" />
                <input type="hidden" name="version" value="2.0" />
                <input type="hidden" name="item_name_1" value="Book Purchase" />
                <input type="hidden" name="item_description_1" value="Cracking The Code" />
                <input type="hidden" name="item_quantity_1" value="1" />
                <input type="hidden" name="item_amount_1" value="<?php echo $amount; ?>" />
                <input type="hidden" name="merchant" value="<?php echo $email; ?>" />
                <input type="hidden" name="ref_id" value="SampleReference" />
                <input type="hidden" name="delivery_charge" value="0.00" />
                <input type="hidden" name="tax_amount" value="0.00" />
                <input type="hidden" name="tax_percentage" value="0.00" />
                <input type="hidden" name="total_amount" value="<?php echo $amount; ?>" />
                <input type="hidden" name="str_url" value="" />
                <input type="hidden" name="success_url" value="http://www.yourweb.com/SuccessPage" />
                <input type="hidden" name="cancel_url" value="http://www.yourweb.com/" />
                <input type="hidden" name="signature" value="737740966b3a44c3ba1283546e0272c109868652" />
                <input type="hidden" name="signature_algorithm" value="sha1" />
                <input type="submit" name="submit v2" value="Get On Waiting List" alt="Get On Waiting List" class="start-btn" />
            </form>
            <!--<a href="<?php echo $btnUrl; ?>" class="start-btn">Get it now</a>-->
        </div>
    </div>
    <div class="prod-image">
        
        <section class="hight-light-tmp">
           
            <div class="book-today-hightlight">

            <div class="book-hightlight">
                <ul class="bk-list clearfix">
                    <li style="">
                        <div class="bk-book book-2 bk-bookdefault" style="">
                            <div class="bk-front">
                                <div class="bk-cover-back" style=""></div>
                                <div class="bk-cover" <?php if(has_post_thumbnail()){?> style="background-image: url(<?php the_post_thumbnail_url( 'full' ); ?>);" <?php } ?> >                                            
                                </div>
                            </div>
                            <div class="bk-right" style=""></div>
                            <div class="bk-left" style="">                                       
                                <h2><span>Cracking The Code</span></h2>
                            </div>

                            <div class="bk-top"></div>
                            <div class="bk-bottom"></div>
                        </div>

                    </li>
                </ul>

            </div>

            </div>
           
        </section>
        
    </div>
    
    <?php } //and while 
        } else {
                // no posts found
        } //end if
        // Restore original Post Data 
        wp_reset_postdata(); 
    ?>
 
</div>

<?php        
// The Query
$testimonialsArgs = array(
    'post_type' => 'testimonials',
    'testimonial-cat'=>'buy'
);
$testimonial_query = new WP_Query( $testimonialsArgs );
?>

<div class="testimonials">
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
                <div class="testimonial-title" >
                    <div class="author"><?php echo $author; ?></div>
                    <div class="image">
                        <?php 
                            if ( has_post_thumbnail() ) {
                                the_post_thumbnail();
                            } 
                        ?>
                    </div>
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


</div> <!-- /.right-content -->


<?php get_footer('buy'); ?>