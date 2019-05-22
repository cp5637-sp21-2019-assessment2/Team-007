<?php
/**
 * Progression Theme Customizer
 *
 * @package pro
 */

get_template_part('inc/customizer/new', 'controls');
get_template_part('inc/customizer/typography', 'controls');


/* Remove Default Theme Customizer Panels that aren't useful */
function progression_studios_change_default_customizer_panels ( $wp_customize ) {
	$wp_customize->remove_section("themes"); //Remove Active Theme + Theme Changer
   $wp_customize->remove_section("static_front_page"); // Remove Front Page Section		
}
add_action( "customize_register", "progression_studios_change_default_customizer_panels" );


/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function progression_studios_customize_preview_js() {
	wp_enqueue_script( 'progression_studios_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'progression_studios_customize_preview_js' );


function progression_studios_customizer( $wp_customize ) {
	
	
	/* Panel - General */
	$wp_customize->add_panel( 'progression_studios_general_panel', array(
		'priority'    => 3,
		'title'       => esc_html__( 'General', 'zaser-progression' ),
		 ) 
 	);
	
	
	/* Section - General - General Layout */
	$wp_customize->add_section( 'progression_studios_section_general_layout', array(
		'title'          => esc_html__( 'General Options', 'zaser-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	

	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_site_boxed' ,array(
		'default' => 'full-width-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_site_boxed', array(
		'label'    => esc_html__( 'Site Layout', 'zaser-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 10,
		'choices'     => array(
			'full-width-pro' => esc_html__( 'Full Width', 'zaser-progression' ),
			'boxed-pro' => esc_html__( 'Boxed', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting('progression_studios_site_width',array(
		'default' => '1200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_site_width', array(
		'label'    => esc_html__( 'Site Width(px)', 'zaser-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 961,
			'max'  => 4500,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_select_color', array(
		'label'    => esc_html__( 'Mouse Selection Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 20,
		)) 
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_select_bg', array(
		'default'	=> '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_select_bg', array(
		'label'    => esc_html__( 'Mouse Selection Background', 'zaser-progression' ),
		'section'  => 'progression_studios_section_general_layout',
		'priority'   => 25,
		)) 
	);
	
	

	
	
	
	
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_caption' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_caption', array(
		'label'    => esc_html__( 'Lightbox Captions', 'zaser-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 100,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_play' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_play', array(
		'label'    => esc_html__( 'Lightbox Gallery Play/Pause', 'zaser-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 110,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	
	/* Setting - General - General Layout */
	$wp_customize->add_setting( 'progression_studios_lightbox_count' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_lightbox_count', array(
		'label'    => esc_html__( 'Lightbox Gallery Count', 'zaser-progression' ),
		'section' => 'progression_studios_section_general_layout',
		'priority'   => 150,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	
	
	
	
	
	
	
	/* Section - General - Page Loader */
	$wp_customize->add_section( 'progression_studios_section_page_transition', array(
		'title'          => esc_html__( 'Page Loader', 'zaser-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 26,
		) 
	);

	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_transition' ,array(
		'default' => 'transition-off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_transition', array(
		'label'    => esc_html__( 'Display Page Loader?', 'zaser-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'priority'   => 10,
		'choices'     => array(
			'transition-on-pro' => esc_html__( 'On', 'zaser-progression' ),
			'transition-off-pro' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_transition_loader' ,array(
		'default' => 'circle-loader-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_transition_loader', array(
		'label'    => esc_html__( 'Page Loader Animation', 'zaser-progression' ),
		'section' => 'progression_studios_section_page_transition',
		'type' => 'select',
		'priority'   => 15,
		'choices' => array(
			'circle-loader-pro' => esc_html__( 'Circle Loader Animation', 'zaser-progression' ),
	        'cube-grid-pro' => esc_html__( 'Cube Grid Animation', 'zaser-progression' ),
	        'rotating-plane-pro' => esc_html__( 'Rotating Plane Animation', 'zaser-progression' ),
	        'double-bounce-pro' => esc_html__( 'Doube Bounce Animation', 'zaser-progression' ),
	        'sk-rectangle-pro' => esc_html__( 'Rectangle Animation', 'zaser-progression' ),
			'sk-cube-pro' => esc_html__( 'Wandering Cube Animation', 'zaser-progression' ),
			'sk-chasing-dots-pro' => esc_html__( 'Chasing Dots Animation', 'zaser-progression' ),
			'sk-circle-child-pro' => esc_html__( 'Circle Animation', 'zaser-progression' ),
			'sk-folding-cube' => esc_html__( 'Folding Cube Animation', 'zaser-progression' ),
		
		 ),
		)
	);





	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_text', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_text', array(
		'label'    => esc_html__( 'Page Loader Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 30,
	) ) 
	);
	
	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_secondary_color', array(
		'default' => '#ededed',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_secondary_color', array(
		'label'    => esc_html__( 'Page Loader Secondary (Circle Loader)', 'zaser-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 31,
	) ) 
	);


	/* Setting - General - Page Loader */
	$wp_customize->add_setting( 'progression_studios_page_loader_bg', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_loader_bg', array(
		'label'    => esc_html__( 'Page Loader Background', 'zaser-progression' ),
		'section'  => 'progression_studios_section_page_transition',
		'priority'   => 35,
	) ) 
	);
	
	
	
	
	
	
	


	/* Section - Footer - Scroll To Top */
	$wp_customize->add_section( 'progression_studios_section_scroll', array(
		'title'          => esc_html__( 'Scroll To Top Button', 'zaser-progression' ),
		'panel'          => 'progression_studios_general_panel', // Not typically needed.
		'priority'       => 100,
	) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_pro_scroll_top', array(
		'default' => 'scroll-on-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_pro_scroll_top', array(
		'label'    => esc_html__( 'Scroll To Top Button', 'zaser-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 10,
		'choices'     => array(
			'scroll-on-pro' => esc_html__( 'On', 'zaser-progression' ),
			'scroll-off-pro' => esc_html__( 'Off', 'zaser-progression' ),
		),
	) ) );

	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
		) 
	);
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_color', array(
		'label'    => esc_html__( 'Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 15,
		) ) 
	);


	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_bg_color', array(
		'default' => '#888888',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
		) 
	);
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_bg_color', array(
		'label'    => esc_html__( 'Background', 'zaser-progression' ),
		'default' => '#888888',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 20,
		) ) 
	);



	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_scroll_hvr_color', array(
		'label'    => esc_html__( 'Hover Arrow Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 30,
		) ) 
	);
	
	/* Setting - Footer - Scroll To Top */
	$wp_customize->add_setting( 'progression_studios_scroll_hvr_bg_color', array(
		'default' => '#4145ee',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_scroll_hvr_bg_color', array(
		'label'    => esc_html__( 'Hover Arrow Background', 'zaser-progression' ),
		'default' => '#1abeb5',
		'section'  => 'progression_studios_section_scroll',
		'priority'   => 40,
		) ) 
	);


	

	
	
	
	
	
	/* Panel - Header */
	$wp_customize->add_panel( 'progression_studios_header_panel', array(
		'priority'    => 5,
		'title'       => esc_html__( 'Header', 'zaser-progression' ),
		) 
	);
	
	
	/* Section - General - Site Logo */
	$wp_customize->add_section( 'progression_studios_section_logo', array(
		'title'          => esc_html__( 'Logo', 'zaser-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 10,
		) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_theme_logo' ,array(
		'default' => get_template_directory_uri().'/images/logo.png',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_theme_logo', array(
		'section' => 'progression_studios_section_logo',
		'priority'   => 10,
		))
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_width',array(
		'default' => '110',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_width', array(
		'label'    => esc_html__( 'Logo Width (px)', 'zaser-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_top',array(
		'default' => '25',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_top', array(
		'label'    => esc_html__( 'Logo Margin Top (px)', 'zaser-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting('progression_studios_theme_logo_margin_bottom',array(
		'default' => '25',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_theme_logo_margin_bottom', array(
		'label'    => esc_html__( 'Logo Margin Bottom (px)', 'zaser-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 250,
			'step' => 1
		), ) ) 
	);
	

	
	/* Setting - General - Site Logo */
	$wp_customize->add_setting( 'progression_studios_logo_position' ,array(
		'default' => 'progression-studios-logo-position-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_logo_position', array(
		'label'    => esc_html__( 'Logo Position', 'zaser-progression' ),
		'section'  => 'progression_studios_section_logo',
		'priority'   => 50,
		'choices'     => array(
			'progression-studios-logo-position-left' => esc_html__( 'Left', 'zaser-progression' ),
			'progression-studios-logo-position-center' => esc_html__( 'Center (Block)', 'zaser-progression' ),
			'progression-studios-logo-position-right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	


	/* Section - Header - Header Options */
	$wp_customize->add_section( 'progression_studios_section_header_bg', array(
		'title'          => esc_html__( 'Header Options', 'zaser-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 20,
		) 
	);
	

	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_width' ,array(
		'default' => 'progression-studios-header-full-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_width', array(
		'label'    => esc_html__( 'Header Layout', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-header-sidebar' => esc_html__( 'Sidebar', 'zaser-progression' ),
			'progression-studios-header-full-width' => esc_html__( 'Wide', 'zaser-progression' ),
			'progression-studios-header-full-width-no-gap' => esc_html__( 'No Gap', 'zaser-progression' ),
			'progression-studios-header-normal-width' => esc_html__( 'Default', 'zaser-progression' ),
		),
		))
	);
	

	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_drop_shadow' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_drop_shadow', array(
		'label'    => esc_html__( 'Display Header Drop Shadow', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 11,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	


	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_background_color', array(
		'default' =>  '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_background_color', array(
		'label'    => esc_html__( 'Header Background Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 15,
		)) 
	);
	
	



	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_header_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_header_bg_image', array(
		'label'    => esc_html__( 'Header Background Image', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 40,
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 50,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'zaser-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'zaser-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_transparent_global' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_transparent_global', array(
		'label'    => esc_html__( 'Set Header Transparent Globally', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 55,
		'choices'     => array(
			'off' => esc_html__( 'Default', 'zaser-progression' ),
			'transparent' => esc_html__( 'Transparent', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_header_transparent_border_clr', array(
		'default' =>  'rgba(255,255,255, 0.16)',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_header_transparent_border_clr', array(
		'default' =>  'rgba(255,255,255, 0.16)',
		'label'    => esc_html__( 'Transparent Header Border Bottom', 'zaser-progression' ),
		'section'  => 'progression_studios_section_header_bg',
		'priority'   => 56,
		)) 
	);
	
	
	/* Setting - Header - Header Options */
	$wp_customize->add_setting( 'progression_studios_one_page_nav' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_one_page_nav', array(
		'label'    => esc_html__( 'One Page Navigation', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_bg',
		'priority'   => 100,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	
	
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_section( 'progression_studios_section_mobile_header', array(
		'title'          => esc_html__( 'Tablet/Mobile Header Options', 'zaser-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 23,
		) 
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_transparent' ,array(
		'default' => 'default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_header_transparent', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Transparent', 'zaser-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 9,
		'choices'     => array(
			'transparent' => esc_html__( 'Transparent', 'zaser-progression' ),
			'default' => esc_html__( 'Default', 'zaser-progression' ),
		),
		))
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_mobile_header_bg', array(
		'label'    => esc_html__( 'Tablet/Mobile Background Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 10,
		)) 
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_left' ,array(
		'default' => 'progression_studios_hide_top_left_bar',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_left', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Left', 'zaser-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 11,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'zaser-progression' ),
			'progression_studios_hide_top_left_bar' => esc_html__( 'Hide', 'zaser-progression' ),
		),
		))
	);
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_top_bar_right' ,array(
		'default' => 'progression_studios_hide_top_left_right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_mobile_top_bar_right', array(
		'label'    => esc_html__( 'Tablet/Mobile Header Top Right', 'zaser-progression' ),
		'section'  => 'progression_studios_section_mobile_header',
		'priority'   => 13,
		'choices'     => array(
			'on-pro' => esc_html__( 'Display', 'zaser-progression' ),
			'progression_studios_hide_top_left_right' => esc_html__( 'Hide', 'zaser-progression' ),
		),
		))
	);

	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_nav_padding' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_nav_padding', array(
		'label'    => esc_html__( 'Tablet/Mobile Nav Padding', 'zaser-progression' ),
		'description'    => esc_html__( 'Optional padding above/below the Navigation. Example: 20', 'zaser-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_width' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_width', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Width', 'zaser-progression' ),
		'description'    => esc_html__( 'Optional logo width. Example: 180', 'zaser-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	
	
	/* Section - Header - Tablet/Mobile Header Options */
	$wp_customize->add_setting( 'progression_studios_mobile_header_logo_margin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_mobile_header_logo_margin', array(
		'label'    => esc_html__( 'Tablet/Mobile Logo Margin Top/Bottom', 'zaser-progression' ),
		'description'    => esc_html__( 'Optional logo margin. Example: 25', 'zaser-progression' ),
		'section' => 'progression_studios_section_mobile_header',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	
	
	
	
	/* Section - Header - Sticky Header */
	$wp_customize->add_section( 'progression_studios_section_sticky_header', array(
		'title'          => esc_html__( 'Sticky Header Options', 'zaser-progression' ),
		'panel'          => 'progression_studios_header_panel', // Not typically needed.
		'priority'       => 25,
		) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_header_sticky' ,array(
		'default' => 'sticky-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_sticky', array(
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 10,
		'choices'     => array(
			'sticky-pro' => esc_html__( 'Sticky Header', 'zaser-progression' ),
			'none-sticky-pro' => esc_html__( 'Disable Sticky Header', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_header_background_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sticky_header_background_color', array(
		'default' => '#ffffff',
		'label'    => esc_html__( 'Sticky Header Background', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 15,
		)) 
	);

	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_logo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_sticky_logo', array(
		'label'    => esc_html__( 'Sticky Logo', 'zaser-progression' ),
		'section' => 'progression_studios_section_sticky_header',
		'priority'   => 20,
		))
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_width',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_width', array(
		'label'    => esc_html__( 'Sticky Logo Width (px)', 'zaser-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'zaser-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_top', array(
		'label'    => esc_html__( 'Sticky Logo Margin Top (px)', 'zaser-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'zaser-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 40,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_logo_margin_bottom', array(
		'label'    => esc_html__( 'Sticky Logo Margin Bottom (px)', 'zaser-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'zaser-progression' ),
		
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 50,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting('progression_studios_sticky_nav_padding',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sticky_nav_padding', array(
		'label'    => esc_html__( 'Sticky Nav Padding Top/Bottom', 'zaser-progression' ),
		'description'    => esc_html__( 'Set option to 0 to ignore this field.', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 60,
		'choices'     => array(
			'min'  => 0,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color', array(
		'label'    => esc_html__( 'Sticky Nav Font Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 70,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_color_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_color_hover', array(
		'label'    => esc_html__( 'Sticky Nav Font Hover Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 80,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_underline', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_underline', array(
		'label'    => esc_html__( 'Sticky Nav Underline', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 95,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_bg', array(
		'label'    => esc_html__( 'Sticky Nav Background Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 100,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_font_hover_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_font_hover_bg', array(
		'label'    => esc_html__( 'Sticky Nav Hover Background', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 105,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_cart_color', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_cart_color', array(
		'label'    => esc_html__( 'Sticky Cart Icon Count Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 115,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_cart_background', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_cart_background', array(
		'label'    => esc_html__( 'Sticky Cart Icon Count Background', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 115,
		)) 
	);
	
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_highlight_button', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_highlight_button', array(
		'label'    => esc_html__( 'Sticky Highlight Background Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 200,
		)) 
	);
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_highlight_font', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_highlight_font', array(
		'label'    => esc_html__( 'Sticky Highlight Font Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 205,
		)) 
	);
	
	/* Setting - Header - Sticky Header */
	$wp_customize->add_setting( 'progression_studios_sticky_nav_highlight_button_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sticky_nav_highlight_button_hover', array(
		'label'    => esc_html__( 'Sticky Highlight Background Hover Color', 'zaser-progression' ),
		'section'  => 'progression_studios_section_sticky_header',
		'priority'   => 215,
		)) 
	);
	
	
	
	
  	/* Section - Header - Header Icons */
  	$wp_customize->add_section( 'progression_studios_section_header_icons', array(
  		'title'          => esc_html__( 'Header Social Icons', 'zaser-progression' ),
  		'panel'          => 'progression_studios_header_panel', // Not typically needed.
  		'priority'       => 100,
  	) );
	
	
	/* Section - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_icon_location' ,array(
		'default' => 'inline-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_header_icon_location', array(
		'label'    => esc_html__( 'Header Icon Location', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'priority'   => 2,
		'choices'     => array(
			'icon-right-pro' => esc_html__( 'Top Right', 'zaser-progression' ),
			'icon-left-pro' => esc_html__( 'Top Left', 'zaser-progression' ),
			'inline-pro' => esc_html__( 'Navigation', 'zaser-progression' ),
		),
		))
	);
	
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_color', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_icon_color', array(
 		'label'    => esc_html__( 'Icon Color', 'zaser-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 5,
 		)) 
 	);
	
 	/* Setting - Header - Header Icons */
 	$wp_customize->add_setting( 'progression_studios_header_icon_bg_color', array(
 		'default'	=> '#444444',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_header_icon_bg_color', array(
 		'label'    => esc_html__( 'Icon Background', 'zaser-progression' ),
		'description'    => esc_html__( 'Does not apply to inline nav icons.', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_header_icons',
 		'priority'   => 8,
 		)) 
 	);
	
	

	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 10,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_vk', array(
		'label'          => esc_html__( 'VK Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_header_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	/* Setting - Header - Header Icons */
	$wp_customize->add_setting( 'progression_studios_header_wishlist' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_header_wishlist', array(
		'label'          => esc_html__( 'Heart Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_header_icons',
		'type' => 'text',
		'priority'   => 160,
		)
	);
	
	
	
	
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_align' ,array(
		'default' => 'progression-studios-nav-right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_align', array(
		'label'    => esc_html__( 'Navigation Alignment', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-nav-left' => esc_html__( 'Left', 'zaser-progression' ),
			'progression-studios-nav-center' => esc_html__( 'Center', 'zaser-progression' ),
			'progression-studios-nav-right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_font_size',array(
		'default' => '15',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 500,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_padding',array(
		'default' => '30',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_padding', array(
		'label'    => esc_html__( 'Navigation Padding Top/Bottom', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 505,
		'choices'     => array(
			'min'  => 5,
			'max'  => 100,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_left_right',array(
		'default' => '18',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_left_right', array(
		'label'    => esc_html__( 'Navigation Padding Left/Right', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 8,
			'max'  => 80,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color', array(
		'default'	=> '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color', array(
		'label'    => esc_html__( 'Navigation Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_font_color_hover', array(
		'default'	=> '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_font_color_hover', array(
		'label'    => esc_html__( 'Navigation Font Hover Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_underline', array(		
		'default'	=> '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_underline', array(
		'label'    => esc_html__( 'Navigation Underline', 'zaser-progression' ),
		'description'    => esc_html__( 'Remove underline by clearing the color.', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 535,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg', array(
		'label'    => esc_html__( 'Navigation Item Background', 'zaser-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_bg_hover', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_bg_hover', array(
		'label'    => esc_html__( 'Navigation Item Background Hover', 'zaser-progression' ),
		'description'    => esc_html__( 'Remove background by clearing the color.', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 536,
		)) 
	);
	
	

	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_nav_letterspacing',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_nav_letterspacing', array(
		'label'          => esc_html__( 'Navigation Letter-Spacing (px)', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 540,
		'choices'     => array(
			'min'  => -2,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);
	
	
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_search' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_search', array(
		'label'    => esc_html__( 'Search Icon in Navigation', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 600,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);


	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_nav_cart', array(
		'label'    => esc_html__( 'Cart Icon in Navigation', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-navigation-font',
		'priority'   => 620,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	

	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_color', array(
		'label'    => esc_html__( 'Cart Icon Count Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 625,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_cart_background', array(
		'default'	=> '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_cart_background', array(
		'label'    => esc_html__( 'Cart Icon Count Background', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 650,
		)) 
	);
	

	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_background', array(
		'default'	=> '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_background', array(
		'label'    => esc_html__( 'Highlight Button Background', 'zaser-progression' ),
		'description'    => esc_html__( 'Add class "highlight-button" to a navigation menu item to create a button.', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 660,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_font_color', array(
		'label'    => esc_html__( 'Highlight Button Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 665,
		)) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_nav_highlight_hover_background', array(
		'default'	=> '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_nav_highlight_hover_background', array(
		'label'    => esc_html__( 'Highlight Button Background Hover', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-navigation-font',
		'priority'   => 680,
		)) 
	);
	
	
	
	
	
	
	
	
	
	
	

	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_bg', array(
		'default' => '#232323',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );	
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_sub_nav_bg', array(
		'default' => '#232323',
		'label'    => esc_html__( 'Sub-Navigation Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 10,
		)) 
	);
	
	
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting('progression_studios_sub_nav_font_size',array(
		'default' => '13',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_font_size', array(
		'label'    => esc_html__( 'Navigation Font Size', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 510,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Header - Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_letterspacing' ,array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_sub_nav_letterspacing', array(
		'label'          => esc_html__( 'Sub-Navigation Letter-Spacing (px)', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 515,
		'choices'     => array(
			'min'  => -2,
			'max'  => 10,
			'step' => 0.5
		), ) ) 
	);

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_font_color', array(
		'default'	=> '#b4b4b4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 520,
		)) 
	);
	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_hover_font_color', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_hover_font_color', array(
		'label'    => esc_html__( 'Sub-Navigation Font Hover Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 530,
		)) 
	);
	
	

	
	
	/* Setting - Header - Sub-Navigation */
	$wp_customize->add_setting( 'progression_studios_sub_nav_border_color', array(
		'default'	=> '#2c2c2c',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_sub_nav_border_color', array(
		'label'    => esc_html__( 'Sub-Navigation Border', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-sub-navigation-font',
		'priority'   => 550,
		)) 
	);
	
	
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_onoff' ,array(
		'default' => 'off-pro',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_top_header_onoff', array(
		'label'    => esc_html__( 'Display Top Header Bar?', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 10,
		'choices'     => array(
			'on-pro' => esc_html__( 'On', 'zaser-progression' ),
			'off-pro' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_background', array(
		'default' => '#282828',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_background', array(
		'label'    => esc_html__( 'Top Header Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 20,
		)) 
	);
	
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_font_size',array(
		'default' => '11',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_font_size', array(
		'label'    => esc_html__( 'Top Header Font Size', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 530,
		'choices'     => array(
			'min'  => 5,
			'max'  => 25,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting('progression_studios_top_header_padding',array(
		'default' => '7',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_top_header_padding', array(
		'label'    => esc_html__( 'Top Header Padding Above/Below', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 535,
		'choices'     => array(
			'min'  => 5,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_color', array(
		'default' => '#cccccc',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 550,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_hover_color', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_hover_color', array(
		'label'    => esc_html__( 'Top Header Font/Link Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 555,
		)) 
	);
	

	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_bg', array(
		'default' => '#282828',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Customize_Alpha_Color_Control($wp_customize, 'progression_studios_top_header_sub_bg', array(
		'default' => '#282828',
		'label'    => esc_html__( 'Sub Navigation Background', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 565,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_color', array(
		'default' => '#b4b4b4',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 570,
		)) 
	);
	
	/* Section - Header - Top Header Options */
	$wp_customize->add_setting( 'progression_studios_top_header_sub_hover_color', array(
		'default' => '#898f6a',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_top_header_sub_hover_color', array(
		'label'    => esc_html__( 'Sub Navigation Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-top-header-font',
		'priority'   => 575,
		)) 
	);
	
	
	
	
	
	
	
	/* Panel - Body */
	$wp_customize->add_panel( 'progression_studios_body_panel', array(
		'priority'    => 8,
        'title'       => esc_html__( 'Body', 'zaser-progression' ),
    ) );
	 
	 
	 
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_color', array(
 		'default'	=> '#4145ee',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_color', array(
 		'label'    => esc_html__( 'Default Link Color', 'zaser-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 500,
 		)) 
 	);
	
 	/* Setting - Body - Body Main */
 	$wp_customize->add_setting( 'progression_studios_default_link_hover_color', array(
 		'default'	=> '#292ca7',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_default_link_hover_color', array(
 		'label'    => esc_html__( 'Default Hover Link Color', 'zaser-progression' ),
 		'section'  => 'tt_font_progression-studios-body-font',
 		'priority'   => 510,
 		)) 
 	);
	
	

	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_background_color', array(
		'default'	=> '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_background_color', array(
		'label'    => esc_html__( 'Body Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 513,
		)) 
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image' ,array(		
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_body_bg_image', array(
		'label'    => esc_html__( 'Body Background Image', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 525,
		))
	);
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_body_bg_image_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_body_bg_image_image_position', array(
		'label'    => esc_html__( 'Image Cover', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 530,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'zaser-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'zaser-progression' ),
		),
		))
	);
	
	
	
	/* Setting - Body - Body Main */
	$wp_customize->add_setting( 'progression_studios_boxed_background_color', array(
		'default'	=> '#f5f5f5',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_boxed_background_color', array(
		'label'    => esc_html__( 'Boxed Content Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-body-font',
		'priority'   => 560,
		)) 
	);
	
	
	
	
	
	

	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_top',array(
		'default' => '170',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_top', array(
		'label'    => esc_html__( 'Page Title Top Padding', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 501,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting('progression_studios_page_title_padding_bottom',array(
		'default' => '170',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_page_title_padding_bottom', array(
		'label'    => esc_html__( 'Page Title Bottom Padding', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 515,
		'choices'     => array(
			'min'  => 0,
			'max'  => 350,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_image' ,array(
		'default' => get_template_directory_uri().'/images/page-title.jpg',
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_page_title_bg_image', array(
		'label'    => esc_html__( 'Page Title Background Image', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - General - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_page_title_image_position', array(
		'section' => 'tt_font_progression-studios-page-title',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'zaser-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - Body - Page Title */
	$wp_customize->add_setting( 'progression_studios_page_title_bg_color', array(
		'default'	=> '#2a2b32',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_page_title_bg_color', array(
		'label'    => esc_html__( 'Page Title Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-page-title',
		'priority'   => 550,
		)) 
	);
	
	
	
	
	/* Section - Blog - Blog Index Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_index', array(
   	'title'          => esc_html__( 'Blog Index Options', 'zaser-progression' ),
   	'panel'          => 'progression_studios_body_panel', // Not typically needed.
   	'priority'       => 560,
   ) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_layout' ,array(
		'default' => 'progression-studios-blog-overlay-default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_layout', array(
		'label'    => esc_html__( 'Post Layout', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 100,
		'choices' => array(
			'progression-studios-blog-overlay-default' => esc_html__( 'Default Layout', 'zaser-progression' ),
			'progression-studios-blog-overlay-styles' => esc_html__( 'Overlay Layout', 'zaser-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_blog_pagination' ,array(
		'default' => 'progression_default_pagination',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_blog_pagination', array(
		'label'    => esc_html__( 'Blog Index Pagnation', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 102,
		'choices' => array(
			'progression_default_pagination' => esc_html__( 'Default Page Numbers', 'zaser-progression' ),
			'progression_load_pagination' => esc_html__( 'Load More Button', 'zaser-progression' ),
			'progression_infinite_pagination' => esc_html__( 'Infinite Scroll', 'zaser-progression' ),
		
		 ),
		)
	);
	
	
	

   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_image_size' ,array(
		'default' => 'progression-studios-blog-size-default',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_blog_image_size', array(
		'label'    => esc_html__( 'Post Image Size', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 104,
		'choices' => array(
			'progression-studios-blog-size-default' => esc_html__( 'Default Size', 'zaser-progression' ),
			'progression-studios-blog-size-tall' => esc_html__( 'Tall Image', 'zaser-progression' ),
			'progression-studios-blog-size-uncropped' => esc_html__( 'Uncropped Image', 'zaser-progression' ),
		
		 ),
		)
	);

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_columns',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_columns', array(
		'label'    => esc_html__( 'Blog Index Column count', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 105,
		'choices'     => array(
			'min'  => 1,
			'max'  => 6,
			'step' => 1
		), ) ) 
	);
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_index_gap',array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_index_gap', array(
		'label'    => esc_html__( 'Blog Index Post Margin', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 110,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	

	

   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_transition' ,array(
		'default' => 'progression-studios-blog-image-scale',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_blog_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'type' => 'select',
		'priority'   => 204,
		'choices' => array(
			'progression-studios-blog-image-scale' => esc_html__( 'Zoom', 'zaser-progression' ),
			'progression-studios-blog-image-zoom-grey' => esc_html__( 'Greyscale', 'zaser-progression' ),
			'progression-studios-blog-image-zoom-sepia' => esc_html__( 'Sepia', 'zaser-progression' ),
			'progression-studios-blog-image-zoom-saturate' => esc_html__( 'Saturate', 'zaser-progression' ),
			'progression-studios-blog-image-zoom-shine' => esc_html__( 'Shine', 'zaser-progression' ),
			'progression-studios-blog-image-no-effect' => esc_html__( 'No Effect', 'zaser-progression' ),
		
		 ),
		)
	);
	
	

	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting('progression_studios_blog_image_opacity',array(
		'default' => '0.5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_blog_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Hover', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 206,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_image_bg', array(
		'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 210,
		)) 
	);
	
	
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_category_display' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_category_display', array(
		'label'    => esc_html__( 'Display Category on Blog Index', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 350,
		'choices' => array(
			'true' => esc_html__( 'Display', 'zaser-progression' ),
			'false' => esc_html__( 'Hide', 'zaser-progression' ),
		
		 ),
		))
	);
	
	
   /* Section - Blog - Blog Index Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_meta_comment_display' ,array(
		'default' => 'false',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_meta_comment_display', array(
		'label'    => esc_html__( 'Display Comment Count on Blog Index', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_index',
		'priority'   => 355,
		'choices' => array(
			'true' => esc_html__( 'Display', 'zaser-progression' ),
			'false' => esc_html__( 'Hide', 'zaser-progression' ),
		
		 ),
		))
	);
	
	
	
	
	
   /* Section - Blog - Blog Post Options */
   $wp_customize->add_section( 'progression_studios_section_blog_post', array(
   	'title'          => esc_html__( 'Blog Post Options', 'zaser-progression' ),
   	'panel'          => 'progression_studios_body_panel', // Not typically needed.
   	'priority'       => 570,
   ) 
	);
	

	
	
	
   /* Section - Blog - Blog Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sidebar' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sidebar', array(
		'label'    => esc_html__( 'Blog Post Sidebar', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 6,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'zaser-progression' ),
			'right' => esc_html__( 'Right', 'zaser-progression' ),
			'none' => esc_html__( 'No Sidebar', 'zaser-progression' ),
		),
		))
	);
	
	
   /* Section - Blog - Blog Post Options */
 	$wp_customize->add_setting( 'progression_studios_blog_post_hide_title' ,array(
 		'default' => 'on',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_hide_title', array(
 		'label'    => esc_html__( 'Display page title on post page', 'zaser-progression' ),
 		'section' => 'progression_studios_section_blog_post',
 		'priority'   => 6,
 		'choices'     => array(
 			'on' => esc_html__( 'Display', 'zaser-progression' ),
 			'off' => esc_html__( 'Hide', 'zaser-progression' ),
 		),
 		))
 	);
	
	
	
   /* Section - Blog - Blog Post Options */
 	$wp_customize->add_setting( 'progression_studios_blog_post_navigation' ,array(
 		'default' => 'on',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_navigation', array(
 		'label'    => esc_html__( 'Post Next/Previous Navigation', 'zaser-progression' ),
 		'section' => 'progression_studios_section_blog_post',
 		'priority'   => 7,
 		'choices'     => array(
 			'on' => esc_html__( 'On', 'zaser-progression' ),
 			'off' => esc_html__( 'Off', 'zaser-progression' ),
 		),
 		))
 	);
	

	
  /* Section - Blog - Blog Post Options */
	$wp_customize->add_setting( 'progression_studios_blog_post_sharing' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_blog_post_sharing', array(
		'label'    => esc_html__( 'Post Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'priority'   => 8,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	

  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_facebook' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_facebook', array(
		'label'          => esc_html__( 'Facebook Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 9,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_twitter' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_twitter', array(
		'label'          => esc_html__( 'Twitter Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 10,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_pinterest' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_pinterest', array(
		'label'          => esc_html__( 'Pinterest Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 15,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_vk' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_vk', array(
		'label'          => esc_html__( 'VK Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 20,
		)
	
	);
	
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_google' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_google', array(
		'label'          => esc_html__( 'Google+ Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 20,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_reddit' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_reddit', array(
		'label'          => esc_html__( 'Reddit Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 25,
		)
	
	);
	
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_linkedin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 30,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_tumblr' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_tumblr', array(
		'label'          => esc_html__( 'Tumblr Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 35,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_stumble' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_stumble', array(
		'label'          => esc_html__( 'StumbleUpon Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 38,
		)
	
	);
	
  /* Section - Blog - Post Options */
	$wp_customize->add_setting( 'progression_single_sharing_mail' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_sharing_mail', array(
		'label'          => esc_html__( 'Email Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_blog_post',
		'type' => 'checkbox',
		'priority'   => 40,
		)
	
	);
	

	



	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting('progression_studios_button_font_size',array(
		'default' => '11',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_button_font_size', array(
		'label'    => esc_html__( 'Button Font Size', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1600,
		'choices'     => array(
			'min'  => 0,
			'max'  => 30,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font', array(
		'label'    => esc_html__( 'Button Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1635,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background', array(
		'default'	=> '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background', array(
		'label'    => esc_html__( 'Button Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1640,
		)) 
	);
	
	
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_font_hover', array(
		'default'	=> '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_font_hover', array(
		'label'    => esc_html__( 'Button Hover Font Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1650,
		)) 
	);
	
	/* Setting - Body - Button Styles */
	$wp_customize->add_setting( 'progression_studios_button_background_hover', array(
		'default'	=> '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_button_background_hover', array(
		'label'    => esc_html__( 'Button Hover Background Color', 'zaser-progression' ),
		'section'  => 'tt_font_progression-studios-button-typography',
		'priority'   => 1680,
		)) 
	);
	

	
	
	
	
	
	
	
	
	
	

	/* Panel - Footer */
	$wp_customize->add_panel( 'progression_studios_footer_panel', array(
		'priority'    => 11,
        'title'       => esc_html__( 'Footer', 'zaser-progression' ),
    ) 
 	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_width' ,array(
		'default' => 'progression-studios-footer-normal-width',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_width', array(
		'label'    => esc_html__( 'Footer Width', 'zaser-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 10,
		'choices'     => array(
			'progression-studios-footer-full-width' => esc_html__( 'Full Width', 'zaser-progression' ),
			'progression-studios-footer-normal-width' => esc_html__( 'Default', 'zaser-progression' ),
		),
		))
	);

	
	/* Setting - Footer - Footer Main */
 	$wp_customize->add_setting( 'progression_studios_footer_background', array(
 		'default'	=> '#292935',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_background', array(
 		'label'    => esc_html__( 'Footer Background', 'zaser-progression' ),
 		'section' => 'tt_font_progression-studios-widgets-font',
 		'priority'   => 510,
 		)) 
 	);
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_footer_main_bg_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_footer_main_bg_image', array(
		'label'    => esc_html__( 'Footer Background Image', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 535,
		))
	);
	
	
	/* Setting - Footer - Footer Main */
	$wp_customize->add_setting( 'progression_studios_main_image_position' ,array(
		'default' => 'cover',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_main_image_position', array(
		'section' => 'tt_font_progression-studios-widgets-font',
		'priority'   => 536,
		'choices'     => array(
			'cover' => esc_html__( 'Image Cover', 'zaser-progression' ),
			'repeat-all' => esc_html__( 'Image Pattern', 'zaser-progression' ),
		),
		))
	);
	

	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_location', array(
		'label'    => esc_html__( 'Footer Navigation Location', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-footer-nav-font',
		'priority'   => 5,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'zaser-progression' ),
			'middle' => esc_html__( 'Middle', 'zaser-progression' ),
			'bottom' => esc_html__( 'Bottom', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Navigation */
	$wp_customize->add_setting( 'progression_studios_footer_nav_align' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_nav_align', array(
		'label'    => esc_html__( 'Footer Navigation Alignment', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-footer-nav-font',
		'priority'   => 10,
		'choices'     => array(
			'progression_studios_nav_footer_left' => esc_html__( 'Left', 'zaser-progression' ),
			'progression_studios_nav_footer_center' => esc_html__( 'Center', 'zaser-progression' ),
			'right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	
	
	

	
	
	
	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_section( 'progression_studios_section_widget_layout', array(
		'title'          => esc_html__( 'Footer Widgets', 'zaser-progression' ),
		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
		'priority'       => 450,
		) 
	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count' ,array(
 		'default' => 'footer-4-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count', array(
 		'label'    => esc_html__( 'Footer Widget Row 1 Count', 'zaser-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
 	$wp_customize->add_setting( 'progression_studios_footer_widget_count_row_two' ,array(
 		'default' => 'footer-4-pro',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_widget_count_row_two', array(
 		'label'    => esc_html__( 'Footer Widget Row 2 Count', 'zaser-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
 		'priority'   => 10,
 		'choices'     => array(
 			'footer-1-pro' => '1',
 			'footer-2-pro' => '2',
			'footer-3-pro' => '3',
			'footer-4-pro' => '4',
			'footer-5-pro' => '5',
 		),
 		))
 	);
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_top',array(
		'default' => '115',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_top', array(
		'label'    => esc_html__( 'Footer Widget Margin Top', 'zaser-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_widgets_margin_bottom',array(
		'default' => '70',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_widgets_margin_bottom', array(
		'label'    => esc_html__( 'Footer Widget Margin Bottom', 'zaser-progression' ),
 		'section' => 'progression_studios_section_widget_layout',
		'priority'   => 22,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	


	

	
	
	
	
	
	
	
	
	 
	 
	 
	
	
	 
	 
	 
	 
  	
	 
	 

	 
	 
  	/* Section - Footer - Footer Icons */
  	$wp_customize->add_section( 'progression_studios_section_footer_icons', array(
  		'title'          => esc_html__( 'Footer Icons', 'zaser-progression' ),
  		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
  		'priority'       => 500,
  	) );
	
	

	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location', array(
		'label'    => esc_html__( 'Footer Icon Location', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 2,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'zaser-progression' ),
			'middle' => esc_html__( 'Middle', 'zaser-progression' ),
			'bottom' => esc_html__( 'Bottom', 'zaser-progression' ),
		),
		))
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_location_align' ,array(
		'default' => 'right',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_location_align', array(
		'label'    => esc_html__( 'Footer Icon Alignment', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 3,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'zaser-progression' ),
			'center' => esc_html__( 'Center', 'zaser-progression' ),
			'right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	

	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_icon_text' ,array(
		'default' => 'off',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_icon_text', array(
		'label'    => esc_html__( 'Footer Icon Text', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 4,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_icon_size',array(
		'default' => '20',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_icon_size', array(
		'label'    => esc_html__( 'Icon Size', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 6,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_top',array(
		'default' => '39', /* 100 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_top', array(
		'label'    => esc_html__( 'Icon Margin Top', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 7,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_bottom',array(
		'default' => '28', /* 75 */
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_bottom', array(
		'label'    => esc_html__( 'Icon Margin Bottom', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 8,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_margin_sides',array(
		'default' => '10',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_margin_sides', array(
		'label'    => esc_html__( 'Icon Margin Left/Right', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'priority'   => 9,
		'choices'     => array(
			'min'  => -3,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	

	
	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_color', array(
 		'default'	=> '#bbbbbb',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_color', array(
 		'label'    => esc_html__( 'Footer Icon Color', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 10,
 		)) 
 	);
	

	
 	/* Setting - Footer - Footer Icons */
 	$wp_customize->add_setting( 'progression_studios_footer_icon_hover_color', array(
		'default'	=> '#4145ee',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_footer_icon_hover_color', array(
 		'label'    => esc_html__( 'Footer Icon Hover Color', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_footer_icons',
 		'priority'   => 12,
 		)) 
 	);
	
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_facebook' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_facebook', array(
		'label'          => esc_html__( 'Facebook Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 13,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitter' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitter', array(
		'label'          => esc_html__( 'Twitter Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 15,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_instagram' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_instagram', array(
		'label'          => esc_html__( 'Instagram Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 20,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_spotify' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_spotify', array(
		'label'          => esc_html__( 'Spotify Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 25,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_youtube' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_youtube', array(
		'label'          => esc_html__( 'Youtube Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 30,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vimeo' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vimeo', array(
		'label'          => esc_html__( 'Vimeo Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 35,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_google_plus' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_google_plus', array(
		'label'          => esc_html__( 'Google + Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 40,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_pinterest' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_pinterest', array(
		'label'          => esc_html__( 'Pinterest Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 45,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_soundcloud' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_soundcloud', array(
		'label'          => esc_html__( 'Soundcloud Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 50,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_linkedin' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 52,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_snapchat' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_snapchat', array(
		'label'          => esc_html__( 'Snapchat Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 55,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tumblr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tumblr', array(
		'label'          => esc_html__( 'Tumblr Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 60,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_flickr' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_flickr', array(
		'label'          => esc_html__( 'Flickr Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 65,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_dribbble' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_dribbble', array(
		'label'          => esc_html__( 'Dribbble Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 70,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_vk' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_vk', array(
		'label'          => esc_html__( 'VK Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 75,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_wordpress' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_wordpress', array(
		'label'          => esc_html__( 'WordPress Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 80,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_houzz' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_houzz', array(
		'label'          => esc_html__( 'Houzz Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 85,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_behance' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_behance', array(
		'label'          => esc_html__( 'Behance Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 90,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_github' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_github', array(
		'label'          => esc_html__( 'GitHub Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 95,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_lastfm' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_lastfm', array(
		'label'          => esc_html__( 'Last.fm Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 100,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_medium' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_medium', array(
		'label'          => esc_html__( 'Medium Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 105,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_tripadvisor' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_tripadvisor', array(
		'label'          => esc_html__( 'Trip Advisor Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 110,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_twitch' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_twitch', array(
		'label'          => esc_html__( 'Twitch Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 115,
		)
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_yelp' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_yelp', array(
		'label'          => esc_html__( 'Yelp Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 120,
		)
	);
	
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_mail' ,array(
		'sanitize_callback' => 'sanitize_email',
	) );
	$wp_customize->add_control( 'progression_studios_footer_mail', array(
		'label'          => esc_html__( 'E-mail Icon', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_icons',
		'type' => 'text',
		'priority'   => 150,
		)
	);
	
	
	
	
	
	
	
	
	
	
	
  	/* Section - Footer - Footer Logo */
  	$wp_customize->add_section( 'progression_studios_section_footer_image', array(
  		'title'          => esc_html__( 'Footer Logo', 'zaser-progression' ),
  		'panel'          => 'progression_studios_footer_panel', // Not typically needed.
  		'priority'       => 550,
  	) );
	
	/* Setting - Footer - Footer Logo */
	$wp_customize->add_setting( 'progression_studios_footer_image_location' ,array(
		'default' => 'bottom',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_image_location', array(
		'label'    => esc_html__( 'Footer Logo Location', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 2,
		'choices'     => array(
			'top' => esc_html__( 'Top', 'zaser-progression' ),
			'middle' => esc_html__( 'Middle', 'zaser-progression' ),
			'bottom' => esc_html__( 'Bottom', 'zaser-progression' ),
		),
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_logo_link' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( 'progression_studios_footer_logo_link', array(
		'label'    => esc_html__( 'Footer Logo Link', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'type' => 'text',
		'priority'   => 3,
		)
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_image_location_align' ,array(
		'default' => 'center',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_image_location_align', array(
		'label'    => esc_html__( 'Footer Logo Alignment', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 4,
		'choices'     => array(
			'progression_studios_footer_logo_left' => esc_html__( 'Left', 'zaser-progression' ),
			'center' => esc_html__( 'Center', 'zaser-progression' ),
			'progression_studios_footer_logo_right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_logo_image' ,array(
		'sanitize_callback' => 'esc_url_raw',
	) );
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'progression_studios_footer_logo_image', array(
		'label'    => esc_html__( 'Footer Logo', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 5,
		))
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_width',array(
		'default' => '200',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_width', array(
		'label'    => esc_html__( 'Footer Logo Width', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 10,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_top',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_top', array(
		'label'    => esc_html__( 'Footer Logo Margin Top', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 15,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_bottom',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_bottom', array(
		'label'    => esc_html__( 'Footer Logo Margin Bottom', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_right',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_right', array(
		'label'    => esc_html__( 'Footer Logo Margin Right', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting('progression_studios_footer_logo_margin_left',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_footer_logo_margin_left', array(
		'label'    => esc_html__( 'Footer Logo Margin Left', 'zaser-progression' ),
		'section' => 'progression_studios_section_footer_image',
		'priority'   => 30,
		'choices'     => array(
			'min'  => 0,
			'max'  => 200,
			'step' => 1
		), ) ) 
	);
	
	
	
	
	
	


	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_footer_copyright' ,array(
		'default' =>  'All Rights Reserved.  Developed by ProgressionStudios',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control( 'progression_studios_footer_copyright', array(
		'label'          => esc_html__( 'Copyright Text', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'type' => 'textarea',
		'priority'   => 10,
		)
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_bg', array(
		'default' => '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_bg', array(
		'label'    => esc_html__( 'Copyright Background', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 150,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_divider_color', array(
		'default' => '#45454f',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_divider_color', array(
		'label'    => esc_html__( 'Copyright Divider color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 155,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link', array(
		'label'    => esc_html__( 'Copyright Link Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 530,
		)) 
	);
	
	/* Setting - Footer - Copyright */
	$wp_customize->add_setting( 'progression_studios_copyright_link_hover', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_copyright_link_hover', array(
		'label'    => esc_html__( 'Copyright Link Hover Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 540,
		)) 
	);
	
	
	/* Setting - Footer - Footer Icons */
	$wp_customize->add_setting( 'progression_studios_footer_copyright_location' ,array(
		'default' => 'footer-copyright-align-left',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_footer_copyright_location', array(
		'label'    => esc_html__( 'Copyright Text Alignment', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 560,
		'choices'     => array(
			'footer-copyright-align-left' => esc_html__( 'Left', 'zaser-progression' ),
			'footer-copyright-align-center' => esc_html__( 'Center', 'zaser-progression' ),
			'footer-copyright-align-right' => esc_html__( 'Right', 'zaser-progression' ),
		),
		))
	);
	
	
 	
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_top',array(
		'default' => '38',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_top', array(
		'label'    => esc_html__( 'Copyright Padding Top', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);
	
	
 	/* Setting - Footer - Footer Widgets */
	$wp_customize->add_setting('progression_studios_copyright_margin_bottom',array(
		'default' => '34',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_copyright_margin_bottom', array(
		'label'    => esc_html__( 'Copyright Padding Bottom', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-copyright-font',
		'priority'   => 22,
		'choices'     => array(
			'min'  => 0,
			'max'  => 150,
			'step' => 1
		), ) ) 
	);

  
  
   
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link', array(
		'default' => '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link', array(
		'label'    => esc_html__( 'Blog Index Heading Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 5,
		)) 
	);
	
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_link_hover', array(
		'default' => '#4145ee',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_link_hover', array(
		'label'    => esc_html__( 'Blog Index Heading Hover Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 10,
		)) 
	);
	
   /* Section - Body - Blog Typography */
	$wp_customize->add_setting( 'progression_studios_blog_title_overlay', array(
		'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_blog_title_overlay', array(
		'label'    => esc_html__( 'Blog Overlay Layout Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-blog-headings',
		'priority'   => 15,
		)) 
	);
	
	
	
	
	
	
	/* Panel - Portfolio */
	$wp_customize->add_panel( 'progression_studios_portfolio_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Portfolio', 'zaser-progression' ),
    ) );
	 

	 
   /* Section - Body - Portfolio Index Options */
 	$wp_customize->add_setting( 'progression_studios_portfolio_layout' ,array(
 		'default' => 'progression-studios-portfolio-overlay-styles',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_portfolio_layout', array(
 		'label'    => esc_html__( 'Portfolio Archive Layout', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
 		'priority'   => 15,
 		'choices' => array(
 			'progression-studios-portfolio-overlay-styles' => esc_html__( 'Overlay Layout', 'zaser-progression' ),
 			'progression-studios-portfolio-content-layout' => esc_html__( 'Content Layout', 'zaser-progression' ),
 		 ),
 		))
 	);
	
	
    /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting('progression_studios_portfolio_columns',array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_portfolio_columns', array(
		'label'    => esc_html__( 'Portfolio Archive Column count', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 20,
		'choices'     => array(
			'min'  => 1,
			'max'  => 6,
			'step' => 1
		), ) ) 
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting('progression_studios_portfolio_index_gap',array(
		'default' => '0',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_portfolio_index_gap', array(
		'label'    => esc_html__( 'Portfolio Archive Post Margin', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 25,
		'choices'     => array(
			'min'  => 0,
			'max'  => 50,
			'step' => 1
		), ) ) 
	);
	
	


  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_posts_page' ,array(
		'default' =>  '12',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_portfolio_posts_page', array(
		'label'          => esc_html__( 'Portfolio Archive Posts Per Page', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'type' => 'text',
		'priority'   => 30,
		)
	
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_image_size' ,array(
		'default' => 'progression-studios-blog-size-tall',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_portfolio_image_size', array(
		'label'    => esc_html__( 'Portfolio Archive Image Size', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'type' => 'select',
		'priority'   => 34,
		'choices' => array(
			'progression-studios-blog-size-default' => esc_html__( 'Default Size', 'zaser-progression' ),
			'progression-studios-blog-size-tall' => esc_html__( 'Tall Image', 'zaser-progression' ),
			'progression-studios-blog-size-uncropped' => esc_html__( 'Uncropped Image', 'zaser-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_portfolio_pagination' ,array(
		'default' => 'progression_default_pagination',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_portfolio_pagination', array(
		'label'    => esc_html__( 'Portfolio Archive Pagination', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'type' => 'select',
		'priority'   => 35,
		'choices' => array(
			'progression_default_pagination' => esc_html__( 'Default Page Numbers', 'zaser-progression' ),
			'progression_load_pagination' => esc_html__( 'Load More Button', 'zaser-progression' ),
			'progression_infinite_pagination' => esc_html__( 'Infinite Scroll', 'zaser-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_index_transition' ,array(
		'default' => 'progression-studios-portfolio-image-scale',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_portfolio_index_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'type' => 'select',
		'priority'   => 105,
		'choices' => array(
			'progression-studios-portfolio-image-scale' => esc_html__( 'Zoom', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-grey' => esc_html__( 'Greyscale', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-sepia' => esc_html__( 'Sepia', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-saturate' => esc_html__( 'Saturate', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-shine' => esc_html__( 'Shine', 'zaser-progression' ),
			'progression-studios-portfolio-image-no-effect' => esc_html__( 'No Effect', 'zaser-progression' ),
		
		 ),
		)
	);
	
   /* Section - Body - Portfolio Index Options */
 	$wp_customize->add_setting( 'progression_studios_portfolio_vertical_hover_effect' ,array(
 		'default' => 'off',
 		'sanitize_callback' => 'progression_studios_sanitize_choices',
 	) );
 	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_portfolio_vertical_hover_effect', array(
 		'label'    => esc_html__( 'Portfolio Hover Vertical Effect', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
 		'priority'   => 106,
 		'choices' => array(
 			'on' => esc_html__( 'Raise on Hover', 'zaser-progression' ),
 			'off' => esc_html__( 'Default', 'zaser-progression' ),
 		 ),
 		))
 	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_portfolio_image_bg', array(
	'default' => '#292935',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_portfolio_image_bg', array(
		'label'    => esc_html__( 'Overlay Content Background Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 110,
		)) 
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_secondary_image_bg', array(
	'default' => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_portfolio_secondary_image_bg', array(
		'label'    => esc_html__( 'Content Layout Background Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 112,
		)) 
	);
	
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting('progression_studios_portfolio_index_image_opacity_default',array(
		'default' => '0.95',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_portfolio_index_image_opacity_default', array(
		'label'    => esc_html__( 'Overlay Opacity on Hover', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 115,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
   /* Section - Portfolio - Gallery Options */
	$wp_customize->add_setting( 'progression_studios_index_overlay_margin' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_index_overlay_margin', array(
		'label'    => esc_html__( 'Portfolio Content Margin', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-portfolio-options',
		'priority'   => 125,
		'choices'     => array(
			'on' => esc_html__( 'Margin', 'zaser-progression' ),
			'off' => esc_html__( 'No Margin', 'zaser-progression' ),
		),
		))
	);
	

	

	
	
	

	
	
	
   /* Section - Portfolio - Gallery Options */
   $wp_customize->add_section( 'progression_studios_section_portfolio_post_options', array(
   	'title'          => esc_html__( 'Portfolio Post', 'zaser-progression' ),
   	'panel'          => 'progression_studios_portfolio_panel', // Not typically needed.
   	'priority'       => 570,
   ) 
	);
	
	
	

	
   
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_single_transition' ,array(
		'default' => 'progression-studios-portfolio-image-scale',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_portfolio_single_transition', array(
		'label'    => esc_html__( 'Image Hover Effect', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'select',
		'priority'   => 25,
		'choices' => array(
			'progression-studios-portfolio-image-scale' => esc_html__( 'Zoom', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-grey' => esc_html__( 'Greyscale', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-sepia' => esc_html__( 'Sepia', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-saturate' => esc_html__( 'Saturate', 'zaser-progression' ),
			'progression-studios-portfolio-image-zoom-shine' => esc_html__( 'Shine', 'zaser-progression' ),
			'progression-studios-portfolio-image-no-effect' => esc_html__( 'No Effect', 'zaser-progression' ),
		
		 ),
		)
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_image_single_bg', array(
	'default' => '#000000',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_portfolio_image_single_bg', array(
		'label'    => esc_html__( 'Image Background Color', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'priority'   => 30,
		)) 
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting('progression_studios_portfolio_single_opacity_hover',array(
		'default' => '0.5',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_portfolio_single_opacity_hover', array(
		'label'    => esc_html__( 'Image Opacity on Hover', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'priority'   => 35,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_post_navigation' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_portfolio_post_navigation', array(
		'label'    => esc_html__( 'Post Next/Previous Navigation', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'priority'   => 205,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	

	
   /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_studios_portfolio_post_sharing' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_portfolio_post_sharing', array(
		'label'    => esc_html__( 'Portfolio Post Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'priority'   => 208,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	

  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_facebook' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_facebook', array(
		'label'          => esc_html__( 'Facebook Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 209,
		)
	
	);
	
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_twitter' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_twitter', array(
		'label'          => esc_html__( 'Twitter Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 210,
		)
	
	);
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_pinterest' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_pinterest', array(
		'label'          => esc_html__( 'Pinterest Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 215,
		)
	
	);
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_vk' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_vk', array(
		'label'          => esc_html__( 'VK Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 220,
		)
	
	);
	
	
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_google' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_google', array(
		'label'          => esc_html__( 'Google+ Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 220,
		)
	
	);
	
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_reddit' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_reddit', array(
		'label'          => esc_html__( 'Reddit Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 225,
		)
	
	);
	
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_linkedin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 230,
		)
	
	);
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_tumblr' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_tumblr', array(
		'label'          => esc_html__( 'Tumblr Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 235,
		)
	
	);
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_stumble' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_stumble', array(
		'label'          => esc_html__( 'StumbleUpon Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 238,
		)
	
	);
	
  /* Section - Body - Portfolio Index Options */
	$wp_customize->add_setting( 'progression_single_portfolio_sharing_mail' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_portfolio_sharing_mail', array(
		'label'          => esc_html__( 'Email Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_portfolio_post_options',
		'type' => 'checkbox',
		'priority'   => 240,
		)
	
	);
	
	
	
	
	
	

	
	
	
	
	/* Panel - Shop */
	$wp_customize->add_panel( 'progression_studios_shop_panel', array(
		'priority'    => 10,
        'title'       => esc_html__( 'Shop', 'zaser-progression' ),
    ) 
 	);


	
   /* Section - Shop - Shop Index Typogrpahy */
	$wp_customize->add_setting( 'progression_studios_shop_rating_color', array(
		'default' => '#aaaaaa',
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_rating_color', array(
		'label'    => esc_html__( 'Shop Rating Color', 'zaser-progression' ),
		'section' => 'tt_font_progression-studios-shop-headings',
		'priority'   => 10,
		)) 
	);
	

	
	
	
	

	
  	/* Section - Shop - Shop Index Options */
  	$wp_customize->add_section( 'progression_studios_section_shop_index', array(
  		'title'          => esc_html__( 'Shop Index Options', 'zaser-progression' ),
  		'panel'          => 'progression_studios_shop_panel', // Not typically needed.
  		'priority'       => 700,
  	) );
	
	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_columns' ,array(
		'default' => '3',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_columns', array(
		'label'    => esc_html__( 'Shop Index Columns', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 20,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
			'6' => '6',
		),
		))
	);
	
	


	/* Section - Shop - Shop Index Options */
	$wp_customize->add_setting( 'progression_studios_shop_posts_Page' ,array(
		'default' =>  '9',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_shop_posts_Page', array(
		'label'          => esc_html__( 'Shop Posts Per Page', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'text',
		'priority'   => 30,

		)
	
	);
	
	
   /* Section - Shop - Shop Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_transition' ,array(
		'default' => 'progression-studios-shop-image-no-effect',
		'sanitize_callback' => 'progression_studios_sanitize_customizer',
	) );
	$wp_customize->add_control( 'progression_studios_shop_index_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'type' => 'select',
		'priority'   => 105,
		'choices' => array(
			'progression-studios-shop-image-scale' => esc_html__( 'Zoom', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-grey' => esc_html__( 'Greyscale', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-sepia' => esc_html__( 'Sepia', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-saturate' => esc_html__( 'Saturate', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-shine' => esc_html__( 'Shine', 'zaser-progression' ),
			'progression-studios-shop-image-no-effect' => esc_html__( 'No Effect', 'zaser-progression' ),
		
		 ),
		)
	);
	
	
   /* Section - Shop - Shop Options */
	$wp_customize->add_setting('progression_studios_shop_index_image_opacity',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_shop_index_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Fade', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 106,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Shop - Shop Options */
	$wp_customize->add_setting( 'progression_studios_shop_index_image_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_index_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_index',
		'priority'   => 110,
		)) 
	);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
   /* Section - Shop - Shop Post Options */
   $wp_customize->add_section( 'progression_studios_section_shop_post', array(
   	'title'          => esc_html__( 'Shop Post Options', 'zaser-progression' ),
   	'panel'          => 'progression_studios_shop_panel', // Not typically needed.
   	'priority'       => 770,
   ) 
	);
	

	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_page_title' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_page_title', array(
		'label'    => esc_html__( 'Show Page Title on Post', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 4,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'zaser-progression' ),
			'off' => esc_html__( 'Hide', 'zaser-progression' ),
		),
		))
	);
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_related_display' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_related_display', array(
		'label'    => esc_html__( 'Show Related Products', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 4,
		'choices'     => array(
			'on' => esc_html__( 'Display', 'zaser-progression' ),
			'off' => esc_html__( 'Hide', 'zaser-progression' ),
		),
		))
	);
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_sidebar' ,array(
		'default' => 'none',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_sidebar', array(
		'label'    => esc_html__( 'Shop Post Sidebar', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 6,
		'choices'     => array(
			'left' => esc_html__( 'Left', 'zaser-progression' ),
			'right' => esc_html__( 'Right', 'zaser-progression' ),
			'none' => esc_html__( 'No Sidebar', 'zaser-progression' ),
		),
		))
	);
	
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_related_columns' ,array(
		'default' => '4',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );

	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_related_columns', array(
		'label'    => esc_html__( 'Shop Related Columns', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 7,
		'choices'     => array(
			'1' => '1',
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
		))
	);
	
	
   /* Section - Shop - Shop Post Options */
 	$wp_customize->add_setting( 'progression_studios_shop_post_top_bg', array(
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_post_top_bg', array(
 		'label'    => esc_html__( 'Shop Top Background Color', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_shop_post',
 		'priority'   => 10,
 		)) 
 	);
	
   /* Section - Shop - Shop Post Options */
 	$wp_customize->add_setting( 'progression_studios_shop_post_bottom_bg', array(
 		'default'	=> '#ffffff',
 		'sanitize_callback' => 'sanitize_hex_color',
 	) );
 	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_post_bottom_bg', array(
 		'label'    => esc_html__( 'Shop Bottom Background Color', 'zaser-progression' ),
 		'section'  => 'progression_studios_section_shop_post',
 		'priority'   => 11,
 		)) 
 	);
	
	
	
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_transition' ,array(
		'default' => 'progression-studios-shop-image-no-effect',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_studios_shop_post_transition', array(
		'label'    => esc_html__( 'Post Image Hover Effect', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'select',
		'priority'   => 105,
		'choices' => array(
			'progression-studios-shop-image-scale' => esc_html__( 'Zoom', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-grey' => esc_html__( 'Greyscale', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-sepia' => esc_html__( 'Sepia', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-saturate' => esc_html__( 'Saturate', 'zaser-progression' ),
			'progression-studios-shop-image-zoom-shine' => esc_html__( 'Shine', 'zaser-progression' ),
			'progression-studios-shop-image-no-effect' => esc_html__( 'No Effect', 'zaser-progression' ),
		
		 ),
		)
	);
	
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting('progression_studios_shop_post_image_opacity',array(
		'default' => '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( new progression_studios_Controls_Slider_Control($wp_customize, 'progression_studios_shop_post_image_opacity', array(
		'label'    => esc_html__( 'Image Transparency on Fade', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 106,
		'choices'     => array(
			'min'  => 0,
			'max'  => 1,
			'step' => 0.05
		), ) ) 
	);
	
	
   /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_image_bg', array(
		'sanitize_callback' => 'sanitize_hex_color',
	) );
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'progression_studios_shop_post_image_bg', array(
		'label'    => esc_html__( 'Post Image Background Color', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 110,
		)) 
	);
	
	
	

	
	
  /* Section - Shop - Shop Post Options */
	$wp_customize->add_setting( 'progression_studios_shop_post_sharing' ,array(
		'default' => 'on',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control(new progression_studios_Controls_Radio_Buttonset_Control($wp_customize, 'progression_studios_shop_post_sharing', array(
		'label'    => esc_html__( 'Shop Post Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'priority'   => 208,
		'choices'     => array(
			'on' => esc_html__( 'On', 'zaser-progression' ),
			'off' => esc_html__( 'Off', 'zaser-progression' ),
		),
		))
	);
	
	

  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_facebook' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_facebook', array(
		'label'          => esc_html__( 'Facebook Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 209,
		)
	
	);
	
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_twitter' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_twitter', array(
		'label'          => esc_html__( 'Twitter Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 210,
		)
	
	);
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_pinterest' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_pinterest', array(
		'label'          => esc_html__( 'Pinterest Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 215,
		)
	
	);
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_vk' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_vk', array(
		'label'          => esc_html__( 'VK Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 220,
		)
	
	);
	
	
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_google' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_google', array(
		'label'          => esc_html__( 'Google+ Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 220,
		)
	
	);
	
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_reddit' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_reddit', array(
		'label'          => esc_html__( 'Reddit Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 225,
		)
	
	);
	
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_linkedin' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_linkedin', array(
		'label'          => esc_html__( 'LinkedIn Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 230,
		)
	
	);
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_tumblr' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_tumblr', array(
		'label'          => esc_html__( 'Tumblr Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 235,
		)
	
	);
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_stumble' ,array(
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_stumble', array(
		'label'          => esc_html__( 'StumbleUpon Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 238,
		)
	
	);
	
  /* Section - Shop - Post Options */
	$wp_customize->add_setting( 'progression_single_shop_sharing_mail' ,array(
		'default' =>  '1',
		'sanitize_callback' => 'progression_studios_sanitize_choices',
	) );
	$wp_customize->add_control( 'progression_single_shop_sharing_mail', array(
		'label'          => esc_html__( 'Email Sharing', 'zaser-progression' ),
		'section' => 'progression_studios_section_shop_post',
		'type' => 'checkbox',
		'priority'   => 240,
		)
	
	);
	
	

	
}
add_action( 'customize_register', 'progression_studios_customizer' );

//HTML Text
function progression_studios_sanitize_customizer( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

//no-HTML text
function progression_studios_sanitize_choices( $input ) {
	return wp_filter_nohtml_kses( $input );
}

function progression_studios_customizer_styles() {
	global $post;
	
	//https://codex.wordpress.org/Function_Reference/wp_add_inline_style
	wp_enqueue_style( 'progression-studios-custom-style', get_template_directory_uri() . '/css/progression_studios_custom_styles.css' );

   if ( get_theme_mod( 'progression_studios_header_bg_image')  ) {
      $progression_studios_header_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_header_bg_image') ) . ");";
	}	else {
		$progression_studios_header_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_drop_shadow', 'on') == 'on' ) {
      $progression_studios_header_shadow_option = "body.progression-studios-header-sidebar-before:before, header#masthead-pro, .progression-sticky-scrolled header#masthead-pro { box-shadow: 0px 1px 6px rgba(0,0,0, 0.09); }";
	}	else {
		$progression_studios_header_shadow_option = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_bg_image_image_position', 'cover') == 'cover' ) {
      $progression_studios_header_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_header_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image') ) {
      $progression_studios_body_bg = "background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_body_bg_image') ). ");";
	}	else {
		$progression_studios_body_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_body_bg_image_image_position', 'cover') == 'cover') {
      $progression_studios_body_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover; background-attachment: fixed;";
	}	else {
		$progression_studios_body_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_page_title_image_position', 'cover') == 'cover' ) {
      $progression_studios_page_tite_bg_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_page_tite_bg_cover = "background-repeat:repeat-all;";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_width', '0') != '0' ) {
      $progression_studios_logo_width = "width:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_width', '70') ) . "px;";
	}	else {
		$progression_studios_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_top', '0') != '0' ) {
      $progression_studios_sticky_logo_top = "padding-top:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_top', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_logo_margin_bottom', '0') != '0' ) {
      $progression_studios_sticky_logo_bottom = "padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_sticky_logo_margin_bottom', '31') ) . "px;";
	}	else {
		$progression_studios_sticky_logo_bottom = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_padding', '0') != '0' ) {
      $progression_studios_sticky_nav_padding = "
		.progression-sticky-scrolled .progression-mini-banner-icon {
			top:" . esc_attr( (get_theme_mod('progression_studios_sticky_nav_padding') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4 ). "px;
		}
		.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 3 ). "px;
		}
		.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count { top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px; }
		.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5  ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') - 5 ). "px;
		}
		.progression-sticky-scrolled .sf-menu a {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_padding') ). "px;
		}
			";
	}	else {
		$progression_studios_sticky_nav_padding = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_underline') ) {
      $progression_studios_nav_underline = "
		.progression-sticky-scrolled .sf-menu a:before {
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
		.progression-sticky-scrolled .sf-menu a:hover:before, .progression-sticky-scrolled .sf-menu li.sfHover a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:". esc_attr( get_theme_mod('progression_studios_sticky_nav_underline') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline = "";
	}
	
   if (  get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_sticky_nav_option_font_color = "
			.progression-sticky-scrolled .active-mobile-icon-pro .mobile-menu-icon-pro, .progression-sticky-scrolled .mobile-menu-icon-pro,  .progression-sticky-scrolled .mobile-menu-icon-pro:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle a.progression-count-icon-nav i.shopping-cart-header-icon,
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search,
	.progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression-sticky-scrolled .sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ) . ";
	}";
	}	else {
		$progression_studios_sticky_nav_option_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_optional_sticky_nav_font_hover = "
		body	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle.activated-class a.progression-count-icon-nav i.shopping-cart-header-icon,
			body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle.activated-class a.progression-count-icon-nav i.shopping-cart-header-icon,
		.progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.shopping-cart-header-icon, .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, .progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_optional_sticky_nav_font_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg') ) {
      $progression_studios_optional_nav_bg = "background:" . esc_attr( get_theme_mod('progression_studios_nav_bg') ). ";";
	}	else {
		$progression_studios_optional_nav_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_underline', '#4145ee') ) {
      $progression_studios_nav_underline_default = "
		.sf-menu a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#4145ee') ). ";
			margin-top:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 3 ). "px;
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
			opacity:1;
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#4145ee') ). ";
		}
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before,
	
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a:before, 
		.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a:before {
			background:" . esc_attr( get_theme_mod('progression_studios_nav_underline', '#4145ee') ). ";
		}
			";
	}	else {
		$progression_studios_nav_underline_default = "";
	}
	
   if ( get_theme_mod( 'progression_studios_top_header_onoff', 'off-pro') == 'off-pro' ) {
      $progression_studios_top_header_off_on_display = "display:none;";
	}	else {
		$progression_studios_top_header_off_on_display = "";
	}
	
   if ( get_theme_mod( 'progression_studios_pro_scroll_top') == "scroll-off-pro" ) {
      $progression_studios_scroll_top_disable = "display:none;";
	}	else {
		$progression_studios_scroll_top_disable = "";
	}
	
   if ( get_theme_mod( 'progression_studios_nav_bg_hover') ) {
      $progression_studios_optiona_nav_bg_hover = ".sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_nav_bg_hover') ). "; }";
	}	else {
		$progression_studios_optiona_nav_bg_hover = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_bg') ) {
      $progression_studios_optiona_sticky_nav_font_bg = ".progression-sticky-scrolled .sf-menu a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_font_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_hover_bg') ) {
      $progression_studios_optiona_sticky_nav_hover_bg = ".progression-sticky-scrolled .sf-menu a:hover, .progression-sticky-scrolled .sf-menu li.sfHover a, .progression-sticky-scrolled .sf-menu li.current-menu-item a { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_font_hover_bg') ). "; }";
	}	else {
		$progression_studios_optiona_sticky_nav_hover_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color') ) {
      $progression_studios_option_sticky_nav_font_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a {
		color:". esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color') ). ";
	}";
	}	else {
		$progression_studios_option_sticky_nav_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_font_color_hover') ) {
      $progression_studios_option_stickY_nav_font_hover_color = ".progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.shopping-cart-header-icon, .progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-toggle.activated-class a i.shopping-cart-header-icon, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a {
		color:" . esc_attr( get_theme_mod('progression_studios_sticky_nav_font_color_hover') ) . ";
	}";
	}	else {
		$progression_studios_option_stickY_nav_font_hover_color = "";
	}
	
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_cart_background') ) {
      $progression_studios_option_sticky_count_bg = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	body .progression-sticky-scrolled .sf-menu .progression-mini-banner-icon { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_cart_background') ). "; }";
	}	else {
		$progression_studios_option_sticky_count_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_cart_color') ) {
      $progression_studios_option_sticky_count_color = ".progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	body .progression-sticky-scrolled .sf-menu .progression-mini-banner-icon, 
	.progression-sticky-scrolled .sf-menu li li .progression-mini-banner-icon,
	.progression-sticky-scrolled .progression-mini-banner-icon { color:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_cart_color') ). "; }";
	}	else {
		$progression_studios_option_sticky_count_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_font') ) {
      $progression_studios_option_sticky_hightlight_font_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.sfHover.highlight-button a, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover { color:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_font') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_font_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button') ) {
      $progression_studios_option_sticky_hightlight_bg_color = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, body  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_sticky_nav_highlight_button_hover') ) {
      $progression_studios_option_sticky_hightlight_bg_color_hover = "body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  body .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,
	body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, body .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before { background:".  esc_attr( get_theme_mod('progression_studios_sticky_nav_highlight_button_hover') ). "; }";
	}	else {
		$progression_studios_option_sticky_hightlight_bg_color_hover = "";
	}

   if ( get_theme_mod( 'progression_studios_mobile_header_bg') ) {
      $progression_studios_mobile_header_bg_color = ".progression-studios-transparent-header header#masthead-pro, header#masthead-pro {background:". esc_attr( get_theme_mod('progression_studios_mobile_header_bg') ) . ";  }";
	}	else {
		$progression_studios_mobile_header_bg_color = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_width') ) {
      $progression_studios_mobile_header_logo_width = "body #logo-pro img { width:" . esc_attr( get_theme_mod('progression_studios_mobile_header_logo_width') ). "px; } ";
	}	else {
		$progression_studios_mobile_header_logo_width = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_logo_margin') ) {
      $progression_studios_mobile_header_logo_margin_top = " body #logo-pro img { padding-top:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; padding-bottom:". esc_attr( get_theme_mod('progression_studios_mobile_header_logo_margin') ). "px; }";
	}	else {
		$progression_studios_mobile_header_logo_margin_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_mobile_header_nav_padding') ) {
      $progression_studios_mobile_header_nav_padding_top = "		#progression-shopping-cart-count span.progression-cart-count {top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding')  ) . "px;}
		.mobile-menu-icon-pro {padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 3 ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px; }
		#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_mobile_header_nav_padding') - 5 ) . "px;
		}";
	}	else {
		$progression_studios_mobile_header_nav_padding_top = "";
	}
	
   if ( get_theme_mod( 'progression_studios_header_transparent_border_clr', 'rgba(255,255,255, 0.16)') ) {
      $progression_studios_transparent_header_border = "
		 .progression-studios-transparent-header header#masthead-pro:after { display:block; background:" . esc_attr( get_theme_mod('progression_studios_header_transparent_border_clr' , 'rgba(255,255,255, 0.16)' ) ) . ";
	}";
	}	else {
		$progression_studios_transparent_header_border = "body .progression-studios-mobile-transparent-header header#masthead-pro:after {display:none;}";
	}
	
   if ( get_theme_mod( 'progression_studios_copyright_divider_color', '#45454f') ) {
      $progression_studios_foter_divider_clr = "#copyright-divider-top {height:1px; background:". esc_attr( get_theme_mod('progression_studios_copyright_divider_color', '#45454f') ) . ";  }";
	}	else {
		$progression_studios_foter_divider_clr = "";
	}
   if ( get_theme_mod( 'progression_studios_footer_main_bg_image') ) {
      $progression_studios_footer_bg_image = "background-image:url(" . esc_attr( get_theme_mod( 'progression_studios_footer_main_bg_image') ) . ");";
	}	else {
		$progression_studios_footer_bg_image = "";
	}
	
   if ( get_theme_mod( 'progression_studios_main_image_position', 'cover') == 'cover' ) {
      $progression_studios_main_image_position_cover = "background-repeat: no-repeat; background-position:center center; background-size: cover;";
	}	else {
		$progression_studios_main_image_position_cover = "background-repeat:repeat-all;";
	}
	
   if ( is_page() && get_post_meta($post->ID, 'progression_studios_header_image', true ) ) {
      $progression_studios_custom_page_title_img = "body #page-title-pro {background-image:url('" . esc_url( get_post_meta($post->ID, 'progression_studios_header_image', true)) . "'); }";
	}	else {
		$progression_studios_custom_page_title_img = "";
	}
   if ( class_exists('Woocommerce') ) {
		global $woocommerce;
		if ( is_shop() || is_singular( 'product')  || is_tax( 'product_cat')  || is_tax( 'product_tag') ) {
			$your_shop_page = get_post( wc_get_page_id( 'shop' ) );
			if ( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true ) ) {
				$progression_studios_woo_page_title = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($your_shop_page->ID, 'progression_studios_header_image', true) ). "'); }";
			} else {
		$progression_studios_woo_page_title = "";
		}
		} else {
		$progression_studios_woo_page_title = "";
	}
	}	else {
		$progression_studios_woo_page_title = "";
	}
	
   if ( get_option( 'page_for_posts' ) ) {
		$cover_page = get_page( get_option( 'page_for_posts' ));
		 if ( is_home() && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) || is_singular( 'post') && get_post_meta($cover_page->ID, 'progression_studios_header_image', true)|| is_category( ) && get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ) {
			$progression_studios_blog_header_img = "body #page-title-pro {background-image:url('" .  esc_url( get_post_meta($cover_page->ID, 'progression_studios_header_image', true) ). "'); }";
		} else {
		$progression_studios_blog_header_img = ""; }
	}	else {
		$progression_studios_blog_header_img = "";
	}
	

   if ( get_theme_mod( 'progression_studios_shop_index_image_bg') ) {
      $progression_studios_shop_index_image_background = ".progression-studios-store-product-image-container {background:". esc_attr( get_theme_mod('progression_studios_shop_index_image_bg') ) . ";}";
	}	else {
		$progression_studios_shop_index_image_background = "";
	}
   if ( get_theme_mod( 'progression_studios_shop_post_image_bg') ) {
      $progression_studios_shop_post_image_bg = ".progression-studios-theme-main-image {background:" . esc_attr( get_theme_mod('progression_studios_shop_post_image_bg') ) . " }";
	}	else {
		$progression_studios_shop_post_image_bg = "";
	}
	
   if ( get_theme_mod( 'progression_studios_shop_post_top_bg') ) {
      $progression_studios_shop_post_top_bg = "body.single-product #single-product-info-background, body.single-product {background:" . esc_attr( get_theme_mod('progression_studios_shop_post_top_bg') ) . " }";
	}	else {
		$progression_studios_shop_post_top_bg = "";
	}

	
	 if ( get_theme_mod( 'progression_studios_site_boxed') == 'boxed-pro' ) {
		 $progression_studios_boxed_layout = "
 	 	@media only screen and (min-width: 959px) {
			
			#boxed-layout-pro.progression-studios-preloader {margin-top:110px;}
			#boxed-layout-pro.progression-studios-preloader.progression-preloader-completed {animation-name: ProMoveUpPageLoaderBoxed; animation-delay:200ms;}
	 	 	#boxed-layout-pro { margin-top:60px; margin-bottom:60px;}
 	 		#boxed-layout-pro [data-vc-full-width-init='true'][data-vc-stretch-content='true'] {
 	 			width:". esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px !important;
 	 			left:50% !important;
 	 			margin-left:-". esc_attr( get_theme_mod('progression_studios_site_width', '1200') / 2 ) . "px;
 	 		}
 	 	}
 	 	#boxed-layout-pro {
 	 		overflow:hidden;
 	 		position:relative;
 	 		width:". esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
 	 		margin-left:auto; margin-right:auto; 
 	 		background-color:". esc_attr( get_theme_mod('progression_studios_boxed_background_color', '#f5f5f5') ) . ";
 	 		box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.15);
 	 	}
	 	#boxed-layout-pro .width-container-pro { width:90%; }
	 	
	 	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
			body #boxed-layout-pro{width:92%;}
			#boxed-layout-pro [data-vc-full-width-init='true'][data-vc-stretch-content='true'] {
				width:112% !important;
				margin-left:-56%;
				left:50% !important;
			}
		}
		
		";
	 }	else {
 		$progression_studios_boxed_layout = "";
 	}
	
	$progression_studios_custom_css = "
	$progression_studios_custom_page_title_img
	$progression_studios_woo_page_title
	$progression_studios_blog_header_img
	body #logo-pro img {
		width:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_width', '110') ) . "px;
		padding-top:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_top', '25') ) . "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_theme_logo_margin_bottom', '25') ) . "px;
	}
	.rev_slider_wrapper span.slider-underline-default:before, .rev_slider_wrapper span.slider-underline:before { background:" .  esc_attr( get_theme_mod('progression_studios_default_link_color', '#4145ee') ) . ";}
	body #content-pro .tribe-events-loop h2.tribe-events-list-event-title a:hover, a, body.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li.active a,  ul.single-shop-social-sharing a:hover, .woocommerce-shop-single .product_meta span.sku_wrapper span.sku, ul.portflio-single-social-sharing a:hover, h2.progression-portfolio-secondary-title a:hover, .progression-studios-author-icons a:hover, ul.blog-single-social-sharing a:hover, #error-page-index h2, .progression-studios-tags a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_color', '#4145ee') ) . ";
	}
	a:hover {
		color:" .  esc_attr( get_theme_mod('progression_studios_default_link_hover_color', '#292ca7') ). ";
	}
	.width-container-pro { 
		width:" .  esc_attr( get_theme_mod('progression_studios_site_width', '1200') ) . "px;
	}
	body.progression-studios-header-sidebar-before #progression-inline-icons .progression-studios-social-icons, body.progression-studios-header-sidebar-before:before, header#masthead-pro {
		background-color:" .  esc_attr( get_theme_mod('progression_studios_header_background_color', '#ffffff') ) . ";
		$progression_studios_header_bg_image
		$progression_studios_header_bg_cover
	}
	$progression_studios_header_shadow_option
	body {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_background_color', '#f5f5f5') ). ";
		$progression_studios_body_bg
		$progression_studios_body_bg_cover
	}
	#page-title-pro {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_page_title_bg_color', '#2a2b32') ). ";
		background-image:url(" .   esc_attr( get_theme_mod( 'progression_studios_page_title_bg_image', get_template_directory_uri() . '/images/page-title.jpg' ) ). ");
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '170') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '170') ). "px;
		$progression_studios_page_tite_bg_cover
	}
	#post-secondary-page-title-pro {
		background-color:" .   esc_attr( get_theme_mod('progression_studios_page_title_bg_color', '#2a2b32') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '170') ). "px;
		padding-bottom:" .  esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '170') ). "px;
	}
	/* START BLOG STYLES */
	.progression-studios-feaured-image {background:" . esc_attr( get_theme_mod('progression_studios_blog_image_bg', '#000000') ) . ";}
	.progression-studios-blog-overlay-styles:hover a img, .progression-studios-feaured-image:hover a img { opacity:" . esc_attr( get_theme_mod('progression_studios_blog_image_opacity', '0.5') ) . ";}
	h2.progression-blog-title a {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link', '#292935') ) . ";}
	h2.progression-blog-title a:hover {color:" . esc_attr( get_theme_mod('progression_studios_blog_title_link_hover', '#4145ee') ) . ";}
	.progression-studios-blog-overlay-styles .progression-author-meta, .progression-studios-blog-overlay-styles .progresion-meta-date, .progression-studios-blog-overlay-styles .progression-author-meta a, .progression-studios-blog-overlay-styles .progression-blog-content h2.progression-blog-title, .progression-studios-blog-overlay-styles .progression-blog-content h2.progression-blog-title a { color:" . esc_attr( get_theme_mod('progression_studios_blog_title_overlay', '#ffffff') ) . "; }
	/* END BLOG STYLES */
	/* START PORTFOLIO STYLES */
	.progression-portfolio-content:before { background:" .   esc_attr( get_theme_mod('progression_studios_shop_portfolio_image_bg', '#292935') ) ."; opacity:" .   esc_attr( get_theme_mod('progression_studios_portfolio_index_image_opacity_default', '0.95') ) .";  }
	.progression-portfolio-secondary-content { background:" .   esc_attr( get_theme_mod('progression_studios_portfolio_secondary_image_bg', '#ffffff') ) .";  }
	.progression-studios-portfolio-content-layout .progression-studios-portfolio-image:hover img { opacity:" .   esc_attr( get_theme_mod('progression_studios_portfolio_index_image_opacity_default', '0.95') ) ."; }
	.progression-studios-portfolio-content-layout  { background:" .   esc_attr( get_theme_mod('progression_studios_shop_portfolio_image_bg', '#292935') ) .";}
	.progression-studios-feaured-image-single-portfolio:hover img, .progression-studios-image-grid-transparency.progression-studios-grid a:hover img {opacity:" .   esc_attr( get_theme_mod('progression_studios_portfolio_single_opacity_hover', '0.5') ) .";}
	.progression-studios-feaured-image-single-portfolio {background:" .   esc_attr( get_theme_mod('progression_studios_portfolio_image_single_bg', '#000000') ) .";}
	/* END PORTFOLIO STYLES */
	/* START SHOP STYLES */
	$progression_studios_shop_index_image_background
	.progression-studios-store-product-image-container:hover img { opacity:" . esc_attr( get_theme_mod('progression_studios_shop_index_image_opacity', '1') ). "; }
	a.progression-studios-gallery-image:hover img { opacity:" . esc_attr( get_theme_mod('progression_studios_shop_post_image_opacity', '1') ) . "; }
	$progression_studios_shop_post_image_bg
	#single-product-tabs-background, body.woocommerce .woocommerce-tabs.wc-tabs-wrapper ul.tabs.wc-tabs li.active a { background:" . esc_attr( get_theme_mod('progression_studios_shop_post_bottom_bg', '#ffffff') ) . "; }
	$progression_studios_shop_post_top_bg
	.widget_rating_filter ul li.wc-layered-nav-rating  a .star-rating, .woocommerce ul.product_list_widget li .star-rating, p.stars a, p.stars a:hover, .woocommerce-shop-single .star-rating, #boxed-layout-pro .woocommerce ul.products li.product .star-rating { color:" . esc_attr( get_theme_mod('progression_studios_shop_rating_color', '#aaaaaa') ) . "; }
	/* END SHOP STYLES */
	/* START BUTTON STYLES */
	body #content-pro .width-container-pro input.tribe-events-button, ul.filter-button-group li, body #content-pro .woocommerce p.return-to-shop a.button, .woocommerce-shop-single .summary button.button, body .checkout .woocommerce-checkout-payment input.button, .cart_totals  .wc-proceed-to-checkout a.checkout-button, .woocommerce-tabs #review_form .comment-respond input#submit, .comment-respond input#submit, input.wpcf7-submit, .comment-navigation a, #content-pro .woocommerce table.shop_table input.button, body #content-pro .woocommerce p.return-to-shop a.button, .woocommerce-MyAccount-content input.button, .woocommerce form.checkout_coupon input.button, .woocommerce form.login input.button, .woocommerce form.woocommerce-ResetPassword input.button, .woocommerce #customer_login form.login input.button, .woocommerce #customer_login form.register input.button, #content-pro ul.products li.product a.button { font-size:" . esc_attr( get_theme_mod('progression_studios_button_font_size', '13') ) . "px; }

	body #content-pro #bbpress-forums #bbp-user-navigation ul li.current a, #bbpress-forums button.button, form.bbp-login-form button.user-submit, .tribe-events-calendar td.tribe-events-present div[id*='tribe-events-daynum-'], .tribe-events-calendar td.tribe-events-present div[id*='tribe-events-daynum-'] > a, .tribe-events-back a, body #content-pro .tribe-events-loop .tribe-events-day-time-slot h5, body #content-pro .tribe-events-loop .tribe-events-list-separator-month, body #content-pro a.tribe-events-button, body #content-pro .width-container-pro table.tribe-events-calendar thead th, body #content-pro .width-container-pro input.tribe-events-button, .progression-studios-team-overlay-icons a, .tparrows.custom:hover, .progression-studios-owl-carousel.owl-theme .owl-controls .owl-nav .owl-next:hover, .progression-studios-owl-carousel.owl-theme .owl-controls .owl-nav .owl-prev:hover, ul.filter-button-group li.is-checked, body #progression-checkout-basket a.cart-button-header-cart:hover, #infinite-nav-pro a, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.added_to_cart, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.button body #content-pro .woocommerce-error, body #content-pro .woocommerce-info, body #content-pro .woocommerce-message, .widget .widget_shopping_cart_content p.buttons a.button.wc-forward, .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button , .flex-direction-nav a:hover, .post-password-form input[type=submit], .comment-respond input#submit, .wpcf7-form input.wpcf7-submit, .widget ul li.current-cat span.count, footer#site-footer .widget .tagcloud a:hover, .widget .tagcloud a:hover, .progression-studios-sticky-post, body .woocommerce nav.woocommerce-MyAccount-navigation li.is-active a, body #content-pro .woocommerce p.return-to-shop a.button, .woocommerce-shop-single .summary button.button, body .checkout .woocommerce-checkout-payment input.button, .cart_totals  .wc-proceed-to-checkout a.checkout-button, .woocommerce-tabs #review_form .comment-respond input#submit, .comment-respond input#submit, input.wpcf7-submit, .comment-navigation a, #content-pro .woocommerce table.shop_table input.button, body #content-pro .woocommerce p.return-to-shop a.button, .woocommerce-MyAccount-content input.button, .woocommerce form.checkout_coupon input.button, .woocommerce form.login input.button, .woocommerce form.woocommerce-ResetPassword input.button, .woocommerce #customer_login form.login input.button, .woocommerce #customer_login form.register input.button, #content-pro ul.products li.product a.button { background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . "; }
	
	a.progression-button, .hover-icon:hover .aio-icon { background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . " !important; color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . " !important; }
	body #progression-checkout-basket a.cart-button-header-cart:hover {color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . " !important;}
	#bbpress-forums button.button:hover, form.bbp-login-form button.user-submit:hover, .tribe-events-back a:hover, body #content-pro a.tribe-events-button:hover, body #content-pro .width-container-pro input.tribe-events-button:hover, #infinite-nav-pro a:hover, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.added_to_cart:hover, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.button:hover, .widget .widget_shopping_cart_content p.buttons a.button.wc-forward:hover, .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button:hover, .post-password-form input[type=submit]:hover, .comment-respond input#submit:hover, .wpcf7-form input.wpcf7-submit:hover, .comment-navigation a:hover,  #content-pro .woocommerce table.shop_table input.button:hover,  body #content-pro .woocommerce p.return-to-shop a.button:hover, body .checkout .woocommerce-checkout-payment input.button:hover, .cart_totals  .wc-proceed-to-checkout a.checkout-button:hover, .woocommerce-MyAccount-content input.button:hover, .woocommerce form.checkout_coupon input.button:hover, .woocommerce form.login input.button:hover, .woocommerce form.woocommerce-ResetPassword input.button:hover, .woocommerce #customer_login form.login input.button:hover, .woocommerce #customer_login form.register input.button:hover, .woocommerce-tabs #review_form .comment-respond input#submit:hover, .comment-respond input#submit:hover, input.wpcf7-submit:hover, .woocommerce-shop-single .summary .woocommerce-variation-add-to-cart-disabled button.button:hover, .woocommerce-shop-single .summary .woocommerce-variation-add-to-cart-disabled button.button, #content-pro ul.products li.product a.button:hover, .woocommerce-shop-single .summary button.button:hover { background:" . esc_attr( get_theme_mod('progression_studios_button_background_hover', '#292935') ) . "; color:" . esc_attr( get_theme_mod('progression_studios_button_font_hover', '#ffffff') ) . "; }
	
	.progression-page-nav a:hover, .progression-page-nav span, #content-pro ul.page-numbers li a:hover, #content-pro ul.page-numbers li span.current { border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; }
	
	#boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.progression-shop-overlay-more:hover, footer#site-footer .widget ul.product_list_widget li, .woocommerce ul.product_list_widget li span.woocommerce-Price-amount, .widget.widget_layered_nav_filters ul li.chosen a, .widget ul li.wc-layered-nav-term.chosen a { color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; }
	
	body #content-pro .width-container-pro table.tribe-events-calendar thead th, body #progression-checkout-basket a.cart-button-header-cart:hover, .widget.widget_layered_nav_filters ul li.chosen a:before, .widget ul li.wc-layered-nav-term.chosen a:before { background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; }
	
	.widget_rating_filter ul li.wc-layered-nav-rating.chosen a:before, .widget ul li.wc-layered-nav-term.chosen span.count { background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . ";	border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; color:" . esc_attr( get_theme_mod('progression_studios_button_font', '#ffffff') ) . "; }
	
	#bbpress-forums .bbp-topic-form form input#bbp_topic_tags:focus, #bbpress-forums .bbp-topic-form form textarea:focus, .bbp-form input:focus, #bbpress-forums .bbp-reply-form form input#bbp_topic_tags:focus, #bbpress-forums .bbp-reply-form form textarea:focus, .sidebar .bbp-login-form input:focus, #bbpress-forums input:focus, #bbpress-forums textarea:focus, .widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-handle, .progression-single-portfolio-container .post-password-form input:focus, .post-password-form input:focus, .login .input-text:focus, .checkout_coupon .input-text:focus, .input-text:focus, .woocommerce-FormRow input.woocommerce-Input:focus, form.checkout.woocommerce-checkout textarea.input-text:focus, form.checkout.woocommerce-checkout input.input-text:focus, #content-pro .woocommerce table.shop_table input:focus, #content-pro .woocommerce table.shop_table .coupon input#coupon_code:focus, .woocommerce .woocommerce-tabs #respond textarea:focus, .woocommerce .woocommerce-tabs #respond input:focus, .woocommerce-shop-single .quantity input:focus, .comment-respond input:focus, .comment-respond textarea:focus, .search-form input.search-field:focus, .wpcf7-form .dark-contact-form input:focus, .wpcf7-form .dark-contact-form textarea:focus, .wpcf7-form input:focus, .wpcf7-form textarea:focus, body .woocommerce .woocommerce-MyAccount-content { border-color:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; }
	
	body .woocommerce-shop-single span.onsale:before, #boxed-layout-pro ul.products li.product span.onsale:before, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.added_to_cart, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.button, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons, .widget.widget_price_filter form .price_slider_wrapper .price_slider .ui-slider-range { background:" . esc_attr( get_theme_mod('progression_studios_button_background', '#4145ee') ) . "; }
	/* END BUTTON STYLES */
	/* START Sticky Nav Styles */
	.progression-studios-transparent-header .progression-sticky-scrolled header#masthead-pro, .progression-sticky-scrolled header#masthead-pro, #progression-sticky-header.progression-sticky-scrolled { background-color:" .   esc_attr( get_theme_mod('progression_studios_sticky_header_background_color', '#ffffff') ) ."; }
	body .progression-sticky-scrolled #logo-pro img {
		$progression_studios_logo_width
		$progression_studios_sticky_logo_top
		$progression_studios_sticky_logo_bottom
	}
	$progression_studios_sticky_nav_padding
	$progression_studios_sticky_nav_option_font_color	
	$progression_studios_optional_sticky_nav_font_hover
	$progression_studios_nav_underline
	/* END Sticky Nav Styles */
	/* START Main Navigation Customizer Styles */
	#progression-shopping-cart-count a.progression-count-icon-nav, nav#site-navigation { letter-spacing: ". esc_attr( get_theme_mod('progression_studios_nav_letterspacing', '0') ). "px; }
	#progression-inline-icons .progression-studios-social-icons a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 3 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 3 ). "px;
	}
	.mobile-menu-icon-pro {
		min-width:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 6 ). "px;
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 3 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 6 ). "px;
	}
	#progression-shopping-cart-count span.progression-cart-count {
		right:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') - 3 ). "px;
		top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 5 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 10 ). "px;
	}
	#progression-studios-header-search-icon i.pe-7s-search {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 5 ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') - 5 ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') + 10 ). "px;
	}
	.sf-menu a {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
		padding-top:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ). "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_nav_padding', '30') ). "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_nav_font_size', '15') ). "px;
		$progression_studios_optional_nav_bg
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a  {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_font_color', '#292935') ). ";
	}
	$progression_studios_nav_underline_default
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle.activated-class a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-shopping-cart-toggle.activated-class a.progression-count-icon-nav i.shopping-cart-header-icon,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled  #progression-inline-icons .progression-studios-social-icons a:hover,
	.active-mobile-icon-pro .mobile-menu-icon-pro,
	.mobile-menu-icon-pro:hover,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover i.shopping-cart-header-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover i.shopping-cart-header-icon,
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon:hover i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-inline-icons .progression-studios-social-icons a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count a.progression-count-icon-nav:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu a:hover, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover a, 
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item a,
	#progression-studios-header-search-icon:hover i.pe-7s-search, #progression-studios-header-search-icon.active-search-icon-pro i.pe-7s-search, #progression-shopping-cart-toggle.activated-class a i.shopping-cart-header-icon, #progression-inline-icons .progression-studios-social-icons a:hover, #progression-shopping-cart-count a.progression-count-icon-nav:hover, .sf-menu a:hover, .sf-menu li.sfHover a, .sf-menu li.current-menu-item a {
		color:". esc_attr( get_theme_mod('progression_studios_nav_font_color_hover', '#292935') ) . ";
	}
	#progression-checkout-basket, #panel-search-progression, .sf-menu ul {
		background:".  esc_attr( get_theme_mod('progression_studios_sub_nav_bg', '#232323') ). ";
	}
	.sf-menu li li a { 
		letter-spacing:".  esc_attr( get_theme_mod('progression_studios_sub_nav_letterspacing', '0') ). "px;
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13') ). "px;
	}
	#progression-checkout-basket .progression-sub-total {
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	#panel-search-progression input, #progression-checkout-basket ul#progression-cart-small li.empty { 
		font-size:".  esc_attr( get_theme_mod('progression_studios_sub_nav_font_size', '13' ) ). "px;
	}
	.progression-sticky-scrolled #progression-checkout-basket, .progression-sticky-scrolled #progression-checkout-basket a, .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #panel-search-progression .search-form input.search-field, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover.highlight-button li a, .sf-menu li.current-menu-item.highlight-button li a, .progression-sticky-scrolled #progression-checkout-basket a.cart-button-header-cart:hover, .progression-sticky-scrolled #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket a.cart-button-header-cart:hover, #progression-checkout-basket a.checkout-button-header-cart:hover, #progression-checkout-basket, #progression-checkout-basket a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_font_color', '#b4b4b4') ) . ";
	}
	.progression-sticky-scrolled .sf-menu li li a:hover,  .progression-sticky-scrolled .sf-menu li.sfHover li a, .progression-sticky-scrolled .sf-menu li.current-menu-item li a, .sf-menu li.sfHover li a, .sf-menu li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a { 
		background:none;
	}
	.progression-sticky-scrolled #progression-checkout-basket a:hover, .progression-sticky-scrolled #progression-checkout-basket ul#progression-cart-small li h6, .progression-sticky-scrolled #progression-checkout-basket .progression-sub-total span.total-number-add, .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_navigation_color .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover.highlight-button li a:hover, .sf-menu li.current-menu-item.highlight-button li a:hover, #progression-checkout-basket a.cart-button-header-cart, #progression-checkout-basket a.checkout-button-header-cart, #progression-checkout-basket a:hover, #progression-checkout-basket ul#progression-cart-small li h6, #progression-checkout-basket .progression-sub-total span.total-number-add, .sf-menu li.sfHover li a:hover, .sf-menu li.sfHover li.sfHover a, .sf-menu li.sfHover li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .sf-menu li.sfHover li li li li li a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a { 
		color:". esc_attr( get_theme_mod('progression_studios_sub_nav_hover_font_color', '#ffffff') ) . ";
	}
	
	.progression_studios_force_dark_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled #progression-shopping-cart-count span.progression-cart-count,
	#progression-shopping-cart-count span.progression-cart-count { 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#4145ee') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#ffffff') ) . ";
	}
	.progression-sticky-scrolled .sf-menu .progression-mini-banner-icon,
	.sf-menu li li .progression-mini-banner-icon,
	.progression-mini-banner-icon {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_cart_background', '#4145ee') ) . "; 
		color:" . esc_attr( get_theme_mod('progression_studios_nav_cart_color', '#ffffff') ) . ";
	}
	.progression-mini-banner-icon {
		top:" . esc_attr( (get_theme_mod('progression_studios_nav_padding', '30') - get_theme_mod('progression_studios_nav_font_size', '15')) - 4 ). "px;
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') / 2 ) . "px; 
	}
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_background', '#292935') ) . "; 
	}
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover, .sf-menu li.sfHover.highlight-button a, .sf-menu li.current-menu-item.highlight-button a, .sf-menu li.highlight-button a, .sf-menu li.highlight-button a:hover {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ). "; 
	}
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before,  .progression_studios_force_dark_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:before, .sf-menu li.current-menu-item.highlight-button a:before, .sf-menu li.highlight-button a:before {
		color:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_font_color', '#ffffff') ). "; 
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_background', '#4145ee') ). ";  opacity:1; width:100%;
	}
	
	.progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.current-menu-item.highlight-button a:hover:before, .progression_studios_force_light_navigation_color .progression-sticky-scrolled .sf-menu li.highlight-button a:hover:before, .sf-menu li.current-menu-item.highlight-button a:hover:before, .sf-menu li.highlight-button a:hover:before {
		background:" . esc_attr( get_theme_mod('progression_studios_nav_highlight_hover_background', '#292935') ). "; 
		width:100%;
	}
	
	#progression-checkout-basket ul#progression-cart-small li, #progression-checkout-basket .progression-sub-total, #panel-search-progression .search-form input.search-field, .sf-mega li:last-child li a, body header .sf-mega li:last-child li a, .sf-menu li li a, .sf-mega h2.mega-menu-heading, .sf-mega ul, body .sf-mega ul, #progression-checkout-basket .progression-sub-total, #progression-checkout-basket ul#progression-cart-small li { 
		border-color:" . esc_attr( get_theme_mod('progression_studios_sub_nav_border_color', '#2c2c2c') ) . ";
	}
	
	.sf-menu a:before {
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
	}
	.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
	   width: -moz-calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ). "px);
	   width: -webkit-calc(100% - ". esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) . "px);
	   width: calc(100% - " . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) . "px);
	}
	#progression-inline-icons .progression-studios-social-icons a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') -  7 ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ). "px;
	}
	#progression-studios-header-search-icon i.pe-7s-search {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7). "px;
	}
	#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon { 
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7). "px;
		padding-right:4px;
	}
	#progression-inline-icons .progression-studios-social-icons {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ). "px;
	}
	.sf-menu a {
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ). "px;
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ). "px;
	}
	
	.sf-menu li.highlight-button { 
		margin-right:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ) . "px;
		margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 7 ) . "px;
	}
	.sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 15 ) . "px;
	}
	.sf-arrows .sf-with-ul:after { 
		right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 9 ) . "px;
	}
	
	.rtl .sf-arrows .sf-with-ul {
		padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') ) . "px;
		padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 15 ) . "px;
	}
	.rtl  .sf-arrows .sf-with-ul:after { 
		right:auto;
		left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 9 ) . "px;
	}
	
	@media only screen and (min-width: 960px) and (max-width: 1300px) {
		#post-secondary-page-title-pro, #page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '170') - 20 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '170') - 20 ). "px;
		}	
		.sf-menu a:before {
			margin-left:". esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ) . "px;
		}
		.sf-menu a:hover:before, .sf-menu li.sfHover a:before, .sf-menu li.current-menu-item a:before {
		   width: -moz-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		   width: -webkit-calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		   width: calc(100% - " . esc_attr( (get_theme_mod('progression_studios_nav_left_right', '18') * 2 ) - 6) . "px);
		}
		.sf-menu a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 4 ). "px;
		}
		.sf-menu li.highlight-button { 
			margin-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12 ). "px;
			margin-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12 ). "px;
		}
		.sf-arrows .sf-with-ul {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 13 ). "px;
		}
		.sf-arrows .sf-with-ul:after { 
			right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 7 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18')  ). "px;
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 13 ). "px;
		}
		.rtl .sf-arrows .sf-with-ul:after { 
			right:auto;
			left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') + 7 ). "px;
		}
		#progression-inline-icons .progression-studios-social-icons a {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') -  12 ). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12 ). "px;
		}
		#progression-studios-header-search-icon i.pe-7s-search {
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12). "px;
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12). "px;
		}
		#progression-shopping-cart-count a.progression-count-icon-nav i.shopping-cart-header-icon { 
			padding-left:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12). "px;
		}
		#progression-inline-icons .progression-studios-social-icons {
			padding-right:" . esc_attr( get_theme_mod('progression_studios_nav_left_right', '18') - 12 ). "px;
		}
	}
	
	$progression_studios_optiona_nav_bg_hover
	$progression_studios_optiona_sticky_nav_font_bg	
	$progression_studios_optiona_sticky_nav_hover_bg
	$progression_studios_option_sticky_nav_font_color	
	$progression_studios_option_stickY_nav_font_hover_color
	$progression_studios_option_sticky_count_bg
	$progression_studios_option_sticky_count_color
	$progression_studios_option_sticky_hightlight_bg_color
	$progression_studios_option_sticky_hightlight_font_color
	$progression_studios_option_sticky_hightlight_bg_color_hover
	/* END Main Navigation Customizer Styles */
	/* START Top Header Top Styles */
	#zaser-progression-header-top {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '11') ) . "px;
		$progression_studios_top_header_off_on_display
	}
	#zaser-progression-header-top .sf-menu a {
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '11') ) . "px;
	}
	.progression-studios-header-left .widget, .progression-studios-header-right .widget {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') + 1 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') ) . "px;
	}
	#zaser-progression-header-top .sf-menu a {
		padding-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') + 2 ) . "px;
		padding-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') + 2 ) . "px;
	}
	#zaser-progression-header-top  .progression-studios-social-icons a {
		margin-top:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') - 4 ) . "px;
		margin-bottom:" . esc_attr( get_theme_mod('progression_studios_top_header_padding', '7') - 4 ) . "px;
		font-size:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '11') - 2 ) . "px;
		min-width:" . esc_attr( get_theme_mod('progression_studios_top_header_font_size', '11') - 1 ) . "px;
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', '#444444') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#fffffff') ) . ";
	}
	#main-nav-mobile .progression-studios-social-icons a {
		background:" . esc_attr( get_theme_mod('progression_studios_header_icon_bg_color', '#444444') ) . ";
		color:" . esc_attr( get_theme_mod('progression_studios_header_icon_color', '#fffffff') ) . ";
	}
	#zaser-progression-header-top a, #zaser-progression-header-top .sf-menu a, #zaser-progression-header-top {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_color', '#cccccc') ) . ";
	}
	#zaser-progression-header-top a:hover, #zaser-progression-header-top .sf-menu a:hover, #zaser-progression-header-top .sf-menu li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_hover_color', '#ffffff') ) . ";
	}
	#zaser-progression-header-top .sf-menu ul {
		background:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_bg', '#282828') ) . ";
	}
	.progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a, #zaser-progression-header-top .sf-menu li.sfHover li a, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li a, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li a, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li a, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_color', '#b4b4b4') ) . "; }
	.progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_light_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li li a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li li li li li a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, .progression_studios_force_dark_top_header_color #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #zaser-progression-header-top .sf-menu li.sfHover li a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover a, #zaser-progression-header-top .sf-menu li.sfHover li li a:hover, #zaser-progression-header-top  .sf-menu li.sfHover li.sfHover li.sfHover a, #zaser-progression-header-top .sf-menu li.sfHover li li li a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a, #zaser-progression-header-top .sf-menu li.sfHover li li li li a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a, #zaser-progression-header-top .sf-menu li.sfHover li li li li li a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a:hover, #zaser-progression-header-top .sf-menu li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover li.sfHover a {
		color:" . esc_attr( get_theme_mod('progression_studios_top_header_sub_hover_color', '#898f6a') ) . ";
	}
	#zaser-progression-header-top { background: " . esc_attr( get_theme_mod('progression_studios_top_header_background', '#282828') ) . "; }
	/* END Top Header Top Styles */
	/* START FOOTER STYLES */
	$progression_studios_foter_divider_clr
	footer#site-footer {
		background: " . esc_attr(get_theme_mod('progression_studios_footer_background', '#292935')) . ";
		$progression_studios_footer_bg_image
		$progression_studios_main_image_position_cover
	}
	#pro-scroll-top:hover {   color: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_color', '#ffffff')) . ";    background: " . esc_attr(get_theme_mod('progression_studios_scroll_hvr_bg_color', '#4145ee')) . ";  }
	footer#site-footer #progression-studios-copyright a {  color: " . esc_attr(get_theme_mod('progression_studios_copyright_link', '#ffffff')) . ";}
	footer#site-footer #progression-studios-copyright a:hover { color: " . esc_attr(get_theme_mod('progression_studios_copyright_link_hover', '#ffffff')) . "; }
	#progression-studios-copyright { background: " . esc_attr(get_theme_mod('progression_studios_copyright_bg', '#292935')) . "; }
	#pro-scroll-top { $progression_studios_scroll_top_disable color:" . esc_attr(get_theme_mod('progression_studios_scroll_color', '#ffffff')) . ";  background: " . esc_attr(get_theme_mod('progression_studios_scroll_bg_color', '#888888')) . ";  }
	#progression-studios-lower-widget-container .widget, #widget-area-progression .widget { padding:" . esc_attr(get_theme_mod('progression_studios_widgets_margin_top', '115')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_widgets_margin_bottom', '70')) . "px 0px; }
	#copyright-text { padding:" . esc_attr(get_theme_mod('progression_studios_copyright_margin_top', '38')) . "px 0px " . esc_attr(get_theme_mod('progression_studios_copyright_margin_bottom', '34')) . "px 0px; }
	footer#site-footer .progression-studios-social-icons {
		padding-top:" . esc_attr(get_theme_mod('progression_studios_footer_margin_top', '39')) . "px;
		padding-bottom:" . esc_attr(get_theme_mod('progression_studios_footer_margin_bottom', '28')) . "px;
	}
	footer#site-footer #progression-studios-copyright .progression-studios-social-icons a, footer#site-footer .progression-studios-social-icons a {
		color:" . esc_attr(get_theme_mod('progression_studios_footer_icon_color', '#bbbbbb')) . ";
	}
	footer#site-footer #progression-studios-copyright .progression-studios-social-icons a:hover, footer#site-footer .progression-studios-social-icons a:hover {
		color:" . esc_attr(get_theme_mod('progression_studios_footer_icon_hover_color', '#4145ee')) . ";
	}
	footer#site-footer .progression-studios-social-icons li a {
		padding-right:" . esc_attr(get_theme_mod('progression_studios_footer_margin_sides', '10')) . "px;
		padding-left:" . esc_attr(get_theme_mod('progression_studios_footer_margin_sides', '10')) . "px;
	}
	footer#site-footer .progression-studios-social-icons a, footer#site-footer #progression-studios-copyright .progression-studios-social-icons a {
		font-size:" . esc_attr(get_theme_mod('progression_studios_footer_icon_size', '20')) . "px;
	}
	#progression-studios-footer-logo { max-width:" . esc_attr( get_theme_mod('progression_studios_footer_logo_width', '200') ) . "px; padding-top:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_top', '0') ) . "px; padding-bottom:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_bottom', '0') ) . "px; padding-right:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_right', '0') ) . "px; padding-left:" . esc_attr( get_theme_mod('progression_studios_footer_logo_margin_left', '0') ) . "px; }
	/* END FOOTER STYLES */
	$progression_studios_transparent_header_border
	@media only screen and (max-width: 959px) { 
		#post-secondary-page-title-pro, #page-title-pro {
			padding-top:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_top', '170') - 50 ). "px;
			padding-bottom:" . esc_attr( get_theme_mod('progression_studios_page_title_padding_bottom', '170') - 50 ). "px;
		}
		.progression-studios-transparent-header header#masthead-pro {
			background-color:". esc_attr( get_theme_mod('progression_studios_header_background_color', '#ffffff') ). ";
			$progression_studios_header_bg_image
			$progression_studios_header_bg_cover
		}
		$progression_studios_mobile_header_bg_color
		$progression_studios_mobile_header_logo_width
		$progression_studios_mobile_header_logo_margin_top
		$progression_studios_mobile_header_nav_padding_top
	}
	@media only screen and (min-width: 960px) and (max-width: ". esc_attr( get_theme_mod('progression_studios_site_width', '1200') + 100 ) . "px) {
		.width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		.progression-studios-header-full-width-no-gap #zaser-progression-header-top .width-container-pro,
		footer#site-footer.progression-studios-footer-full-width .width-container-pro,
		.progression-studios-page-title-full-width #page-title-pro .width-container-pro,
		.progression-studios-header-full-width #zaser-progression-header-top .width-container-pro,
		.progression-studios-header-full-width header#masthead-pro .width-container-pro {
			width:94%; 
			position:relative;
			padding:0px;
		}
		#zaser-progression-header-top .sf-mega,
		header .sf-mega {
			margin-right:2%;
			width:98%; 
			left:0px;
			margin-left:auto;
		}
	}
	.progression-studios-spinner { border-left-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-right-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). "; border-bottom-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_secondary_color', '#ededed')). ";  border-top-color: " . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; }
	.sk-folding-cube .sk-cube:before, .sk-circle .sk-child:before, .sk-rotating-plane, .sk-double-bounce .sk-child, .sk-wave .sk-rect, .sk-wandering-cubes .sk-cube, .sk-spinner-pulse, .sk-chasing-dots .sk-child, .sk-three-bounce .sk-child, .sk-fading-circle .sk-circle:before, .sk-cube-grid .sk-cube{ 
		background-color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). ";
	}
	#page-loader-pro {
		background:" . esc_attr(get_theme_mod('progression_studios_page_loader_bg', '#ffffff')). ";
		color:" . esc_attr(get_theme_mod('progression_studios_page_loader_text', '#cccccc')). "; 
	}
	$progression_studios_boxed_layout
	::-moz-selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#4145ee') ) . ";}
	::selection {color:" . esc_attr( get_theme_mod('progression_studios_select_color', '#ffffff') ) . ";background:" . esc_attr( get_theme_mod('progression_studios_select_bg', '#4145ee') ) . ";}
	";
        wp_add_inline_style( 'progression-studios-custom-style', $progression_studios_custom_css );
}
add_action( 'wp_enqueue_scripts', 'progression_studios_customizer_styles' );