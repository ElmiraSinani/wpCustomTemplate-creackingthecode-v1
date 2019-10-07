 $(document).ready(function(){     
     
    $('.open-mobile-menu').on('click', function(e){ 
        $(".left-sidebar").animate({"left":"0px"}, "slow");
    });
    
    $('.close-mobile-menu').on('click', function(e){ 
        $(".left-sidebar").animate({"left":"-300px"}, "slow");
    }); 
        
    $('.mobile-slider-controls .slide').on( 'click', function(e){
        e.preventDefault();
        
        var posLeft = $('.home-posts-inner').position().left;
        var innerWidth = $('.home-posts-inner').innerWidth();
        var itemWidth = $('.mobile-slider').innerWidth();
        var maxWidth = innerWidth - itemWidth;
        console.log(maxWidth);
        
        if ( $(this).hasClass('sl-left') ){
           
            if( Math.abs(posLeft) >= (maxWidth-100) ){
               return false;
            }else{
                $('.home-posts-inner').animate({
                     left: "-="+itemWidth
                   }, 500, function() {
                     // Animation complete.
                   });
            }
        }
        if ( $(this).hasClass('sl-right') ){
           //console.log(Math.abs(posLeft));
           if( Math.abs(posLeft) == 0 ){
               return false;
            }else{
                $('.home-posts-inner').animate({
                     left: "+="+itemWidth
                   }, 500, function() {
                     // Animation complete.
                   });
            }
        }
        
    });
    
    $('.laws-page .bxslider').bxSlider({
        mode: 'fade',
        easing: 'easeOutElastic',
        //auto: true,
        controls: true,
        responsive: true,
        pager: false,
        adaptiveHeight: true,
    });
    
    $('.blog-page .bxslider').bxSlider({
        pagerCustom: '#bx-blog-pager',
        mode: 'fade',
        easing: 'easeOutElastic',
        auto: false,
        controls: false,
        adaptiveHeight: true,
        responsive: true
    });
     
    $('.top-banner .bxslider').bxSlider({
        mode: 'fade',
        easing: 'easeOutElastic',
        auto: true,
        autoControls: false,
        pager: false,
        controls: false,
        speed: 2000,
        adaptiveHeight: true,
        responsive: true
        
    });
    
    var sliderConsultation = $('.consultation-page .bxslider').bxSlider({
        mode: 'fade',
        easing: 'easeOutElastic',
        auto: true,
        speed: 2000,
        pager: true,
        controls: false,
        adaptiveHeight: true,
    });
    
    $('.consultation-bg').click(function () {       
        var current = sliderConsultation.getCurrentSlide();
        sliderConsultation.goToNextSlide(current) + 1;
    });
    
    
    
    $('.testimonials .bxslider').bxSlider({
        mode: 'fade',
        easing: 'easeOutElastic',
        auto: true,
        pager: false,
        controls: true,
        
    });
    
    //blog page tabs
    $('.blog-cats li').on('click', function(){
        var thisId = $(this).attr('id');
        $('.blog-cats li a').removeClass('active');
        $(this).find('a').addClass('active');
        
        $('.blog-content .tab').removeClass('active');
        $('.blog-content .tab.'+thisId).addClass('active');
        console.log('.blog-content .tab.'+thisId);
        
    });
    
    
    //registration form on events and consultation pages
    $('.reg-header').on('click', function(){
        var formHide = $('.form-reg-now').hasClass('hide');
        if ( formHide ){
            $('.form-reg-now').removeClass('hide');
            $('.header-toggle').removeClass('closed').addClass('opened');
        } else {
            $('.form-reg-now').addClass('hide');
            $('.header-toggle').removeClass('opened').addClass('closed');
        }
    });
    
    /* Animations on scroll Front page*/
    $('.top-banner').waypoint(function(direction) {
        $('.top-banner').addClass('animated pulse');
    }, {
        offset: '70%'
    });
    
    $('.home-posts').waypoint(function(direction) {
        $('.home-posts').addClass('animated pulse');
    }, {
        offset: '100%'
    });
    
    $('.page-content').waypoint(function(direction) {
        $('.page-content').addClass('animated pulse');
    }, {
        offset: '70%'
    });
    
     $('.review-block').addClass('animated fadeIn');
    
    if ( $(window).width() > 995 ){
        $(".blog-page .left .bxslider li").mCustomScrollbar({
                theme:"dark-thin",
                axis:"y",
                setHeight: '570px',
        });
    }
    
 });