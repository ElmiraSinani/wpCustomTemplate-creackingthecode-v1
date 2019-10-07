<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<?php if (is_search()) { ?>
	   <meta name="robots" content="noindex, nofollow" /> 
	<?php } ?>

	<title>
		   <?php
		      if (function_exists('is_tag') && is_tag()) {
		         single_tag_title("Tag Archive for &quot;"); echo '&quot; - '; }
		      elseif (is_archive()) {
		         wp_title(''); echo ' Archive - '; }
		      elseif (is_search()) {
		         echo 'Search for &quot;'.wp_specialchars($s).'&quot; - '; }
		      elseif (!(is_404()) && (is_single()) || (is_page())) {
		         wp_title(''); echo ' - '; }
		      elseif (is_404()) {
		         echo 'Not Found - '; }
		      if (is_home()) {
		         bloginfo('name'); echo ' - '; bloginfo('description'); }
		      else {
		          bloginfo('name'); }
		      if ($paged>1) {
		         echo ' - page '. $paged; }
		   ?>
	</title>
	
	<link rel="shortcut icon" href="./favicon.ico">
	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->
        
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
            ga('create', 'UA-77801521-1', 'auto');
            ga('send', 'pageview');
        </script>	

	<?php if ( is_singular() ) wp_enqueue_script('comment-reply'); ?>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    
    <div class="buy-page full-content-block">
        <div class="mobile-logo-block">
            <div class="inner-block">
            <div class="open-mobile-menu"></div>
                <a class="mobile-logo" href="<?php echo home_url(); ?>">
                    <img src="<?php echo bloginfo('template_directory');?>/images/logoML.png"  border="0" alt=""/>
                </a>
            </div>            
        </div>
        <div class="left-sidebar">
            <div class="logo">
                <a href="<?php echo home_url(); ?>">
                    <img src="<?php echo bloginfo('template_directory');?>/images/logoML.png"  border="0" alt=""/>
                </a>
            </div>
            
             <div class="mainMenuBlock">
                 <div class="close-mobile-menu"></div>
                <?php 

                    wp_nav_menu( array(
                        //'menu' => 'Main Menu',
                        'container_class' => 'main_menu', 
                        'theme_location' => 'main-menu' 
                    ) );
                ?>
            </div>
            
            
            
            
            <div class="social-icons">
<!--                <a href="#" class="fa-social">
                    <i class="fa fa-facebook"></i>
                </a>-->
                <a href="#" class="fa-social">
                    <i class="fa fa-linkedin"></i>
                </a>
            </div>
            
        </div>
        
        <div class="right-content">
    
    
    
    
        
       