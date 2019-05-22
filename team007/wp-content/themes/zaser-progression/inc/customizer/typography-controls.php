<?php
/**
 * progression Theme Customizer
 *
 * @package progression
 */

function progression_studios_add_tab_to_panel( $tabs ) {
	
   $tabs['progression-studios-navigation-font'] = array(
       'name'        => 'progression-studios-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Navigation', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-sub-navigation-font'] = array(
       'name'        => 'progression-studios-sub-navigation-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Sub-Navigation', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-top-header-font'] = array(
       'name'        => 'progression-studios-top-header-font',
       'panel'       => 'progression_studios_header_panel',
       'title'       => esc_html__('Top Header Options', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-body-font'] = array(
       'name'        => 'progression-studios-body-font',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Body Main', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
   $tabs['progression-studios-page-title'] = array(
       'name'        => 'progression-studios-page-title',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Page Title', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-widgets-font'] = array(
       'name'        => 'progression-studios-widgets-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Main', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-copyright-font'] = array(
       'name'        => 'progression-studios-copyright-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Copyright Text', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

   $tabs['progression-studios-footer-nav-font'] = array(
       'name'        => 'progression-studios-footer-nav-font',
       'panel'       => 'progression_studios_footer_panel',
       'title'       => esc_html__('Footer Navigation', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
	
   $tabs['progression-studios-default-headings'] = array(
       'name'        => 'progression-studios-default-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('H1-H6 Headings', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
  
	
   $tabs['progression-studios-sidebar-headings'] = array(
       'name'        => 'progression-studios-sidebar-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Sidebar Options', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-button-typography'] = array(
       'name'        => 'progression-studios-button-typography',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Button Styles', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	

	
   $tabs['progression-studios-blog-headings'] = array(
       'name'        => 'progression-studios-blog-headings',
       'panel'       => 'progression_studios_body_panel',
       'title'       => esc_html__('Blog Typography', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
	
	
   $tabs['progression-studios-shop-headings'] = array(
       'name'        => 'progression-studios-shop-headings',
       'panel'       => 'progression_studios_shop_panel',
       'title'       => esc_html__('Shop Typography', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );

	
	
	
   $tabs['progression-studios-portfolio-typography'] = array(
       'name'        => 'progression-studios-portfolio-typography',
       'panel'       => 'progression_studios_portfolio_panel',
       'title'       => esc_html__('Portfolio Typography', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   $tabs['progression-studios-portfolio-options'] = array(
       'name'        => 'progression-studios-portfolio-options',
       'panel'       => 'progression_studios_portfolio_panel',
       'title'       => esc_html__('Portfolio Index', 'zaser-progression'),
       'description' => '',
       'sections'    => array(),
   );
	
   
	
	
	
    // Return the tabs.
    return $tabs;
}
add_filter( 'tt_font_get_settings_page_tabs', 'progression_studios_add_tab_to_panel' );

/**
 * How to add a font control to your tab
 *
 * @see  parse_font_control_array() - in class EGF_Register_Options
 *       in includes/class-egf-register-options.php to see the full
 *       properties you can add for each font control.
 *
 *
 * @param   array $controls - Existing Controls.
 * @return  array $controls - Controls with controls added/removed.
 *
 * @since 1.0
 * @version 1.0
 *
 */
function progression_studios_add_control_to_tab( $controls ) {

    /**
     * 1. Removing default styles because we add-in our own
     */
    unset( $controls['tt_default_body'] );
    unset( $controls['tt_default_heading_1'] );
    unset( $controls['tt_default_heading_2'] );
    unset( $controls['tt_default_heading_3'] );
    unset( $controls['tt_default_heading_4'] );
    unset( $controls['tt_default_heading_5'] );
    unset( $controls['tt_default_heading_6'] );
	 
	 
    /**
     * 2. Now custom examples that are theme specific
     */
	 
	 
    $controls['progression_studios_body_font_family'] = array(
        'name'       => 'progression_studios_body_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Body Font', 'zaser-progression'),
        'tab'        => 'progression-studios-body-font',
        'properties' => array( 'selector'   => 'body,  body input, body textarea' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'open_sans',
 			'font_name'                  => 'Open Sans',
 			'font_weight_style'          => 'regular',
 			'font_color'                 => '#888888',
 			'line_height'                => '1.8',
 			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' )
 		),
    );
	 
	 
    $controls['progression_studios_nav_font_family'] = array(
        'name'       => 'progression_studios_nav_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Navigation Font Family', 'zaser-progression'),
        'tab'        => 'progression-studios-navigation-font',
        'properties' => array( 'selector'   => 'h2.mega-menu-heading, nav#site-navigation, #progression-checkout-basket .progression-sub-total' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'poppins',
 			'font_name'                  => 'Poppins',
 			'font_weight_style'          => '500',
 		),
    );
	 
    $controls['progression_studios_top_header_default'] = array(
        'name'       => 'progression_studios_top_header_default',
 	'type'        => 'font',
        'title'      =>  esc_html__('Top Header Font Family', 'zaser-progression'),
        'tab'        => 'progression-studios-top-header-font',
        'properties' => array( 'selector'   => '#zaser-progression-header-top' ),
 	'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_sub_nav_megamenu'] = array(
        'name'       => 'progression_studios_sub_nav_megamenu',
 	'type'        => 'font',
        'title'      =>  esc_html__('Mega Menu Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => '.sf-mega h2.mega-menu-heading, body #progression-sticky-header header .sf-mega h2.mega-menu-heading a, body header .sf-mega h2.mega-menu-heading a' ),
 	'default' => array(
 			'subset'                     => 'latin',
			'font_color'                 => '#ffffff',
 			'font_id'                    => 'poppins',
 			'font_name'                  => 'Poppins',
			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
 		),
    );
	 
    $controls['progression_studios_sub_nav_font_family'] = array(
        'name'       => 'progression_studios_sub_nav_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Sub-Navigation Font Family', 'zaser-progression'),
        'tab'        => 'progression-studios-sub-navigation-font',
        'properties' => array( 'selector'   => '#panel-search-progression .search-form input.search-field, #progression-checkout-basket, #panel-search-progression, .sf-menu ul' ),
 	'default' => array(
 			'subset'                     => 'latin',
 			'font_id'                    => 'open_sans',
 			'font_name'                  => 'Open Sans',
 			'font_weight_style'          => '400',
 		),
    );
	 
	 
	 
    $controls['progression_studios_widget_font_family'] = array(
        'name'       => 'progression_studios_widget_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Main Font', 'zaser-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_widget_font_link'] = array(
        'name'       => 'progression_studios_widget_font_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link', 'zaser-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	
    $controls['progression_studios_widget_font_link_hover'] = array(
        'name'       => 'progression_studios_widget_font_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Link Hover', 'zaser-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_copyright_font_family'] = array(
        'name'       => 'progression_studios_copyright_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Copyright Font', 'zaser-progression'),
        'tab'        => 'progression-studios-copyright-font',
        'properties' => array( 'selector'   => '#copyright-text' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
    $controls['progression_studios_footer_nav_link'] = array(
        'name'       => 'progression_studios_footer_nav_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation', 'zaser-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer #progression-studios-copyright ul.progression-studios-footer-nav-container-class a, footer#site-footer ul.progression-studios-footer-nav-container-class a' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '13', 'unit' => 'px' )
 		),
    );
	
    $controls['progression_studios_footer_nav_link_hover'] = array(
        'name'       => 'progression_studios_footer_nav_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Navigation Hover', 'zaser-progression'),
        'tab'        => 'progression-studios-footer-nav-font',
        'properties' => array( 'selector'   => 'footer#site-footer #progression-studios-copyright ul.progression-studios-footer-nav-container-class li.current-menu-item a, footer#site-footer  #progression-studios-copyright ul.progression-studios-footer-nav-container-class a:hover, footer#site-footer ul.progression-studios-footer-nav-container-class li.current-menu-item a, footer#site-footer ul.progression-studios-footer-nav-container-class a:hover' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 		),
    );
	 
	 
	 
	 
    $controls['progression_studios_widget_font_heading'] = array(
        'name'       => 'progression_studios_widget_font_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Footer Widget Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-widgets-font',
        'properties' => array( 'selector'   => 'footer#site-footer h4.widget-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' )
 		),
    );
	 
	 
	 
	 
    $controls['progression_studios_page_title_font_family'] = array(
        'name'       => 'progression_studios_page_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Title Font', 'zaser-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h1' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_color'                 => '#ffffff',
 		),
    );
	 
	 
	 
    $controls['progression_studios_page_sub_title_font_family'] = array(
        'name'       => 'progression_studios_page_sub_title_font_family',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Page Sub-Title Font', 'zaser-progression'),
        'tab'        => 'progression-studios-page-title',
        'properties' => array( 'selector'   => '#page-title-pro h4' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_color'                 => '#dddddd',
 		),
    );
	 

	 
    $controls['progression_studios_blog_index_heading'] = array(
        'name'       => 'progression_studios_blog_index_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => 'h2.progression-blog-title' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
 		),
    );
	 
    $controls['progression_studios_blog_index_date'] = array(
        'name'       => 'progression_studios_blog_index_date',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Date', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progresion-meta-date' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '14', 'unit' => 'px' ),
 		),
    );
	 
	 
	 
    $controls['progression_studios_blog_index_meta'] = array(
        'name'       => 'progression_studios_blog_index_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Index Meta', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-author-meta' ),
 		 'default' => array(
 			'subset'                     => 'latin',
 			'font_size'                  => array( 'amount' => '14', 'unit' => 'px' ),
 		),
    );
	 
	 
	 
	 
	 $controls['progression_studios_blog_single_heading'] = array(
        'name'       => 'progression_studios_blog_single_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Post Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-single-container h1.progression-blog-title' ),
  		 'default' => array(
  			'subset'                     => 'latin',
  			'font_size'                  => array( 'amount' => '24', 'unit' => 'px' ),
  		),
    );
    
	 
	 $controls['progression_studios_blog_single_meta'] = array(
        'name'       => 'progression_studios_blog_single_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Post Meta', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '.progression-single-container .progression-single-meta' ),
  		 'default' => array(
  			'subset'                     => 'latin',
  			'font_size'                  => array( 'amount' => '14', 'unit' => 'px' ),
  		),
    );
	 
	 
	 $controls['progression_studios_blog_single_secondary_heading'] = array(
        'name'       => 'progression_studios_blog_single_secondary_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Secondary Post Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '#post-secondary-page-title-pro h1.secondary-progression-blog-title' ),
  		 'default' => array(
  			'subset'                     => 'latin',
  		),
    );
    
	 
	 $controls['progression_studios_blog__secondary_date'] = array(
        'name'       => 'progression_studios_blog__secondary_date',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Secondary Post Date', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '#post-secondary-page-title-pro .secondary-progresion-meta-date' ),
  		 'default' => array(
  			'subset'                     => 'latin',
  		),
    );
	 
	 $controls['progression_studios_blog__secondary_single_meta'] = array(
        'name'       => 'progression_studios_blog__secondary_single_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Blog Secondary Post Meta', 'zaser-progression'),
        'tab'        => 'progression-studios-blog-headings',
        'properties' => array( 'selector'   => '#post-secondary-page-title-pro .seconary-progression-single-meta' ),
  		 'default' => array(
  			'subset'                     => 'latin',
  		),
    );
	 
	 
    $controls['progression_studios_portfolio_index_heading'] = array(
        'name'       => 'progression_studios_portfolio_index_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Overlay Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => '.progression-portfolio-content-position h2.progression-portfolio-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 			),
    );
	 
    $controls['progression_studios_portfolio_index_category'] = array(
        'name'       => 'progression_studios_portfolio_index_category',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Overlay Category', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => '.progression-portfolio-content-position ul.portfolio-tax-progression' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_portfolio_index_secondary_heading'] = array(
        'name'       => 'progression_studios_portfolio_index_secondary_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Content Layout Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => 'h2.progression-portfolio-secondary-title a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 			),
    );
	 
    $controls['progression_studios_portfolio_index_secondary_category'] = array(
        'name'       => 'progression_studios_portfolio_index_secondary_category',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Content Layout Category', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => 'ul.portfolio-secondary-tax-progression' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
	 
	 
    $controls['progression_studios_portfolio_post_heading'] = array(
        'name'       => 'progression_studios_portfolio_post_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Post Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => 'h1.progression-portfolio-single-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_portfolio_post_meta'] = array(
        'name'       => 'progression_studios_portfolio_post_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Post Meta', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => '#portfolio-single-sharing-container, #portfolio-single-date, #portfolio-category-meta-single' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_portfolio_post_secondary_heading'] = array(
        'name'       => 'progression_studios_portfolio_post_secondary_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Secondary Post Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => '#post-secondary-page-title-pro h1.portfolio-secondary-single-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_portfolio_secondary_post_meta'] = array(
        'name'       => 'progression_studios_portfolio_secondary_post_meta',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Portfolio Secondary Post Meta Font', 'zaser-progression'),
        'tab'        => 'progression-studios-portfolio-typography',
        'properties' => array( 'selector'   => '#post-secondary-page-title-pro .portfolio-single-secondary-date, post-secondary-page-title-pro ul.portfolio-secondary-single-meta' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_shop_index_heading'] = array(
        'name'       => 'progression_studios_shop_index_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products li.product h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
 			),
    );
	 
    $controls['progression_studios_shop_index_heading_hover'] = array(
        'name'       => 'progression_studios_shop_index_heading_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Heading Hover', 'zaser-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products li.product a:hover h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_shop_index_price'] = array(
        'name'       => 'progression_studios_shop_index_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Index Price', 'zaser-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => '#boxed-layout-pro ul.products li.product span.price span.amount' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_shop_post_heading'] = array(
        'name'       => 'progression_studios_shop_post_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => 'body #content-pro .woocommerce-shop-single h1.product_title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_shop_post_price'] = array(
        'name'       => 'progression_studios_shop_post_price',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Shop Post Price', 'zaser-progression'),
        'tab'        => 'progression-studios-shop-headings',
        'properties' => array( 'selector'   => 'body .woocommerce-shop-single .summary p.price' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    
	 
    $controls['progression_studios_heading_h1'] = array(
        'name'       => 'progression_studios_heading_h1',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 1', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h1' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '25', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h2'] = array(
        'name'       => 'progression_studios_heading_h2',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 2', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h2' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '22', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h3'] = array(
        'name'       => 'progression_studios_heading_h3',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 3', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h3' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '20', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h4'] = array(
        'name'       => 'progression_studios_heading_h4',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 4', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h4' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '18', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h5'] = array(
        'name'       => 'progression_studios_heading_h5',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 5', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h5' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '17', 'unit' => 'px' ),
 			),
    );
	
    $controls['progression_studios_heading_h6'] = array(
        'name'       => 'progression_studios_heading_h6',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Heading 6', 'zaser-progression'),
        'tab'        => 'progression-studios-default-headings',
        'properties' => array( 'selector'   => 'h6' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '15', 'unit' => 'px' ),
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_default'] = array(
        'name'       => 'progression_studios_sidebar_default',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Text', 'zaser-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_size'                  => array( 'amount' => '14', 'unit' => 'px' ),
 			),
    );
	 
    $controls['progression_studios_sidebar_heading'] = array(
        'name'       => 'progression_studios_sidebar_heading',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Heading', 'zaser-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar h4.widget-title' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
	 
    $controls['progression_studios_sidebar_link'] = array(
        'name'       => 'progression_studios_sidebar_link',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Default Link', 'zaser-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a, .widget ul.product_list_widget li a:hover span.product-title, .widget ul.product_list_widget li a:hover' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 			),
    );
	 
    $controls['progression_studios_sidebar_link_hover'] = array(
        'name'       => 'progression_studios_sidebar_link_hover',
 		 'type'        => 'font',
        'title'      =>  esc_html__('Sidebar Link Hover', 'zaser-progression'),
        'tab'        => 'progression-studios-sidebar-headings',
        'properties' => array( 'selector'   => '.sidebar a:hover, .widget ul.product_list_widget li a:hover span.product-title, .widget ul.product_list_widget li a:hover, .widget ul li.current-cat a' ),
 		 'default' => array(
 	 			'subset'                     => 'latin',
 	 			'text_decoration'            => 'none',
 	 			'font_color'                 => '#000000',
 			),
    );
	 
	 
	 
	 
    $controls['progression_studios_button_font_family'] = array(
        'name'       => 'progression_studios_button_font_family',
 	'type'        => 'font',
        'title'      =>  esc_html__('Button Font Family', 'zaser-progression'),
        'tab'        => 'progression-studios-button-typography',
        'properties' => array( 'selector'   => '.tribe-events-back a, a.tribe-events-read-more, body #content-pro .tribe-events-venue-details, body #content-pro .tribe-event-schedule-details, body #content-pro .tribe-events-loop .tribe-events-list-separator-month, body #content-pro a.tribe-events-button, body #content-pro .width-container-pro table.tribe-events-calendar thead, body #content-pro .width-container-pro input.tribe-events-button, a.progression-button, ul.filter-button-group, #progression-checkout-basket a.cart-button-header-cart, #infinite-nav-pro a, #content-pro ul.page-numbers li span.current, #content-pro ul.page-numbers li a, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.added_to_cart, #boxed-layout-pro ul.products li.product  .progression-studios-store-product-image-container .progression-studios-shop-overlay-buttons a.button, .woocommerce-shop-single span.progression-studios-new-banner, .progression-studios-store-product-image-container span.progression-studios-new-banner, body .woocommerce-shop-single span.onsale, #boxed-layout-pro ul.products li.product span.onsale, .progression-single-portfolio-container .post-password-form input, .post-password-form input, .input-text, .woocommerce-FormRow input.woocommerce-Input, .comment-respond input, .comment-respond textarea, .wpcf7-form input, .wpcf7-form textarea, .post-password-form label, .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount span.to, .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount span.from, .widget.widget_price_filter form .price_slider_wrapper .price_slider_amount button.button, .widget .widget_shopping_cart_content p.buttons a.button.wc-forward, .progression-page-nav, #content-pro ul.page-numbers li span.current, #content-pro ul.page-numbers li a, footer#site-footer .widget .tagcloud a, .widget .tagcloud a, body #content-pro .woocommerce p.return-to-shop a.button,
.woocommerce-shop-single .summary button.button, body .checkout .woocommerce-checkout-payment input.button, .cart_totals  .wc-proceed-to-checkout a.checkout-button, .woocommerce-tabs #review_form .comment-respond input#submit, .comment-respond input#submit, input.wpcf7-submit, .comment-navigation a, #content-pro .woocommerce table.shop_table input.button, body #content-pro .woocommerce p.return-to-shop a.button, .woocommerce-MyAccount-content input.button, .woocommerce form.checkout_coupon input.button, .woocommerce form.login input.button, .woocommerce form.woocommerce-ResetPassword input.button, .woocommerce #customer_login form.login input.button, .woocommerce #customer_login form.register input.button, #content-pro ul.products li.product a.button' ),
 	'default' => array(
		'subset'                     => 'latin',
		'text_decoration'            => 'none',
 		),
    );
	 
 
	// Return the controls.
    return $controls;
}
add_filter( 'tt_font_get_option_parameters', 'progression_studios_add_control_to_tab' );