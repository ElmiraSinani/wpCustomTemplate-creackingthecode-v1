<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="page-content-block" id="post-<?php the_ID(); ?>">
        
        <div class="page-title row">
            <div class="col-md-6">
                <h2><?php the_title(); ?></h2>
            </div>
            
        </div>
        
        <div class="post-content">
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

    </div>

<?php endwhile; endif; ?>

<?php get_footer(); ?>