<?php

/**
 * Blog Shortcode
 */


// [progression_blog heading_pro="" blog_description_pro="" etc...]
add_shortcode( 'progression_blog', 'progression_blog_func' );
function progression_blog_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
		
	  'progression_studios_blog_columns' => '2',
	  'blog_post_count' => '6',
	  'blog_pagination' => 'pagination_off',
	  'blog_filter_categories' => '',
	  'blog_filter_text' => 'All',
	  'blog_sorting_pro' => 'false',
	  'blog_heading_size' => '',
	  'blog_date' => 'true',
	  'blog_excerpt' => 'true',
	  'blog_post_meta' => 'true',
	  'blog_author' => 'true',
	  'blog_category' => 'false',
	  'blog_comments' => 'false',
	  'progression_studios_shop_padding' => '3',
	  'blog_heading_size' => '',
	  'blog_date_size' => '',
	  'blog_meta_size' => '',
	  'blog_carousel_nav' => 'true',
	  'blog_carousel_bullet_nav' => 'false',
	  'blog_carousel_scroll_items' => '1',
	  'blog_carousel_autoplay_onoff' => 'false',
	  'blog_carousel_duration' => '5000',
	  'portfolio_image_opacity' => '',  
	  'progression_studios_blog_cropping' => 'default',
	  'progression_studios_blog_layout' => 'default',
	  'blog_content_bg_color' => '',
	  'blog_image_animation_disable' => 'false',
		'post_masonry_disable' => 'false',	
		'shop_carousel_nav_outside' => 'false',
		
		
   ), $atts ) );
   
    $output_pro = '';
	
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
	
	<?php if($portfolio_image_opacity): ?><style type="text/css">.progression-studios-blog-carousel-<?php echo esc_attr($idpro) ?> .progression-studios-blog-overlay-styles:hover a img, .progression-studios-blog-carousel-<?php echo esc_attr($idpro) ?> .progression-studios-feaured-image:hover a img {  opacity:<?php echo esc_attr($portfolio_image_opacity) ?>;  } .progression-blog-masonry<?php echo esc_attr($idpro) ?> .progression-studios-blog-overlay-styles:hover a img, .progression-blog-masonry<?php echo esc_attr($idpro) ?> .progression-studios-feaured-image:hover a img {  opacity:<?php echo esc_attr($portfolio_image_opacity) ?>;  }</style><?php endif ?>
		

	<?php if($blog_pagination == 'carousel'): ?>
		
	
	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	
	global $blogloop;
	global $post;
	
	$postIds = $blog_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }

	 
	 if ( $blog_filter_categories ) {
		 
	 	$blogloop = new WP_Query(
	 		array(
	 	        'post_type' => 'post',
	 			  'paged' => $paged,
				  'ignore_sticky_posts' => 1,
				  
	 	        'posts_per_page' => $blog_post_count,
  				'tax_query' => array(
  				        // Note: tax_query expects an array of arrays!
  				        array(
  				            'taxonomy' => 'category', // 
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
		 	        'post_type' => 'post',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $blog_post_count,
					  'ignore_sticky_posts' => 1
					  
		 		)
		  	);
			 
		 	
	}
	
	?>
	
	<div class="progression-studios-blog-vc">
	<div class="progression-studios-owl-carousel progression-studios-blog-carousel-<?php echo esc_attr($idpro) ?> <?php if($shop_carousel_nav_outside == 'true' ): ?>progression-studios-carousel-outside-nav<?php endif ?>">
		<?php while($blogloop->have_posts()): $blogloop->the_post();?>
					<div class="item">
						<?php include(locate_template('template-parts/visual-composer/content-vc.php')); ?>
					</div>
		<?php  endwhile; // end of the loop. ?>
	</div><!-- close .progression-studios-owl-carousel -->
	
	</div>
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		 $(window).load(function() { 
		$('.progression-studios-blog-carousel-<?php echo esc_attr($idpro) ?>').owlCarousel({
		   items:<?php echo esc_attr($progression_studios_blog_columns) ?>,
			navText: ["",""],
			responsiveBaseWidth:'.vc_row',
			slideBy: <?php echo esc_attr($blog_carousel_scroll_items) ?>,
	   	loop:true,
			autoplayHoverPause:true,
	      margin:<?php echo esc_attr($progression_studios_shop_padding) ?>,
			autoplay:<?php if($blog_carousel_autoplay_onoff == 'true'): ?>true<?php else: ?>false<?php endif ?>,
    	  	autoplayTimeout:<?php echo esc_attr($blog_carousel_duration) ?>,
			dots:<?php if($blog_carousel_bullet_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
	      nav:<?php if($blog_carousel_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
	      responsive:{
	          0:{
	              items:1
	          },
	          600:{
					 items:2
	          },
				 959: {
					 items: <?php echo esc_attr($progression_studios_blog_columns) ?>
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
	
	$postIds = $blog_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }

	 
	 if ( $blog_filter_categories ) {
		 
	 	$blogloop = new WP_Query(
	 		array(
	 	        'post_type' => 'post',
	 			  'paged' => $paged,
				  'ignore_sticky_posts' => 1,
	 	        'posts_per_page' => $blog_post_count,
  				'tax_query' => array(
  				        // Note: tax_query expects an array of arrays!
  				        array(
  				            'taxonomy' => 'category', // 
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
		 	        'post_type' => 'post',
		 			  'paged' => $paged,
					  'ignore_sticky_posts' => 1,
		 	        'posts_per_page' => $blog_post_count,
		 		)
		  	);
			 
		 	
	}
	
	?>
		
		
		<?php if($blog_sorting_pro == 'true' ): ?>
		<ul class="filter-button-group port-filter-group-<?php echo esc_attr($idpro) ?> noselect">
			<?php if($blog_filter_categories): ?>
			
				<?php
					$i = 0;

					$args = array(
					    'hide_empty'             => '0',
					    'slug'              => $arrayIds,
					); 
				
					$terms = get_terms( 'category', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $blog_filter_text .'</li> ';	
				
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
					$terms = get_terms( 'category', 'hide_empty=0' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $blog_filter_text .'</li> ';	
				
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
		
		
		<div class="progression-studios-blog-vc">
				<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr($progression_studios_shop_padding) ?>px; margin-left:-<?php echo esc_attr($progression_studios_shop_padding) ?>px; margin-right:-<?php echo esc_attr($progression_studios_shop_padding) ?>px;">
				<div class="progression-blog-masonry<?php echo esc_attr($idpro) ?>">
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
						<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr($progression_studios_blog_columns) ?> <?php  $terms = get_the_terms( $post->ID , 'category' );  if ( !empty( $terms ) ) : 	foreach ( $terms as $term ) { 	$term_link = get_term_link( $term, 'category' ); if( is_wp_error( $term_link ) ) continue; echo " ". $term->slug ; }  endif; ?>">
							<div class="progression-blog-masonry-padding" style="padding:<?php echo esc_attr($progression_studios_shop_padding) ?>px;">
								<div class="progression-studios-isotope-animation">
								<?php include(locate_template('template-parts/visual-composer/content-vc.php')); ?>
							</div>
							</div>
						</div><!-- close .progression-masonry-item -->
				<?php  endwhile; // end of the loop. ?>
			<div class="clearfix-pro"></div>
			</div><!-- close .progression-blog-masonry<?php echo esc_attr($idpro) ?> -->
		</div><!-- close .progression-masonry-margins-->
		</div><!-- close .progression-studios-blog-vc -->
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			'use strict';
	
			/* Default Isotope Load Code */
			var $container = $('.progression-blog-masonry<?php echo esc_attr($idpro) ?>').isotope();
			$container.imagesLoaded( function() {
				var els = $('.progression-masonry-item'), i = 0, f = function () { $(els[i++]).addClass('opacity-progression');  if(i < els.length) setTimeout(f, 200);  }; f();
				$container.isotope({
					<?php if($post_masonry_disable == 'true'): ?>layoutMode: 'fitRows',<?php endif ?>
					itemSelector: '.progression-masonry-item',
					hiddenStyle: {
					    opacity: 0
					  },
					  visibleStyle: {
					    opacity: 1
					  },
					masonry: {
					    columnWidth: '.progression-masonry-col-<?php echo esc_attr($progression_studios_blog_columns) ?>',
					}
		 		});
			});
			/* END Default Isotope Code */
			
			<?php if($blog_sorting_pro == 'true' ): ?>
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

	
  			<?php if($blog_pagination == 'load_more' || $blog_pagination == 'inifite_scroll' ): ?>
  	  		/* Begin Infinite Scroll */
  	  		$container.infinitescroll({
  	  			errorCallback: function(){  $('#infinite-nav-pro').delay(500).fadeOut(500, function(){ $(this).remove(); }); },
  	  		  navSelector  : '#infinite-nav-pro',    // selector for the paged navigation 
  	  		  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
  	  		  itemSelector : '.progression-blog-masonry<?php echo esc_attr($idpro) ?> .progression-masonry-item',     // selector for all items you'll retrieve
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
		 
  			   	$(".progression-studios-feaured-image a[data-rel^='prettyPhoto']").prettyPhoto({
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
					    $(el).addClass('opacity-progression');
					  }, 200 * i);
					});
					
  					$container.isotope( 'appended', $newElems );
  	  			});

  	  		  }
  	  		);
  	  	    /* END Infinite Scroll */
  	  		<?php endif; ?>
			  
  			<?php if($blog_pagination == 'load_more'): ?>
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
			
			
		<?php if($blog_pagination == 'default'): ?>
			<?php progression_studios_show_pagination_links_blog(); ?>
		<?php endif ?>
		
		<?php if($blog_pagination == 'load_more'): ?>
			
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
		<?php if($blog_pagination == 'inifite_scroll'): ?>
			<?php if ( $blogloop->max_num_pages > 1 ) : ?><div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( 'Load More', $blogloop->max_num_pages ); ?></div></div><?php endif ?>
		<?php endif ?>
		
		
		<?php endif ?>
			
		
		<?php wp_reset_postdata();?>
		
	<?php
	
	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'progression_blog_integrateVC' );
function progression_blog_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Blog", "pro-elements" ),
	  "description" => __( "Blog post list", "pro-elements" ),
      "base" => "progression_blog",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
			
			
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Blog Pagination & Carousel Option", "pro-elements" ),
            "param_name" => "blog_pagination",
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
            "heading" => __( "Blog Columns", "pro-elements" ),
            "param_name" => "progression_studios_blog_columns",
				"value"       => array(
					'1 Column'   	=> '1',
					'2 Columns'  	=> '2',
					'3 Columns'		=> '3',
					'4 Columns'  	=> '4',
					'5 Columns'  	=> '5',
					'6 Columns'  	=> '6',
			),
			"std"         => '2',
         ),

			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Blog Image Size", "pro-elements" ),
            "param_name" => "progression_studios_blog_cropping",
				"value"       => array(
					'Default Image'   	=> 'default',
					'Tall Image'   	=> 'tall',
					'Disable Cropping'  	=> 'uncropped',
			),
			"std"         => 'default',
         ),
			
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Blog List Padding", "pro-elements" ),
            "param_name" => "progression_studios_shop_padding",
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
			"std"         => '3',
         ),
			
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Blog Post Count", "pro-elements" ),
            "param_name" => "blog_post_count",
				"std"         => '6',
         ),

			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Narrow by Blog Categories", "pro-elements" ),
				"description" => __( "Enter category slugs to display a specific category. Add-in multiple category slugs seperated by a comma to use multiple categories. (Leave blank to pull in all categories).", "pro-elements" ),
            "param_name" => "blog_filter_categories",
				"std"         => '',
         ),
		 	
			
         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Blog Sorting?", "pro-elements" ),
            "param_name" => "blog_sorting_pro",
			"std"         => 'false',
         ),
			
         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Category Filter Text for All Posts", "pro-elements" ),
            "param_name" => "blog_filter_text",
			"std"         => 'All',
			'dependency' => array(
				'element' => 'blog_sorting_pro',
				'not_empty' => true,
			),
         ),
			
			
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Left/Right Navigation?", "pro-elements" ),
            "param_name" => "blog_carousel_nav",
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
					'element' => 'blog_carousel_nav',
					'not_empty' => true,
				),
			'group' => __( 'Carousel Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Bullet Navigation?", "pro-elements" ),
            "param_name" => "blog_carousel_bullet_nav",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Carousel scroll by how many items", "pro-elements" ),
            "param_name" => "blog_carousel_scroll_items",
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
            "param_name" => "blog_carousel_autoplay_onoff",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "blog Carousel Autoplay Duration", "pro-elements" ),
            "param_name" => "blog_carousel_duration",
				"std"         => '5000',
				'group' => __( 'Carousel Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'blog_carousel_autoplay_onoff',
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
            "heading" => __( "Blog Layout", "pro-elements" ),
            "param_name" => "progression_studios_blog_layout",
				"value"       => array(
					'Content Layout'   	=> 'default',
					'Overlay Layout'  	=> 'secondary',
			),
			"std"         => 'default',
			'group' => __( 'Design Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "colorpicker",
				"class" => "",
            "heading" => __( "Content Layout Background", "pro-elements" ),
            "param_name" => "blog_content_bg_color",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Image/Overlay Hover Opacity (Example 0.2)", "pro-elements" ),
            "param_name" => "portfolio_image_opacity",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Heading Font Size (Example: 18px)", "pro-elements" ),
            "param_name" => "blog_heading_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Date Font Size (Example: 14px)", "pro-elements" ),
            "param_name" => "blog_date_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Meta Font Size (Example: 14px)", "pro-elements" ),
            "param_name" => "blog_meta_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Excerpt?", "pro-elements" ),
            "param_name" => "blog_excerpt",
				"std"         => 'true',
				'group' => __( 'Design Options', 'pro-elements' ),
			
         ),
			

			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Date?", "pro-elements" ),
            "param_name" => "blog_date",
				"std"         => 'true',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Post Meta?", "pro-elements" ),
            "param_name" => "blog_post_meta",
				"std"         => 'true',
				'group' => __( 'Design Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Author?", "pro-elements" ),
            "param_name" => "blog_author",
				"std"         => 'true',
				'group' => __( 'Design Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'blog_post_meta',
					'not_empty' => true,
				),
         ),
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Category?", "pro-elements" ),
            "param_name" => "blog_category",
				"std"         => 'false',
				'group' => __( 'Design Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'blog_post_meta',
					'not_empty' => true,
				),
         ),
       
		 
		 	
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Comments?", "pro-elements" ),
            "param_name" => "blog_comments",
				"std"         => 'false',
				'group' => __( 'Design Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'blog_post_meta',
					'not_empty' => true,
				),
         ),
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Disable Image Hover Effect?", "pro-elements" ),
            "param_name" => "blog_image_animation_disable",
				"std"         => 'false',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),

			
      )
   ) );
}