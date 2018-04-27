<?php
/**
 * TS Photography Theme Customizer
 *
 * @package ts-photography
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function ts_photography_customize_register( $wp_customize ) {	

	//add home page setting pannel
	$wp_customize->add_panel( 'ts_photography_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'ts-photography' ),
	    'description' => __( 'Description of what this panel does.', 'ts-photography' ),
	) );

	//Layouts
	$wp_customize->add_section( 'ts_photography_left_right', array(
    	'title'      => __( 'Layout Settings', 'ts-photography' ),
		'priority'   => 30,
		'panel' => 'ts_photography_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('ts_photography_layout_options',array(
	        'default' => __('Right Sidebar','ts-photography'),
	        'sanitize_callback' => 'ts_photography_sanitize_choices'	        
	    )
    );

	$wp_customize->add_control('ts_photography_layout_options',
	    array(
	        'type' => 'radio',
	        'label' => __('Change Layouts','ts-photography'),
	        'section' => 'ts_photography_left_right',
	        'choices' => array(
	            'Left Sidebar' => __('Left Sidebar','ts-photography'),
	            'Right Sidebar' => __('Right Sidebar','ts-photography'),
	            'One Column' => __('One Column','ts-photography'),
	            'Three Columns' => __('Three Columns','ts-photography'),
	            'Four Columns' => __('Four Columns','ts-photography'),
	            'Grid Layout' => __('Grid Layout','ts-photography')
	        ),
	) );

	//Social Icons(topbar)
	$wp_customize->add_section('ts_photography_topbar_header',array(
		'title'	=> __('Social Icon Section','ts-photography'),
		'description'	=> __('Add Header Content here','ts-photography'),
		'priority'	=> null,
		'panel' => 'ts_photography_panel_id',
	) );

	$wp_customize->add_setting('ts_photography_youtube_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_youtube_url',array(
		'label'	=> __('Add Youtube link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_youtube_url',
		'type'		=> 'url'
	) );

	$wp_customize->add_setting('ts_photography_facebook_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_facebook_url',array(
		'label'	=> __('Add Facebook link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_facebook_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_photography_twitter_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_twitter_url',array(
		'label'	=> __('Add Twitter link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_twitter_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_photography_rss_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_rss_url',array(
		'label'	=> __('Add RSS link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_rss_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_photography_insta_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_insta_url',array(
		'label'	=> __('Add Instagram link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_insta_url',
		'type'	=> 'url'
	) );

	$wp_customize->add_setting('ts_photography_pint_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	) );
	
	$wp_customize->add_control('ts_photography_pint_url',array(
		'label'	=> __('Add Pintrest link','ts-photography'),
		'section'	=> 'ts_photography_topbar_header',
		'setting'	=> 'ts_photography_pint_url',
		'type'	=> 'url'
	) );	

	//home page slider
	$wp_customize->add_section( 'ts_photography_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'ts-photography' ),
		'priority'   => 30,
		'panel' => 'ts_photography_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {

		// Add color scheme setting and control.
		$wp_customize->add_setting( 'ts_photography_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'absint'
		) );

		$wp_customize->add_control( 'ts_photography_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'ts-photography' ),
			'section'  => 'ts_photography_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Photography section
  	$wp_customize->add_section('ts_photography_photo_section',array(
	    'title' => __('Photography Section','ts-photography'),
	    'description' => '',
	    'priority'  => null,
	    'panel' => 'ts_photography_panel_id',
	));  
 
	$categories = get_categories();
	$cats = array();
	$i = 0;
  	foreach($categories as $category){
  	if($i==0){
	$default = $category->slug;
	$i++;
	}
	$cats[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('ts_photography_category',array(
	    'default' => 'select',
	    'sanitize_callback' => 'sanitize_text_field',
  	));

  	$wp_customize->add_control('ts_photography_category',array(
	    'type'    => 'select',
	    'choices' => $cats,
	    'label' => __('Select Category to display Latest Post','ts-photography'),
	    'section' => 'ts_photography_photo_section',
	));

	//footer
	$wp_customize->add_section('ts_photography_footer_section',array(
		'title'	=> __('Footer Text','ts-photography'),
		'description'	=> __('Add some text for footer like copyright etc.','ts-photography'),
		'priority'	=> null,
		'panel' => 'ts_photography_panel_id',
	));
	
	$wp_customize->add_setting('ts_photography_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	
	$wp_customize->add_control('ts_photography_footer_copy',array(
		'label'	=> __('Copyright Text','ts-photography'),
		'section'	=> 'ts_photography_footer_section',
		'type'		=> 'text'
	));
}
add_action( 'customize_register', 'ts_photography_customize_register' );	


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class ts_photography_customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'ts_photography_customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new ts_photography_customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'	=> 9,
					'title'    => esc_html__( 'Photography Pro', 'ts-photography' ),
					'pro_text' => esc_html__( 'Go Pro',         'ts-photography' ),
					'pro_url'  => 'https://www.themeshopy.com/themes/premium-photography-wordPress-theme/'
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'ts-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'ts-photography-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
ts_photography_customize::get_instance();