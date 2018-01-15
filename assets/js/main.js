(function ($) {
	
	$(function () {
		
        'use strict';
        
        var $body = $('body'),
        $home = $('.home'),
        $header = $body.find('header'),
        $nav = $header.find('#site-navigation'),
        $title = $nav.find('.site-title-small'),
        $buttonUp = $body.find('.button-up'),
        $buttonToggle = $header.find('.toggle-button'),
        $headerOffSet = $header.outerHeight(true) - $nav.innerHeight();

        $title.css('display','none');
        $buttonUp.fadeOut();
		$(window).on('scroll', function(){
            
            if ($(this).scrollTop() >= $headerOffSet) {
                
                $nav.addClass('fixed');
                $buttonToggle.addClass('fixed');
                $title.fadeIn(); 
                
            } else {
                $nav.removeClass('fixed');
                $buttonToggle.removeClass('fixed');
                $title.fadeOut();
                
            }

            if ($(this).scrollTop()>=500){
                $buttonUp.fadeIn();
            }else{
                $buttonUp.fadeOut();
            }
            
        });

        AOS.init({
            disable: 'mobile'
        });

        // bx slider
        $('.related-slider').bxSlider({
            auto:true,
            pause:4000,
            autoHover:true,
            captions: false,
            responsive:true,
            adaptiveHeight:true
        }); 
        // end bxslider

        

        $('.button-up').on('click',function(){
            console.log('click');
            $.scrollTo('header',800);
        });

        $('.gallery a').each(function(){
            $(this).attr({'data-lightbox':$(this).parent().parent().parent().attr('id')});
        });


        
      
	});
	
})(jQuery);
