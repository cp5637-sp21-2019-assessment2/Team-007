<?php

/**
 * Image Gallery Shortcode
 */



// [pro_progression_image_gallery location_columns_pro="" etc...]
add_shortcode( 'pro_progression_image_gallery', 'pro_progression_image_gallery_func' );
function pro_progression_image_gallery_func( $atts, $content = null ) { // New function parameter $content is added!
   extract( shortcode_atts( array(
	   'gallery_images' => '',
	   'progression_studios_portfolio_cropping' => 'tall',
 	  'progression_studios_portfolio_padding' => '10',
 	  'portfolio_pagination' => 'pagination_off',
	  'progression_studios_portfolio_columns' => '3',

	  'gallery_post_captions' => '',
	  'image_bg_color' => '#000000',
	  'image_title_hover' => '',
	  'image_hover_effect' => 'progression-studios-grid-image-no-effect',
	  'image_transparency_hover' => '',
	  'post_masonry_disable' => 'false',
			
   ), $atts ) );
   
	
	$output_pro = '';
	
	STATIC $idpro = 0;
	$idpro++;
	
	ob_start();
	?>
	
	

	<div class="progression-studios-grid <?php if($image_transparency_hover) : ?>progression-studios-image-grid-transparency<?php endif; ?> <?php if($image_title_hover) : ?>progression-studios-grid-title-hover<?php endif; ?> <?php echo esc_attr($image_hover_effect) ?>">
		
		<div class="progression-masonry-margins" style="margin-top:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px; margin-left:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px; margin-right:-<?php echo esc_attr($progression_studios_portfolio_padding) ?>px;">
			<div class="progression-grid-masonry<?php echo esc_attr($idpro) ?>">
			
				<?php $image_ids=explode(',',$gallery_images); ?>
				<?php foreach( $image_ids as $image_id  ): ?>
					<div class="progression-masonry-item progression-masonry-col-<?php echo esc_attr($progression_studios_portfolio_columns) ?>">
						<div class="progression-portfolio-masonry-padding" style="padding:<?php echo esc_attr($progression_studios_portfolio_padding) ?>px;">
							<div class="progression-studios-isotope-animation">
							<?php $lightbox_pro = wp_get_attachment_image_src($image_id, 'large'); ?>
							
							<?php if($progression_studios_portfolio_cropping == 'tall') : ?>
								<?php $image_grid_pro = wp_get_attachment_image_src($image_id, 'progression-studios-image-tall'); ?>
								<?php endif; ?>
							<?php if($progression_studios_portfolio_cropping == 'default') : ?>
								<?php $image_grid_pro = wp_get_attachment_image_src($image_id, 'progression-studios-image'); ?>
							<?php endif; ?>
							<?php if($progression_studios_portfolio_cropping == 'uncropped') : ?>
								<?php $image_grid_pro = wp_get_attachment_image_src($image_id, 'progression-studios-image-uncropped'); ?>
							<?php endif; ?>
							

							<a href="<?php echo esc_attr($lightbox_pro[0]);?>" data-rel="prettyPhoto[progression-studios-grid]"  <?php if($gallery_post_captions) : ?><?php else: ?><?php $get_description = get_post($image_id)->post_title; if(!empty($get_description)){ echo 'title="' . $get_description . '"'; } ?><?php endif; ?> <?php if($image_bg_color) : ?>style="background-color:<?php echo esc_attr($image_bg_color) ?>;"<?php endif; ?>>
								<img src="<?php echo esc_attr($image_grid_pro[0]);?>" alt="Grid">
								
								<?php $get_description = get_post($image_id)->post_title; if(!empty($get_description)){ echo '<h3>' . $get_description . '</h3>'; } ?>
								
							</a>
						</div>
						</div><!-- close .progression-portfolio-masonry-padding -->
					</div><!-- close .progression-masonry-item progression-masonry-col -->
				<?php endforeach;  ?>
		
			</div><!-- close .progression-grid-masonry<?php echo esc_attr($idpro) ?> -->
		</div><!-- close .progression-masonry-margins-->
		
		<script type="text/javascript">
		jQuery(document).ready(function($) { 'use strict';	
			/* Default Isotope Load Code */
			var $container = $('.progression-grid-masonry<?php echo esc_attr($idpro) ?>').isotope();
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
					    columnWidth: '.progression-masonry-col-<?php echo esc_attr($progression_studios_portfolio_columns) ?>',
					}
		 		});
			});
			/* END Default Isotope Code */
		});
		</script>
		
		<div class="clearfix-pro"></div>
	</div>
		
    <?php
	
   	return $output_pro. ob_get_clean();
	
}


add_action( 'vc_before_init', 'pro_progression_image_gallery_integrateVC' );
function pro_progression_image_gallery_integrateVC() {
	

  
   vc_map( array(
      "name" => esc_html__( "Pro Image Grid", "pro-elements" ),
	  "description" => esc_html__( "Display grid of images", "pro-elements" ),
      "base" => "pro_progression_image_gallery",
	  "weight" => 100,
      "class" => "",
      "category" => esc_html__( "Pro Elements", "pro-elements"),
	  'icon' => 'vc-icon',

	  
      "params" => array(
          array(
            "type" => "attach_images",
 				"class" => "",
             "heading" => esc_html__( "Images", "pro-elements" ),
             "param_name" => "gallery_images",
             "value" => "",
          ),
			 
          array(
             "type" => "dropdown",
 				"class" => "",
             "heading" => __( "Image Grid Column", "pro-elements" ),
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
             "heading" => __( "Image Grid Padding", "pro-elements" ),
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
             "type" => "dropdown",
 				"class" => "",
             "heading" => __( "Image Size", "pro-elements" ),
             "param_name" => "progression_studios_portfolio_cropping",
 				"value"       => array(
 					'Default Image'   	=> 'default',
 					'Tall Image'   	=> 'tall',
 					'Disable Cropping'  	=> 'uncropped',
 			),
 			"std"         => 'tall',
          ),
			 
			 
  
			 
          array(
            "type" => "checkbox",
 				"class" => "",
             "heading" => esc_html__( "Disable Captions", "pro-elements" ),
				 "description" => esc_html__( "Check box to disable captions in lightbox", "pro-elements" ),
             "param_name" => "gallery_post_captions",
             "value" => "",
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
            "type" => "colorpicker",
 				"class" => "",
             "heading" => esc_html__( "Image Background Color", "pro-elements" ),
             "param_name" => "image_bg_color",
             "value" => "#000000",
				 'group' => __( 'Design Options', 'pro-elements' ),
          ),
			 
          array(
            "type" => "checkbox",
 				"class" => "",
             "heading" => esc_html__( "Display Image Title on Hover", "pro-elements" ),
				 "description" => esc_html__( "Check box to enable title on hover", "pro-elements" ),
             "param_name" => "image_title_hover",
             "value" => "",
				 'group' => __( 'Design Options', 'pro-elements' ),
				 
          ),
			 
			 
          array(
             "type" => "dropdown",
 				"class" => "",
             "heading" => __( "Image Hover Effect", "pro-elements" ),
             "param_name" => "image_hover_effect",
 				"value"       => array(
 					esc_html__( 'Zoom', 'pro-elements' )   	=> 		'progression-studios-grid-image-scale',
 					esc_html__( 'Greyscale', 'pro-elements' )  	=> 	'progression-studios-grid-image-zoom-grey',
 					esc_html__( 'Sepia', 'pro-elements' )		=> 		'progression-studios-grid-image-zoom-sepia',
 					esc_html__( 'Saturate', 'pro-elements' )  	=> 	'progression-studios-grid-image-zoom-saturate',
 					esc_html__( 'Shine', 'pro-elements' ) 	=> 			'progression-studios-grid-image-zoom-shine',
					esc_html__( 'No Effect', 'pro-elements' )  	=> 	'progression-studios-grid-image-no-effect',
 			),
 			"std"         => 'progression-studios-grid-image-no-effect',
		 'group' => __( 'Design Options', 'pro-elements' ),
			
          ),
			 
          array(
            "type" => "checkbox",
 				"class" => "",
             "heading" => esc_html__( "Image Hover Transprency", "pro-elements" ),
				 "description" => esc_html__( "Check box to enable transparency on hover", "pro-elements" ),
             "param_name" => "image_transparency_hover",
             "value" => "",
				 'group' => __( 'Design Options', 'pro-elements' ),
				 
          ),
			 
			 

			 
      )
   ) );
}