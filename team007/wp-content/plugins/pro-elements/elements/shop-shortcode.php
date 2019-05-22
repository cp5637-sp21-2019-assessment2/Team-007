<?php

/**
 * Shop Shortcode
 */


// [progression_shop heading_pro="" shop_description_pro="" etc...]
add_shortcode( 'progression_shop', 'progression_shop_func' );
function progression_shop_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
		
	  'progression_studios_shop_columns' => '3',
	  'shop_post_count' => '6',
	  'shop_pagination' => 'pagination_off',
	  'shop_filter_categories' => '',
	  'shop_filter_text' => 'All',
	  'shop_sorting_pro' => 'false',
	  'shop_heading_size' => '',
	
	  'shop_carousel_nav' => 'true',
	  'shop_carousel_bullet_nav' => 'false',
	  'shop_carousel_scroll_items' => '1',
	  'shop_carousel_autoplay_onoff' => 'false',
	  'shop_carousel_duration' => '5000',
	  'progression_studios_shop_padding' => '10',
	  'shop_price_display' => 'true',
		
		'shop_outofstock' => '',
		'post_masonry_disable' => 'false',
		'shop_carousel_nav_outside' => 'false',
		 
		 
   ), $atts ) );
   
    $output_pro = '';
	
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
	
	
	
	<?php if($shop_pagination == 'carousel'): ?>
		
	
	<?php
	if ( get_query_var('paged') ) { $paged = get_query_var('paged'); } else if ( get_query_var('page') ) {   $paged = get_query_var('page'); } else {  $paged = 1; }
	
	global $blogloop;
	global $post;
	
	$postIds = $shop_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }
	 
	 
	 if ( $shop_outofstock ) {
	 
		 if ( $shop_filter_categories ) {
		 
		 	$blogloop = new WP_Query(
		 		array(
					'orderby' => array('menu_order' => 'ASC'),
		 	        'post_type' => 'product',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $shop_post_count,
	  					'tax_query' => array(
	  				        // Note: tax_query expects an array of arrays!
	  				        array(
	  				            'taxonomy' => 'product_cat', // 
	  				            'field'    => 'slug',
	  				            'terms'    => $arrayIds,
	  				        )
	  				 ),
					 
					 'meta_query' => array(
					 array(
					 'key' => '_stock_status',
					 'value' => 'instock',
					 'compare' => '='
					 )
					 )
					 
		 		)
		  	);
		 
		}
		else {
			 
			 	$blogloop = new WP_Query(
			 		array(
						'orderby' => array('menu_order' => 'ASC'),
			 	        'post_type' => 'product',
			 			  'paged' => $paged,
			 	        'posts_per_page' => $shop_post_count,
	 					 'meta_query' => array(
	 					 array(
	 					 'key' => '_stock_status',
	 					 'value' => 'instock',
	 					 'compare' => '='
	 					 )
	 					 )
			 		)
			  	);
			 
		 	
		}
		
	} else {
  	 if ( $shop_filter_categories ) {
		 
  	 	$blogloop = new WP_Query(
  	 		array(
  				'orderby' => array('menu_order' => 'ASC'),
  	 	        'post_type' => 'product',
  	 			  'paged' => $paged,
  	 	        'posts_per_page' => $shop_post_count,
    					'tax_query' => array(
    				        // Note: tax_query expects an array of arrays!
    				        array(
    				            'taxonomy' => 'product_cat', // 
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
  					'orderby' => array('menu_order' => 'ASC'),
  		 	        'post_type' => 'product',
  		 			  'paged' => $paged,
  		 	        'posts_per_page' => $shop_post_count,
  		 		)
  		  	);
			 
		 	
  	}	
	 }
	
	 
	
	
	?>
	
	
	
	
	<div class="woocommerce">
		
	<ul class="products progression-studios-owl-carousel progression-studios-shop-carousel-<?php echo esc_attr($idpro) ?> <?php if($shop_carousel_nav_outside == 'true' ): ?>progression-studios-carousel-outside-nav<?php endif ?>">
		<?php  while($blogloop->have_posts()): $blogloop->the_post(); ?>
				<?php include(locate_template('template-parts/visual-composer/content-product-carousel.php')); ?>
		<?php  endwhile; // end of the loop. ?>
	</ul><!-- close .progression-studios-owl-carousel -->
	
	</div><!-- close .woocommerce -->
	
	
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		'use strict';
		 $(window).load(function() { 
		$('.progression-studios-shop-carousel-<?php echo esc_attr($idpro) ?>').owlCarousel({
		   items:<?php echo esc_attr($progression_studios_shop_columns) ?>,
			navText: ["",""],
			slideBy: <?php echo esc_attr($shop_carousel_scroll_items) ?>,
	   	loop:true,
			autoplayHoverPause:true,
	      margin:<?php echo esc_attr($progression_studios_shop_padding) ?>,
			autoplay:<?php if($shop_carousel_autoplay_onoff == 'true'): ?>true<?php else: ?>false<?php endif ?>,
    	  	autoplayTimeout:<?php echo esc_attr($shop_carousel_duration) ?>,
			dots:<?php if($shop_carousel_bullet_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
	      nav:<?php if($shop_carousel_nav == 'true'): ?>true<?php else: ?>false<?php endif ?>,
	      responsive:{
	          0:{
	              items:1
	          },
	          600:{
					 items:2
	          },
				 959: {
					 items: <?php echo esc_attr($progression_studios_shop_columns) ?>
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
  
	
	$postIds = $shop_filter_categories; // get custom field value
    $arrayIds = explode(',', $postIds); // explode value into an array of ids
    if(count($arrayIds) <= 1) // if array contains one element or less, there's spaces after comma's, or you only entered one id
    {
        if( strpos($arrayIds[0], ',') !== false )// if the first array value has commas, there were spaces after ids entered
        {
            $arrayIds = array(); // reset array
            $arrayIds = explode(', ', $postIds); // explode ids with space after comma's
        }
	 }

	 
		 
	 if ( $shop_outofstock ) {
	 
		 if ( $shop_filter_categories ) {
		 
		 	$blogloop = new WP_Query(
		 		array(
					'orderby' => array('menu_order' => 'ASC'),
		 	        'post_type' => 'product',
		 			  'paged' => $paged,
		 	        'posts_per_page' => $shop_post_count,
	  					'tax_query' => array(
	  				        // Note: tax_query expects an array of arrays!
	  				        array(
	  				            'taxonomy' => 'product_cat', // 
	  				            'field'    => 'slug',
	  				            'terms'    => $arrayIds,
	  				        )
	  				 ),
					 
					 'meta_query' => array(
					 array(
					 'key' => '_stock_status',
					 'value' => 'instock',
					 'compare' => '='
					 )
					 )
					 
		 		)
		  	);
		 
		}
		else {
			 
			 	$blogloop = new WP_Query(
			 		array(
						'orderby' => array('menu_order' => 'ASC'),
			 	        'post_type' => 'product',
			 			  'paged' => $paged,
			 	        'posts_per_page' => $shop_post_count,
	 					 'meta_query' => array(
	 					 array(
	 					 'key' => '_stock_status',
	 					 'value' => 'instock',
	 					 'compare' => '='
	 					 )
	 					 )
			 		)
			  	);
			 
		 	
		}
		
	} else {
  	 if ( $shop_filter_categories ) {
		 
  	 	$blogloop = new WP_Query(
  	 		array(
  				'orderby' => array('menu_order' => 'ASC'),
  	 	        'post_type' => 'product',
  	 			  'paged' => $paged,
  	 	        'posts_per_page' => $shop_post_count,
    					'tax_query' => array(
    				        // Note: tax_query expects an array of arrays!
    				        array(
    				            'taxonomy' => 'product_cat', // 
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
  					'orderby' => array('menu_order' => 'ASC'),
  		 	        'post_type' => 'product',
  		 			  'paged' => $paged,
  		 	        'posts_per_page' => $shop_post_count,
  		 		)
  		  	);
			 
		 	
  	}	
	 }
	
	?>
		
		
		<?php if($shop_sorting_pro == 'true' ): ?>
		<ul class="filter-button-group port-filter-group-<?php echo esc_attr($idpro) ?> noselect">
			<?php if($shop_filter_categories): ?>
			
				<?php
					$i = 0;

					$args = array(
					    'hide_empty'             => '0',
					    'slug'              => $arrayIds,
					); 
				
					$terms = get_terms( 'product_cat', $args );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $shop_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".product_cat-'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".product_cat-'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php else: ?>
				<?php
					$i = 0;
					$terms = get_terms( 'product_cat', 'hide_empty=0' );
					if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
						echo '<li class="is-checked" data-filter="*">' . $shop_filter_text .'</li> ';	
				
						foreach ( $terms as $term ) { 
						if ($i == 0) {
						echo '<li data-filter=".product_cat-'.$term->slug.'">' .$term->name .'</li> ';	
						} else if ($i > 0)  {
						echo '<li data-filter=".product_cat-'.$term->slug.'">' .$term->name .'</li> ';	
						}
						$i++;
						}
					}	
				?>
			<?php endif ?>		
		</ul>
		<div class="clearfix-pro"></div>
		<?php endif ?>
		
		
		<div class="progression-studios-shop-vc">
				<div class="woocommerce progression-masonry-margins" style="margin-top:-<?php echo esc_attr($progression_studios_shop_padding) ?>px; margin-left:-<?php echo esc_attr($progression_studios_shop_padding) ?>px; margin-right:-<?php echo esc_attr($progression_studios_shop_padding) ?>px;">
				<ul class="products progression-shop-masonry<?php echo esc_attr($idpro) ?>">
				<?php while($blogloop->have_posts()): $blogloop->the_post();?>
						<?php include(locate_template('template-parts/visual-composer/content-product.php')); ?>
				<?php  endwhile; // end of the loop. ?>
			<div class="clearfix-pro"></div>
			</ul>
			</div><!-- close .woocommerce -->
		</div><!-- close .progression-studios-shop-vc -->
		
		<script type="text/javascript">
		jQuery(document).ready(function($) {
			'use strict';
	
			/* Default Isotope Load Code */
			var $container = $('.progression-shop-masonry<?php echo esc_attr($idpro) ?>').isotope();
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
					    columnWidth: '.progression-masonry-col-<?php echo esc_attr($progression_studios_shop_columns) ?>',
					}
		 		});
			});
			/* END Default Isotope Code */
			
			<?php if($shop_sorting_pro == 'true' ): ?>
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
			  
    			<?php if($shop_pagination == 'load_more' || $shop_pagination == 'inifite_scroll' ): ?>
    	  		/* Begin Infinite Scroll */
    	  		$container.infinitescroll({
    	  			errorCallback: function(){  $('#infinite-nav-pro').delay(500).fadeOut(500, function(){ $(this).remove(); }); },
    	  		  navSelector  : '#infinite-nav-pro',    // selector for the paged navigation 
    	  		  nextSelector : '.nav-previous a',  // selector for the NEXT link (to page 2)
    	  		  itemSelector : '.progression-shop-masonry<?php echo esc_attr($idpro) ?> .progression-masonry-item',     // selector for all items you'll retrieve
    	  	   		loading: {
    	  	   		 	img: '<?php echo esc_url( get_template_directory_uri() );?>/images/loader.gif',
    	  	   			 msgText: "",
    	  	   		 	finishedMsg: "<div id='no-more-posts'><?php esc_html_e( "No more posts", "pro-elements" ); ?></div>",
    	  	   		 	speed: 0, }
    	  		  },
    	  		  // trigger Isotope as a callback
    	  		  function( newElements ) {

    	  		    var $newElems = $( newElements );
					 
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
			  
    			<?php if($shop_pagination == 'load_more'): ?>
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
			
			
		<?php if($shop_pagination == 'default'): ?>
			<?php progression_studios_show_pagination_links_blog(); ?>
		<?php endif ?>
		
		<?php if($shop_pagination == 'load_more'): ?>
			
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
		<?php if($shop_pagination == 'inifite_scroll'): ?>
			<?php if ( $blogloop->max_num_pages > 1 ) : ?><div id="infinite-nav-pro"><div class="nav-previous"><?php next_posts_link( 'Load More', $blogloop->max_num_pages ); ?></div></div><?php endif ?>
		<?php endif ?>
		
		
		<?php endif ?><!-- close carousel pagination -->
		
		
		<?php wp_reset_postdata();?>
		
	<?php
	
	return $output_pro. ob_get_clean();

}


add_action( 'vc_before_init', 'progression_shop_integrateVC' );
function progression_shop_integrateVC() {
   vc_map( array(
      "name" => __( "Pro Products", "pro-elements" ),
	  "description" => __( "Shop product list", "pro-elements" ),
      "base" => "progression_shop",
	  "weight" => 100,
      "class" => "",
      "category" => __( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

      "params" => array(
			
			
         array(
            "type" => "dropdown",
			"class" => "",
            "heading" => __( "Shop Pagination & Carousel Option", "pro-elements" ),
            "param_name" => "shop_pagination",
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
            "heading" => __( "Shop Columns", "pro-elements" ),
            "param_name" => "progression_studios_shop_columns",
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
            "heading" => __( "Shop List Padding", "pro-elements" ),
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
			"std"         => '10',
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Shop Post Count", "pro-elements" ),
            "param_name" => "shop_post_count",
				"std"         => '6',
         ),

			
         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Disable Out of Stock Items?", "pro-elements" ),
            "param_name" => "shop_outofstock",
			"std"         => 'false',
         ),
			
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Narrow by Shop Categories", "pro-elements" ),
				"description" => __( "Enter category slugs to display a specific category. Add-in multiple category slugs seperated by a comma to use multiple categories. (Leave blank to pull in all categories).", "pro-elements" ),
            "param_name" => "shop_filter_categories",
				"std"         => '',
         ),
		 	
			
         array(
            "type" => "checkbox",
			"class" => "",
            "heading" => __( "Display Shop Sorting?", "pro-elements" ),
            "param_name" => "shop_sorting_pro",
			"std"         => 'false',
         ),
			
         array(
            "type" => "textfield",
			"class" => "",
            "heading" => __( "Category Filter Text for All Posts", "pro-elements" ),
            "param_name" => "shop_filter_text",
			"std"         => 'All',
			'dependency' => array(
				'element' => 'shop_sorting_pro',
				'not_empty' => true,
			),
         ),
			
			
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Left/Right Navigation?", "pro-elements" ),
            "param_name" => "shop_carousel_nav",
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
					'element' => 'shop_carousel_nav',
					'not_empty' => true,
				),
			'group' => __( 'Carousel Options', 'pro-elements' ),
			
         ),
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Carousel Bullet Navigation?", "pro-elements" ),
            "param_name" => "shop_carousel_bullet_nav",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "dropdown",
				"class" => "",
            "heading" => __( "Carousel scroll by how many items", "pro-elements" ),
            "param_name" => "shop_carousel_scroll_items",
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
            "param_name" => "shop_carousel_autoplay_onoff",
				"std"         => 'false',
			'group' => __( 'Carousel Options', 'pro-elements' ),
         ),
			
         array(
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Shop Carousel Autoplay Duration", "pro-elements" ),
            "param_name" => "shop_carousel_duration",
				"std"         => '5000',
				'group' => __( 'Carousel Options', 'pro-elements' ),
				'dependency' => array(
					'element' => 'shop_carousel_autoplay_onoff',
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
            "type" => "textfield",
				"class" => "",
            "heading" => __( "Heading Font Size (Example: 15px)", "pro-elements" ),
            "param_name" => "shop_heading_size",
				"std"         => '',
				'group' => __( 'Design Options', 'pro-elements' ),
         ),
			
			
         array(
            "type" => "checkbox",
				"class" => "",
            "heading" => __( "Display Price", "pro-elements" ),
            "param_name" => "shop_price_display",
				"std"         => 'true',
			'group' => __( 'Design Options', 'pro-elements' ),
         ),

         

			
      )
   ) );
}