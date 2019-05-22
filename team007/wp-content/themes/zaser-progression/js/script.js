/*  Table of Contents 
01. MENU ACTIVATION
02. FITVIDES RESPONSIVE VIDEOS
03. MOBILE MENU
04. SHOW/HIDE MOBILE MENU
05. GALLERY JS
06. SCROLL TO TOP MENU JS 
07. prettyPhoto JS
08. PRELOADER JS
09. STICKY HEADER JS
10. ONE PAGE NAVIGATION JS
11. Mobile Touch Support (Portfolio Hover + Shop Hover)
*/

jQuery(document).ready(function($) {
	 'use strict';
	
/*
=============================================== 01. MENU ACTIVATION  ===============================================
*/
	 jQuery('.progression-studios-one-page-nav-off nav#site-navigation ul.sf-menu, #progression-header-top-left-container ul.sf-menu, #progression-header-top-right-container ul.sf-menu').superfish({
			 	popUpSelector: 'ul.sub-menu,.sf-mega', 	// within menu context
	 			delay:      	200,                	// one second delay on mouseout
	 			speed:      	0,               		// faster \ speed
		 		speedOut:    	200,             		// speed of the closing animation
				animation: 		{opacity: 'show'},		// animation out
				animationOut: 	{opacity: 'hide'},		// adnimation in
		 		cssArrows:     	true,              		// set to false
			 	autoArrows:  	true,                    // disable generation of arrow mark-up
		 		disableHI:      true,
	 });
	 
	 
/*
=============================================== 02. FITVIDES RESPONSIVE VIDEOS  ===============================================
*/
	 $("#content-pro").fitVids();
	 
	 
/*
=============================================== 03. MOBILE MENU  ===============================================
*/
	 	
   	$('ul.mobile-menu-pro').slimmenu({
   	    resizeWidth: '960',
   	    collapserTitle: 'Menu',
   	    easingEffect:'easeInOutQuint',
   	    animSpeed:'medium',
   	    indentChildren: false,
   		childrenIndenter: '- '
   	});
	
	
	$('.mobile-menu-icon-pro').click(function(e){
		e.preventDefault();
		$('#main-nav-mobile').stop().slideToggle(400);
		$("#masthead-pro").toggleClass("active-mobile-icon-pro");
	});
	


/*
=============================================== 04. SHOW/HIDE CART AND SEARCH  ===============================================
*/	
	var hidesearch = false;
	var hidecart = false;
	var clickOrTouch = (('ontouchend' in window)) ? 'touchend' : 'click';
	
 	$("#progression-studios-header-search-icon i.pe-7s-search").on(clickOrTouch, function(e) {
		var clicks = $(this).data('clicks');
		  if (clicks) {
		     $("#progression-studios-header-search-icon").removeClass("active-search-icon-pro");
		     $("#progression-studios-header-search-icon").addClass("hide-search-icon-pro");
			 
		  } else {
		     $("#progression-studios-header-search-icon").addClass("active-search-icon-pro");
			  $("#progression-studios-header-search-icon").removeClass("hide-search-icon-pro");
		  }
		  $(this).data("clicks", !clicks);
 	});
	
	if ($(this).width() > 959) {

	    $("#progression-shopping-cart-toggle").hover(function(){
	        if (hidecart) clearTimeout(hidecart);
			$("#progression-shopping-cart-toggle").addClass("activated-class").removeClass("hover-out-class");
	    }, function() {
	        hidecart = setTimeout(function() { 
				$("#progression-shopping-cart-toggle").removeClass("activated-class").addClass("hover-out-class");
			}, 100);
	    });
		
	}
	
	
	

/*
=============================================== 05. GALLERY JS  ===============================================
*/	
    $('.progression-studios-gallery').flexslider({
		animation: "fade",      
		slideDirection: "horizontal", 
		slideshow: false,   
		smoothHeight: false,
		slideshowSpeed: 7000,  
		animationSpeed: 1000,        
		directionNav: true,             
		controlNav: true,
		prevText: "",   
		nextText: "",
    });
	
    $('.progression-studios-theme-thumbnail-navigation').flexslider({
		animation: "slide",
		direction: "horizontel",
		animationDuration: 200,  
		controlNav: false,
		animationLoop: false,  
		directionNav: true, 
		slideshow: false,
		itemWidth:150,
		itemMargin: 22,
	  	minItems:4,
	  	maxItems:4,
		asNavFor: '.progression-studios-theme-main-image',
		prevText: "",    
		nextText: "", 
    });
	
    $('.progression-studios-theme-main-image').flexslider({
		animationLoop: true, 
		animation: "fade",
		multipleKeyboard: true,
		slideshow: false,   
		smoothHeight: false,
		slideshowSpeed: 7000,  
		animationSpeed: 1000,        
		directionNav: true,             
		controlNav: false,
		prevText: "",    
		nextText: "", 
		sync: ".progression-studios-theme-thumbnail-navigation"
    });


/*
=============================================== 06. SCROLL TO TOP MENU JS  ===============================================
*/
  	// browser window scroll (in pixels) after which the "back to top" link is shown
  	var offset = 150,
  	
	//browser window scroll (in pixels) after which the "back to top" link opacity is reduced
  	offset_opacity = 1200,
  	
	//duration of the top scrolling animation (in ms)
  	scroll_top_duration = 700,
  	
	//grab the "back to top" link
  	$back_to_top = $('#pro-scroll-top');

	//hide or show the "back to top" link
	$(window).scroll(function(){
  		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
  		if( $(this).scrollTop() > offset_opacity ) { 
  			$back_to_top.addClass('cd-fade-out');
  		}
  	});

	//smooth scroll to top
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		}, scroll_top_duration
	);
	});
	
	/* Scroll to link inside page */
	$('a.scroll-to-link').click(function(){
	  $('html, body').animate({
	    scrollTop: $( $.attr(this, 'href') ).offset().top - pro_top_offset
	  }, 400);
	  return false;
	});


/*
=============================================== 07. prettyPhoto JS  ===============================================
*/

  	$(".progression-studios-theme-main-image a[data-rel^='prettyPhoto'], .progression-studios-feaured-image-single-portfolio a[data-rel^='prettyPhoto'], .progression-studios-portfolio-content-layout a[data-rel^='prettyPhoto'], .progression-studios-default-portfolio-index a[data-rel^='prettyPhoto'], .progression-studios-grid a[data-rel^='prettyPhoto'], .progression-studios-feaured-image a[data-rel^='prettyPhoto']").prettyPhoto({
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
  			hook: 'data-rel',
			opacity: 0.7,
  			show_title: false, /* true/false */
  			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
  			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
  			custom_markup: '',
			default_width: 900,
			default_height: 506,
  			social_tools: '' /* html or false to disable */
  	});
	
	
  	$("a.lightbox, .lightbox a").prettyPhoto({
			theme: 'pp_default', /* light_rounded / dark_rounded / light_square / dark_square / facebook */
  			hook: 'class',
			opacity: 0.7,
  			show_title: false, /* true/false */
  			deeplinking: false, /* Allow prettyPhoto to update the url to enable deeplinking. */
  			overlay_gallery: false, /* If set to true, a gallery will overlay the fullscreen image on mouse over */
  			custom_markup: '',
			default_width: 900,
			default_height: 506,
  			social_tools: '' /* html or false to disable */
  	});


/*
=============================================== 08. PRELOADER JS  ===============================================
*/
	(function($) {
		var didDone = false;
		    function done() {
		        if(!didDone) {
		            didDone = true;
					$("#page-loader-pro").addClass('finished-loading');
					$("#boxed-layout-pro").addClass('progression-preloader-completed');
		        }
		    }
		    var loaded = false;
		    var minDone = false;
		    //The minimum timeout.
		    setTimeout(function(){
		        minDone = true;
		        //If loaded, fire the done callback.
		        if(loaded)  {  done(); } }, 400);
		    //The maximum timeout.
		    setTimeout(function(){  done();   }, 2000);
		    //Bind the load listener.
		    $(window).load(function(){  loaded = true;
		        if(minDone) { done(); }
		    });
	})(jQuery);


/*
=============================================== 09. STICKY HEADER JS  ===============================================
*/	
	
	/* HEADER HEIGHT FOR SPACING OF ONE PAGE NAV AND STICKY HEADER */
	var pro_top_offset = $('header#masthead-pro').height();  // get height of fixed navbar
	
	$('#progression-sticky-header').scrollToFixed({ minWidth: 959 });
	
	$(window).resize(function() {
	   var width_progression = $(document).width();
	      if (width_progression > 959) {
				/* STICKY HEADER CLASS */
				$(window).on('load scroll resize orientationchange', function () {
					
				    var scroll = $(window).scrollTop();
				    if (scroll >=  pro_top_offset ) {
				        $("#progression-sticky-header").addClass("progression-sticky-scrolled");
				    } else {
				        $("#progression-sticky-header").removeClass("progression-sticky-scrolled");
				    }
				});
			} else {
				$('#progression-sticky-header').trigger('detach.ScrollToFixed');
			}
		
	}).resize();
	


/*
=============================================== 10. ONE PAGE NAVIGATION JS  ===============================================
*/
	var $nav = $('.progression-studios-one-page-nav #site-navigation');
	var $nav2 = $('.progression-studios-one-page-nav #main-nav-mobile');
	$nav.onePageNav({
	    currentClass: 'current-menu-item',
	    scrollSpeed: 650,
		scrollOffset: pro_top_offset,
	    scrollThreshold: 0.5,
		filter: ':not(.external)',
	    easing: 'swing',
	});
	
	$nav2.on('click', 'a', function(e) {
		var currentPos = $(this).parent().prevAll().length;
		$nav.find('li').eq(currentPos).children('a').trigger('click');
		e.preventDefault();
	});

/*
=============================================== 11. Mobile Touch Support (Portfolio Hover + Shop Hover)  ===============================================
Solution: http://stackoverflow.com/questions/7573126/ipad-iphone-double-click-problem
*/
	
	$('.progression-studios-blog-overlay-styles, a.progression-studios-portfolio-image, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container')
    .live('touchstart', function(){
        isScrolling = false;
    })
    .live('touchmove', function(e){
        isScrolling = true;
    })
    .live('touchend', function(e){
        if( !isScrolling )
        {
            window.location = $(this).attr('href');
        }
    });
	
	
});