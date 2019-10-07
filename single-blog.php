<?php get_header(); ?>


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
?>

<div class="blog-page single">
    <div class="left-content">
        <div class="content-block">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                
                <?php
                    if (has_post_thumbnail()) :
                        the_post_thumbnail('full');
                    endif;
                ?>
                <div class="content-single">
                    <div class="title"><?php the_title(); ?></div>  
                    <div class="meta">by <?php the_author() ?> on <?php the_time('F j, Y') ?></div>
                    <div class="text"><?php the_content(); ?></div>
                </div>
                

                

            <?php endwhile; endif; ?>
        </div>
    </div>
    <div class="rirght-content">
        <ul class="blog-cats">
            <?php for ($i=0; $i < 4; $i++){ ?>
                <li id="<?php echo $terms[$i]->slug; ?>">
                    <a class="<?php if( $i==0 ){ ?>active<?php }?>" ><?php echo $terms[$i]->name; ?></a>
                </li>
            <?php } ?>
        </ul>
        
        <div class="blog-content">
            
            <?php 
                for ($i=0; $i < 4; $i++) {
               
                $blog_query = new WP_Query( array('post_type' => 'blog','blog-cat' => $terms[$i]->slug ) );
                $activeTab = ($i==0) ? 'tab active' : 'tab';
                $calses = $activeTab . ' ' . $terms[$i]->slug;
            ?>
            <div class="<?php echo $calses; ?>" >
            
                <?php  if ( $blog_query->have_posts() ) { ?>
                    <?php  while ( $blog_query->have_posts() ) { ?>
                    <?php  $blog_query->the_post(); ?>
                    <div class="blog-item">
                        <div class="image">
                            <?php if(has_post_thumbnail()){ the_post_thumbnail(); } ?>
                        </div>    
                        <div class="title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="line"></div>
                        </div>

                    </div>
                <?php } //and while 
                    } else {
                            // no posts found
                    } 
                    wp_reset_postdata(); 
                ?>
            </div>
            
            <?php } //endif ?>
            
            
            <div class="blog-footer-buttons">
                <?php if ( is_active_sidebar( 'top-sidebar' ) ) : ?>
                   <?php dynamic_sidebar( 'top-sidebar' ); ?>
                <?php endif; ?> 
            </div>
            
        </div>
        
    </div>
</div>

<?php get_footer(); ?>





