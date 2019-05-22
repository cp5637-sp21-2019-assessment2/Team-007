<?php

/**
 * Portfolio Shortcode
 */


// [progression_portfolio heading_pro="" portfolio_description_pro="" etc...]
add_shortcode( 'progression_portfolio', 'progression_portfolio_func' );
function progression_portfolio_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
		
	  'progression_studios_portfolio_columns' => '3',
	  'portfolio_post_count' => '24',
	  'progression_studios_portfolio_padding' => '10',
	  'portfolio_pagination' => 'pagination_off',
	  'portfolio_filter_categories' => '',
	  'portfolio_filter_text' => 'All',
	  'portfolio_sorting_pro' => 'false',
	  'progression_studios_portfolio_layout' => 'default',
	  'portfolio_image_opacity' => '',  
	  'portfolio_heading_size' => '',
	  'portfolio_category_size' => '',
	  'portfolio_content_margin' => '',
	  'portfolio_excerpt' => 'false',
	  'portfolio_secondary_bg_color' => 'false',	  
	  'progression_studios_portfolio_cropping' => 'tall',
	  'portfolio_carousel_nav' => 'true',
	  'portfolio_carousel_bullet_nav' => 'false',
	  'portfolio_carousel_scroll_items' => '1',
	  'portfolio_carousel_autoplay_onoff' => 'false',
	  'portfolio_carousel_duration' => '5000',
	  'portfolio_category_disable' => 'false',
	  'portfolio_excerpt_disable' => 'false',
	  'post_masonry_disable' => 'false',
	  'portfolio_hover_vertical' => 'false',
	'shop_carousel_nav_outside' => 'false',
	  
	  
	  
	  
	  
	  'portfolio_image_animation_disable' => 'false',

   ), $atts ) );
   
    $output_pro = '';
	
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
	
	<?php if($portfolio_image_opacity): ?><style type="text/css">
		.progression-studios-portfolio-carousel-<?php echo esc_attr($idpro) ?> .progression-studios-portfolio-image:hover img { opacity:<?php echo esc_attr($portfolio_image_opacity) ?>; }
		
		.progression-studios-portfolio-carousel-<?php echo esc_attr($idpro) ?> .progression-portfolio-content:before {  opacity:<?php echo esc_attr($portfolio_image_opacity) ?>;  } 
		
		.progression-portfolio-masonry<?php echo esc_attr($idpro) ?> .progression-studios-portfolio-image:hover img { opacity:<?php echo esc_attr($portfolio_image_opacity) ?>; }
		
		.progression-portfolio-masonry<?php echo esc_attr($idpro) ?> .progression-portfolio-content:before {  opacity:<?php echo esc_attr($portfolio_image_opacity) ?>;  } </style><?php endif ?>
	
	<?php if($portfolio_pagination == 'carousel'): ?>
		
		<?php
		if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	
		global $blogloop;
		global $post;
	
		$postIds = $portfolio_filter_categories; // get custom field value
	    $arrayIds = explode(',', $postIds); // explode value into an array of ids
	    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
	    {
	        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
	        {
	            $arrayIds = array(); // reset array
	            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
	        }
		 }

	 
		 if ( $portfolio_filter_categories ) {
		 
		 	$blogloop = new WP_Query(
		 		array(
		 	        'post_type' => 'portfolio',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $portfolio_post_count,
	  				'tax_query' => array(
	  				        // Note: tax_query expects an array of arrays!
	  				        array(
	  				            'taxonomy' => 'portfolio-category', // 
	  				            'field'    => 'slug',
	  				            'terms'    => $arrayIds,
	  				        )
	  				 ),
		 		)
		  	);
		 
		}
		else {
			 
			 	$blogloop = new WP_Query(
			 		array(
			 	        'post_type' => 'portfolio',
			 			  'paged' => $paged,
			 	        'posts_per_page' => $portfolio_post_count,
			 		)
			  	);
			 
		 	
		}
	
		?>
		
		
		<div class="progression-studios-portfolio-vc">
		<div class="progression-studios-owl-carousel progression-studios-portfolio-carousel-<?php echo esc_attr($idpro) ?> <?php if($shop_carousel_nav_outside == 'true' ): ?>progression-studios-carousel-outside-nav<?php endif ?>">
			<?php while($blogloop->have_posts()): $blogloop->the_post();?>
						<div class="item">
							<?php if($progression_studios_portfolio_layout == 'default'): ?>
							<?php include(locate_template('template-parts/visual-composer/content-portfolio.php')); ?>
							<?php else: ?>
							<?php include(locate_template('template-parts/visual-composer/content-portfolio-secondary.php')); ?>
							<?php endif ?>
						</div>
			<?php  endwhile; // end of the loop. ?>
		</div><!-- close .progression-studios-owl-carousel -->
	
		</div>
	
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			'use strict';
		 $(window).load(function() { 
			$('.progression-studios-portfolio-carousel-<?php echo esc_attr($idpro) ?>').owlCarousel({
			   items:<?php echo esc_attr($progression_studios_portfolio_columns) ?>,
				navText: ["",""],
				slideBy: <?php echo esc_attr($portfolio_carousel_scroll_items) ?>,
		   	loop:true,
				autoplayHoverPause:true,
		      margin:<?php echo esc_attr($progression_studios_portfolio_padding) ?>,
				autoplay:<?php if($portfolio_carousel_autoplay_onoff == 'true'): ?>true<?php else: ?>false<?php endif ?>,
	    	  	autoplayTimeout:<?php echo esc_attr($portfolio_carousel_duration) ?>,
				dots:<?php if($portfolio_carousel_bullet_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
		      nav:<?php if($portfolio_carousel_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
		      responsive:{
		          0:{
		              items:1
		          },
		          600:{
						 items:2
		          },
					 959: {
						 items: <?php echo esc_attr($progression_studios_portfolio_columns) ?>
					 }
				 
		      }
			});
});

		});
		</script>
		
	<?php else: ?>
	

	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	
	global $blogloop;
	global $post;
	
	$postIds = $portfolio_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }

	 
	 if ( $portfolio_filter_categories ) {
		 
	 	$blogloop = new WP_Query(
	 		array(
	 	        'post_type' => 'portfolio',
	 			  'paged' => $paged,
	 	        'posts_per_page' => $portfolio_post_count,
  				'tax_query' => array(
  				        // Note: tax_query expects an array of arrays!
  				        array(
  				            'taxonomy' => 'portfolio-category', // 
  				            'field'    => 'slug',
  				            'terms'    => $arrayIds,
  				        )
  				 ),
	 		)
	  	);
		 
	}
	else {
			 
		 	$blogloop = new WP_Query(
		 		array(
		 	        'post_type' => 'portfolio',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $portfolio_post_count,
		 		)
		  	);
			 
		 	
	}
	
	?>
		
		
		<?php if($portfolio_sorting_pro == 'true' ): ?>
		<ul class="filter-button-group port-filter-group-<?php echo esc_attr($idpro) ?> noselect">
			<?php if($portfolio_filter_categories): ?>
			
				<?php
					$i = 0;

					$args = array(
					    'hide_empty'             => '0',
					    'slug'              => $arrayIds,
					); 
				
					$terms = get_terms( 'portfolio-category', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $portfolio_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php else: ?>
				<?php
					$i = 0;
					$terms = get_terms( 'portfolio-category', 'hide_empty=0' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $portfolio_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php endif ?>		
		</ul>
		<div class="clearfix-pro"></div>
		<?php endif ?>
		

		<div class="progression-studios-portfolio-vc">
				<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px; margin-left:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px; margin-right:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px;">
				<div class="progression-portfolio-masonry<?php echo esc_attr($idpro) ?>">
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
						<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr($progression_studios_portfolio_columns) ?> <?php  $terms = get_the_terms( $post->ID , 'portfolio-category' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'portfolio-category' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?>">
							<div class="progression-portfolio-masonry-padding" style="padding:<?php echo esc_attr($progression_studios_portfolio_padding) ?>px;">
								<div class="progression-studios-isotope-animation">
									<?php if($progression_studios_portfolio_layout == 'default'): ?>
									<?php include(locate_template('template-parts/visual-composer/content-portfolio.php')); ?>
									<?php else: ?>
									<?php include(locate_template('template-parts/visual-composer/content-portfolio-secondary.php')); ?>
									<?php endif ?>
								</div><!-- close .progression-studios-isotope-animation -->
							</div>
						</div><!-- close .progression-masonry-item -->
				<?php  endwhile; // end of the loop. ?>
			<div class="clearfix-pro"></div>
			</div><!-- close .progression-portfolio-masonry<?php echo esc_attr($idpro) ?> -->
		</div><!-- close .progression-masonry-margins-->
		</div><!-- close .progression-studios-portfolio-vc -->
		
		<script type="text/javascript">			
		jQuery(document).ready(function($) {
			'use strict';
			
			/* Default Isotope Load Code */
			var $container = $('.progression-portfolio-masonry<?php echo esc_attr($idpro) ?>').isotope();
			$container.imagesLoaded( function() {
				var els = $('.progression-masonry-item'), i = 0, f = function () { $(els[i++]).addClass('opacity-progression');  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					<?php if($post_masonry_disable == 'true'): ?>layoutMode: 'fitRows',<?php endif ?>
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					itemSelector: '.progression-masonry-item',
					masonry: {
					    columnWidth: '.progression-masonry-col-<?php echo esc_attr($progression_studios_portfolio_columns) ?>',
					}
		 		});
			});
			/* END Default Isotope Code */
			
			<?php if($portfolio_sorting_pro == 'true' ): ?>
			$('.port-filter-group-<?php echo esc_attr($idpro) ?>').on( 'click', 'li', function() {
			  var filterValue = $(this).attr('data-filter');
			  $container.isotope({ filter: filterValue });
			});
	
	    	  $('.port-filter-group-<?php echo esc_attr($idpro) ?>').each( function( i, buttonGroup ) {
	    		var $buttonGroup = $( buttonGroup );
	    		$buttonGroup.on( 'click', 'li', function() {
	    		  $buttonGroup.find('.is-checked').removeClass('is-checked');
	    		  $( this ).addClass('is-checked');
	    		});
	    	  });
			<?php endif ?>
	
	
			<?php if($portfolio_pagination == 'load_more' || $portfolio_pagination == 'inifite_scroll' ): ?>
	  		/* Begin Infinite Scroll */
	  		$container.infinitescroll({
	  			errorCallback: function(){  $('#infinite-nav-pro').delay(500).fadeOut(500, function(){ $(this).remove(); }); },
	  		  navSelector  : '#infinite-nav-pro',    // selector for the paged navigation 
	  		  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
	  		  itemSelector : '.progression-portfolio-masonry<?php echo esc_attr($idpro) ?> .progression-masonry-item',     // selector for all items you'll retrieve
	  	   		loading: {
	  	   		 	img: '<?php echo esc_url( get_template_directory_uri() );?>/images/loader.gif',
	  	   			 msgText: "",
	  	   		 	finishedMsg: "<div id='no-more-posts'><?php esc_html_e( "No more posts", "pro-elements" ); ?></div>",
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
		 
			   	$(".progression-studios-portfolio-content-layout a[data-rel^='prettyPhoto'], .progression-studios-default-portfolio-index a[data-rel^='prettyPhoto']").prettyPhoto({
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
			
					$(".progression-studios-default-portfolio-index, .progression-studios-portfolio-content-layout").fitVids();

	  				$newElems.imagesLoaded(function(){

						$newElems.each(function(i, el) {        
						  window.setTimeout(function(){
						    $(el).addClass('opacity-progression');
						  }, 200 * i);
						});
						
	  					$container.isotope( 'appended', $newElems );

	  			});

	  		  }
	  		);
	  	    /* END Infinite Scroll */
	  		<?php endif; ?>
			
			<?php if($portfolio_pagination == 'load_more'): ?>
			/* PAUSE FOR LAOD MORE */
			$(window).unbind('.infscr');
			// Resume Infinite Scroll
			$('.nav-previous a').click(function(){
				$container.infinitescroll('retrieve');
				return false;
			});
			/* End Infinite Scroll */
			<?php endif; ?>
	
		});
		</script>
		
		<div class="clearfix-pro"></div>
			
			

		<?php if($portfolio_pagination == 'default'): ?>
			<?php progression_studios_show_pagination_links_blog(); ?>
		<?php endif ?>
		<?php if($portfolio_pagination == 'load_more'): ?>
			
			<?php if ( $blogloop->max_num_pages > 1 ) : ?>
				<div id="progression-load-more-manual">
				<div id="infinite-nav-pro">
					<div class="nav-previous">
						<?php next_posts_link( wp_kses( __('Load More <span><i class="fa fa-arrow-circle-down"></i></span>', 'zaser-progression' ) , TRUE), $blogloop->max_num_pages ); ?>
					</div>
				</div><!-- close #infinite-nav-pro -->
				</div><!-- close #progression-load-more-manual -->
			<?php endif ?>
			
		<?php endif ?>
		<?php if($portfolio_pagination == 'inifite_scroll'): ?>
			<?php if ( $blogloop->max_num_pages > 1 ) : ?><div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( 'Load More', $blogloop->max_num_pages ); ?></div></div><?php endif ?>
		<?php endif ?>
		
		
		<?php endif ?>
			
		
		<?php wp_reset_postdata();?>
		
	<?php
	
	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'progression_portfolio_integrateVC' );
function progression_portfolio_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Portfolio", "pro-elements" ),
	  "description" => __( "Portfolio post list", "pro-elements" ),
      "base" => "progression_portfolio",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
			
			
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Portfolio Pagination & Carousel Option", "pro-elements" ),
            "param_name" => "portfolio_pagination",
			"value"       => array(
						__( "No Pagination or Carousel", "pro-elements" )				=> 'pagination_off',
 					  __( "Display as Carousel", "pro-elements" )   	=> 'carousel',
			        __( "Default Page Numbers", "pro-elements" )   	=> 'default',
					  __( "Load More Button", "pro-elements" )   	=> 'load_more',
					  __( "Infinite Scroll", "pro-elements" )   	=> 'inifite_scroll',
			),
			"std" => "pagination_off",
         ),
			
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Portfolio Columns", "pro-elements" ),
            "param_name" => "progression_studios_portfolio_columns",
				"value"       => array(
					'1 Column'   	=> '1',
					'2 Columns'  	=> '2',
					'3 Columns'		=> '3',
					'4 Columns'  	=> '4',
					'5 Columns'  	=> '5',
					'6 Columns'  	=> '6',
			),
			"std"         => '3',
         ),
			
			
         
			
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Portfolio Image Size", "pro-elements" ),
            "param_name" => "progression_studios_portfolio_cropping",
				"value"       => array(
					'Default Image'   	=> 'default',
					'Tall Image'   	=> 'tall',
					'Disable Cropping'  	=> 'uncropped',
			),
			"std"         => 'tall',
         ),
			
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Portfolio Post List Padding", "pro-elements" ),
            "param_name" => "progression_studios_portfolio_padding",
				"value"       => array(
					'0px'   	=> '0',
					'1px'   	=> '1',
					'2px'   	=> '2',
					'3px'   	=> '3',
					'4px'   	=> '4',
					'5px'  	=> '5',
					'6px'  	=> '6',
					'7px'  	=> '7',
					'8px'  	=> '8',
					'9px'  	=> '9',
					'10px'		=> '10',
					'15px'		=> '15',
					'20px'		=> '20',
					'25px'		=> '25',
					'30px'		=> '30',
					'35px'		=> '35',
					'40px'		=> '40',
					'45px'		=> '45',
					'50px'		=> '50',
			),
			"std"         => '10',
         ),

			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Portfolio Post Count", "pro-elements" ),
            "param_name" => "portfolio_post_count",
				"std"         => '24',
         ),

			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Narrow by Portfolio Categories", "pro-elements" ),
				"description" => __( "Enter category slugs to display a specific category. Add-in multiple category slugs seperated by a comma to use multiple categories. (Leave blank to pull in all categories).", "pro-elements" ),
            "param_name" => "portfolio_filter_categories",
				"std"         => '',
         ),
		 	
			
         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Portfolio Sorting?", "pro-elements" ),
            "param_name" => "portfolio_sorting_pro",
			"std"         => 'false',
         ),
			
         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Category Filter Text for All Posts", "pro-elements" ),
            "param_name" => "portfolio_filter_text",
			"std"         => 'All',
			'dependency' => array(
				'element' => 'portfolio_sorting_pro',
				'not_empty' => true,
			),
         ),
			
			
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Left/Right Navigation?", "pro-elements" ),
            "param_name" => "portfolio_carousel_nav",
				"std"         => 'true',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Force Left/Right Navigation Outside?", "pro-elements" ),
            "param_name" => "shop_carousel_nav_outside",
				"std"         => 'false',
				'dependency' => array(
					'element' => 'portfolio_carousel_nav',
					'not_empty' => true,
				),
			'group' => __( 'Carousel Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Bullet Navigation?", "pro-elements" ),
            "param_name" => "portfolio_carousel_bullet_nav",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Carousel scroll by how many items", "pro-elements" ),
            "param_name" => "portfolio_carousel_scroll_items",
				"value"       => array(
					'1 item'   	=> '1',
					'2 item'  	=> '2',
					'3 item'		=> '3',
					'4 item'  	=> '4',
					'5 item'  	=> '5',
			),
			"std"         => '1',
			'group' => __( 'Carousel Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Carousel Autoplay?", "pro-elements" ),
            "param_name" => "portfolio_carousel_autoplay_onoff",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Portfolio Carousel Autoplay Duration", "pro-elements" ),
            "param_name" => "portfolio_carousel_duration",
				"std"         => '5000',
				'group' => __( 'Carousel Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'portfolio_carousel_autoplay_onoff',
					'not_empty' => true,
				),
         ),
			

			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Masonry Layout (Equal Height Rows)", "pro-elements" ),
            "param_name" => "post_masonry_disable",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Portfolio Layout", "pro-elements" ),
            "param_name" => "progression_studios_portfolio_layout",
				"value"       => array(
					'Overlay Layout'   	=> 'default',
					'Content Layout'  	=> 'secondary',
			),
			"std"         => 'default',
			'group' => __( 'Design Options', 'pro-elements' ),
			
         ),
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Heading Font Size (Example: 18px)", "pro-elements" ),
            "param_name" => "portfolio_heading_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Category Font Size (Example: 14px)", "pro-elements" ),
            "param_name" => "portfolio_category_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Image/Overlay Hover Opacity (Example 0.5)", "pro-elements" ),
            "param_name" => "portfolio_image_opacity",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Content Layout Background Color", "pro-elements" ),
            "param_name" => "portfolio_secondary_bg_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Enable Hover Vertical Animation", "pro-elements" ),
            "param_name" => "portfolio_hover_vertical",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Content Margin?", "pro-elements" ),
            "param_name" => "portfolio_content_margin",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Category?", "pro-elements" ),
            "param_name" => "portfolio_category_disable",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Excerpt (Content Layout)?", "pro-elements" ),
            "param_name" => "portfolio_excerpt_disable",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Image Hover Effect?", "pro-elements" ),
            "param_name" => "portfolio_image_animation_disable",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),
         

			
      )
   ) );
}