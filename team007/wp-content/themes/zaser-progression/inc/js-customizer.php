<?php
/**
 * Progression JS Customizer
 *
 * @package pro
 */

function progression_studios_enqueue_script() {
	
	if ( get_theme_mod( 'progression_studios_header_sticky', 'sticky-pro' ) == 'sticky-pro' && get_theme_mod( 'progression_studios_header_width' ) == 'progression-studios-header-sidebar' ) {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
			$(window).load(function() { 
				setInterval(function(){
				$("#progression-studios-sidebar-sticky-header").scrollChaser({ offsetBottom: 70 });
				}, 200);
			});
		});
	' 
	);
	}

	if ( is_post_type_archive( 'portfolio' ) && get_theme_mod( 'progression_portfolio_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_tax( 'portfolio-category' ) && get_theme_mod( 'progression_portfolio_pagination', 'progression_default_pagination') == 'progression_default_pagination' ) {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-portfolio-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_portfolio_columns", "3")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
	});
	' 
	);
	}
	
	if ( is_post_type_archive( 'portfolio' ) && get_theme_mod( 'progression_portfolio_pagination') == 'progression_load_pagination' || is_tax( 'portfolio-category' ) && get_theme_mod( 'progression_portfolio_pagination') == 'progression_load_pagination') {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-portfolio-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_portfolio_columns", "3")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
			
			/* Begin Infinite Scroll */
			$container.infinitescroll({
				errorCallback: function(){  $("#infinite-nav-pro").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
			  navSelector  : "#infinite-nav-pro",  
			  nextSelector : ".nav-previous a", 
			  itemSelector : ".progression-masonry-item", 
		   		loading: {
		   		 	img: "' . esc_url( get_template_directory_uri() ) . '/images/loader.gif",
		   			 msgText: "",
		   		 	finishedMsg: "<div id=' . "'" . 'no-more-posts' . "'" . '>' . esc_html__( "No more posts", "zaser-progression" ) . '</div>",
		   		 	speed: 0, }
			  },
			  // trigger Isotope as a callback
			  function( newElements ) {

			    var $newElems = $( newElements );
		 	
			    $(".progression-studios-gallery").flexslider({
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
		 
			   	$(".progression-studios-portfolio-content-layout a[data-rel^=' . "'" . 'prettyPhoto' . "'" . '], .progression-studios-default-portfolio-index a[data-rel^=' . "'" . 'prettyPhoto' . "'" . ']").prettyPhoto({
						theme: "pp_default",
			  			hook: "data-rel",
						opacity: 0.7,
			  			show_title: false, 
			  			deeplinking: false, 
			  			overlay_gallery: false,
			  			custom_markup: "",
						default_width: 900,
						default_height: 506,
			  			social_tools:""
			   	});
			
					$(".progression-studios-default-portfolio-index").fitVids();

					$newElems.imagesLoaded(function(){
						$newElems.each(function(i, el) {        
						  window.setTimeout(function(){
						    $(el).addClass("opacity-progression");
						  }, 200 * i);
						});
						$container.isotope( "appended", $newElems );
				});

			  }
			);
		    /* END Infinite Scroll */

			/* PAUSE FOR LOAD MORE */
			$(window).unbind(".infscr");
			// Resume Infinite Scroll
			$(".nav-previous a").click(function(){
				$container.infinitescroll("retrieve");
				return false;
			});
			/* End Infinite Scroll */
			
	});
	' 
	);
	}
	
	if ( is_post_type_archive( 'portfolio' ) && get_theme_mod( 'progression_portfolio_pagination') == 'progression_infinite_pagination' || is_tax( 'portfolio-category' ) && get_theme_mod( 'progression_portfolio_pagination') == 'progression_infinite_pagination') {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-portfolio-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_portfolio_columns", "3")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
			
			/* Begin Infinite Scroll */
			$container.infinitescroll({
				errorCallback: function(){  $("#infinite-nav-pro").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
			  navSelector  : "#infinite-nav-pro",  
			  nextSelector : ".nav-previous a", 
			  itemSelector : ".progression-masonry-item", 
		   		loading: {
		   		 	img: "' . esc_url( get_template_directory_uri() ) . '/images/loader.gif",
		   			 msgText: "",
		   		 	finishedMsg: "<div id=' . "'" . 'no-more-posts' . "'" . '>' . esc_html__( "No more posts", "zaser-progression" ) . '</div>",
		   		 	speed: 0, }
			  },
			  // trigger Isotope as a callback
			  function( newElements ) {

			    var $newElems = $( newElements );
		 	
			    $(".progression-studios-gallery").flexslider({
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
		 
			   	$(".progression-studios-portfolio-content-layout a[data-rel^=' . "'" . 'prettyPhoto' . "'" . '], .progression-studios-default-portfolio-index a[data-rel^=' . "'" . 'prettyPhoto' . "'" . ']").prettyPhoto({
						theme: "pp_default",
			  			hook: "data-rel",
						opacity: 0.7,
			  			show_title: false, 
			  			deeplinking: false, 
			  			overlay_gallery: false,
			  			custom_markup: "",
						default_width: 900,
						default_height: 506,
			  			social_tools:""
			   	});
			
					$(".progression-studios-default-portfolio-index").fitVids();

					$newElems.imagesLoaded(function(){
						$newElems.each(function(i, el) {        
						  window.setTimeout(function(){
						    $(el).addClass("opacity-progression");
						  }, 200 * i);
						});
					    $container.isotope( "appended", $newElems );
				});

			  }
			);
		    /* END Infinite Scroll */

			
	});
	' 
	);
	}
	
	
	
	
	
   
	if ( is_post_type_archive( 'post' ) &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_home() &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination'  || is_search() &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_author() &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_tag() &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_category()  &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination' || is_date()  &&  get_theme_mod( 'progression_blog_pagination', 'progression_default_pagination') == 'progression_default_pagination') {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_blog_columns", "1")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
	});
	' 
	);
	}

	if ( is_post_type_archive( 'post' ) &&  get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination' || is_home() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination'  || is_search() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination' || is_author() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination'  || is_tag() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination' || is_category() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination' || is_date() && get_theme_mod( 'progression_blog_pagination') == 'progression_load_pagination' ) {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_blog_columns", "1")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
			
			/* Begin Infinite Scroll */
			$container.infinitescroll({
				errorCallback: function(){  $("#infinite-nav-pro").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
			  navSelector  : "#infinite-nav-pro",  
			  nextSelector : ".nav-previous a", 
			  itemSelector : ".progression-masonry-item", 
		   		loading: {
		   		 	img: "' . esc_url( get_template_directory_uri() ) . '/images/loader.gif",
		   			 msgText: "",
		   		 	finishedMsg: "<div id=' . "'" . 'no-more-posts' . "'" . '>' . esc_html__( "No more posts", "zaser-progression" ) . '</div>",
		   		 	speed: 0, }
			  },
			  // trigger Isotope as a callback
			  function( newElements ) {

			    var $newElems = $( newElements );
		 	
			    $(".progression-studios-gallery").flexslider({
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
		 
			   	$(".progression-studios-feaured-image a[data-rel^=' . "'" . 'prettyPhoto' . "'" . ']").prettyPhoto({
						theme: "pp_default",
			  			hook: "data-rel",
						opacity: 0.7,
			  			show_title: false, 
			  			deeplinking: false, 
			  			overlay_gallery: false,
			  			custom_markup: "",
						default_width: 900,
						default_height: 506,
			  			social_tools:""
			   	});
			
					$(".progression-studios-feaured-image, .progression-blog-content").fitVids();

					$newElems.imagesLoaded(function(){
						$newElems.each(function(i, el) {        
						  window.setTimeout(function(){
						    $(el).addClass("opacity-progression");
						  }, 200 * i);
						});
					    $container.isotope( "appended", $newElems );
				});

			  }
			);
		    /* END Infinite Scroll */

			/* PAUSE FOR LOAD MORE */
			$(window).unbind(".infscr");
			// Resume Infinite Scroll
			$(".nav-previous a").click(function(){
				$container.infinitescroll("retrieve");
				return false;
			});
			/* End Infinite Scroll */
			
	});
	' 
	);
	}
	
	
	if ( is_post_type_archive( 'post' ) && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_home() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_search() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_author() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_tag() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_category() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' || is_date() && get_theme_mod( 'progression_blog_pagination') == 'progression_infinite_pagination' ) {
   wp_add_inline_script( 'progression-plugins', '	
		jQuery(document).ready(function($) { "use strict";
		
			/* Default Isotope Load Code */
			var $container = $(".progression-masonry").isotope();
			$container.imagesLoaded( function() {
				var els = $(".progression-masonry-item"), i = 0, f = function () { $(els[i++]).addClass("opacity-progression");  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					itemSelector: ".progression-masonry-item",
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
			  		 columnWidth: ".progression-masonry-col-' . esc_attr(get_theme_mod( "progression_studios_blog_columns", "1")) . '", 
					},
 				});
			});
			/* END Default Isotope Code */
			
			/* Begin Infinite Scroll */
			$container.infinitescroll({
				errorCallback: function(){  $("#infinite-nav-pro").delay(500).fadeOut(500, function(){ $(this).remove(); }); },
			  navSelector  : "#infinite-nav-pro",  
			  nextSelector : ".nav-previous a", 
			  itemSelector : ".progression-masonry-item", 
		   		loading: {
		   		 	img: "' . esc_url( get_template_directory_uri() ) . '/images/loader.gif",
		   			 msgText: "",
		   		 	finishedMsg: "<div id=' . "'" . 'no-more-posts' . "'" . '>' . esc_html__( "No more posts", "zaser-progression" ) . '</div>",
		   		 	speed: 0, }
			  },
			  // trigger Isotope as a callback
			  function( newElements ) {

			    var $newElems = $( newElements );
		 	
			    $(".progression-studios-gallery").flexslider({
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
		 
			   	$(".progression-featured-blog a[data-rel^=' . "'" . 'prettyPhoto' . "'" . ']").prettyPhoto({
						theme: "pp_default",
			  			hook: "data-rel",
						opacity: 0.7,
			  			show_title: false, 
			  			deeplinking: false, 
			  			overlay_gallery: false,
			  			custom_markup: "",
						default_width: 900,
						default_height: 506,
			  			social_tools:""
			   	});
			
					$(".progression-studios-feaured-image, .progression-blog-content").fitVids();

					$newElems.imagesLoaded(function(){
						$newElems.each(function(i, el) {        
						  window.setTimeout(function(){
						    $(el).addClass("opacity-progression");
						  }, 200 * i);
						});
					    $container.isotope( "appended", $newElems );
				});

			  }
			);
		    /* END Infinite Scroll */

			
	});
	' 
	);
	}
	
}
add_action( 'wp_enqueue_scripts', 'progression_studios_enqueue_script' );