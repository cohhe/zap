<?php
/**
 * Zap 1.0 Theme Customizer support
 *
 * @package WordPress
 * @subpackage Zap
 * @since Zap 1.0
 */

/**
 * Implement Theme Customizer additions and adjustments.
 *
 * @since Zap 1.0
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function zap_customize_register( $wp_customize ) {
	// Add custom description to Colors and Background sections.
	$wp_customize->get_section( 'colors' )->description           = __( 'Background may only be visible on wide screens.', 'zap' );
	$wp_customize->get_section( 'background_image' )->description = __( 'Background may only be visible on wide screens.', 'zap' );

	// Add postMessage support for site title and description.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	// Rename the label to "Site Title Color" because this only affects the site title in this theme.
	$wp_customize->get_control( 'header_textcolor' )->label = __( 'Site Title Color', 'zap' );

	// Rename the label to "Display Site Title & Tagline" in order to make this option extra clear.
	$wp_customize->get_control( 'display_header_text' )->label = __( 'Display Site Title &amp; Tagline', 'zap' );

	// Add General setting panel and configure settings inside it
	$wp_customize->add_panel( 'zap_general_panel', array(
		'priority'       => 250,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'General settings' , 'zap'),
		'description'    => __( 'You can configure your general theme settings here' , 'zap')
	) );

	// Add Header setting panel and configure settings inside it
	$wp_customize->add_panel( 'zap_header_panel', array(
		'priority'       => 250,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Header settings' , 'zap'),
		'description'    => __( 'You can configure your theme header settings here.' , 'zap')
	) );

	// Website logo
	$wp_customize->add_section( 'zap_general_logo', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Website logo' , 'zap'),
		'description'    => __( 'Please upload your logo, recommended logo size should be between 262x80' , 'zap'),
		'panel'          => 'zap_general_panel'
	) );

	$wp_customize->add_setting( 'zap_logo', array( 'sanitize_callback' => 'esc_url_raw' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zap_logo', array(
		'label'    => __( 'Website logo', 'zap' ),
		'section'  => 'zap_general_logo',
		'settings' => 'zap_logo',
	) ) );

	// Website footer logo
	$wp_customize->add_section( 'zap_general_footerlogo', array(
		'priority'       => 10,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Website footer logo' , 'zap'),
		'description'    => __( 'Please upload your footer logo, recommended logo size should be between 262x80' , 'zap'),
		'panel'          => 'zap_general_panel'
	) );

	$wp_customize->add_setting( 'zap_footerlogo', array( 'sanitize_callback' => 'esc_url_raw' ) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'zap_footerlogo', array(
		'label'    => __( 'Website footer logo', 'zap' ),
		'section'  => 'zap_general_footerlogo',
		'settings' => 'zap_footerlogo',
	) ) );

	// Copyright
	$wp_customize->add_section( 'zap_general_copyright', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Copyright' , 'zap'),
		'description'    => __( 'Please provide short copyright text which will be shown in footer.' , 'zap'),
		'panel'          => 'zap_general_panel'
	) );

	$wp_customize->add_setting( 'zap_copyright', array( 'sanitize_callback' => 'sanitize_text_field', 'default' => 'Copyright &copy; 2015 Zap' ) );

	$wp_customize->add_control(
		'zap_copyright',
		array(
			'label'      => 'Copyright',
			'section'    => 'zap_general_copyright',
			'type'       => 'text',
		)
	);

	// Scroll to top
	$wp_customize->add_section( 'zap_general_scrolltotop', array(
		'priority'       => 30,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Scroll to top' , 'zap'),
		'description'    => __( 'Do you want to enable "Scroll to Top" button?' , 'zap'),
		'panel'          => 'zap_general_panel'
	) );

	$wp_customize->add_setting( 'zap_scrolltotop', array( 'sanitize_callback' => 'zap_sanitize_checkbox' ) );

	$wp_customize->add_control(
		'zap_scrolltotop',
		array(
			'label'      => 'Scroll to top',
			'section'    => 'zap_general_scrolltotop',
			'type'       => 'checkbox',
		)
	);

	// Page layout
	$wp_customize->add_section( 'zap_general_layout', array(
		'priority'       => 50,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Layout' , 'zap'),
		'description'    => __( 'Choose a layout for your theme pages. Note that a widget has to be inside widget are, or the layout won\'t change.' , 'zap'),
		'panel'          => 'zap_general_panel'
	) );

	$wp_customize->add_setting(
		'zap_layout',
		array(
			'default'           => 'full',
			'sanitize_callback' => 'sanitize_text_field'
		)
	);

	$wp_customize->add_control(
		'zap_layout',
		array(
			'type' => 'radio',
			'label' => 'Layout',
			'section' => 'zap_general_layout',
			'choices' => array(
				'full' => 'Full',
				'right' => 'Right'
			)
		)
	);

	// Header email
	$wp_customize->add_section( 'zap_header_email', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Email' , 'zap'),
		'description'    => __( 'An email address for your theme header.' , 'zap'),
		'panel'          => 'zap_header_panel'
	) );

	$wp_customize->add_setting( 'zap_headeremail', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	$wp_customize->add_control(
		'zap_headeremail',
		array(
			'label'      => 'Email',
			'section'    => 'zap_header_email',
			'type'       => 'text',
		)
	);

	// Header phone
	$wp_customize->add_section( 'zap_header_phone', array(
		'priority'       => 20,
		'capability'     => 'edit_theme_options',
		'title'          => __( 'Phone' , 'zap'),
		'description'    => __( 'An Phone number for your theme header.' , 'zap'),
		'panel'          => 'zap_header_panel'
	) );

	$wp_customize->add_setting( 'zap_headerphone', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	$wp_customize->add_control(
		'zap_headerphone',
		array(
			'label'      => 'Phone',
			'section'    => 'zap_header_phone',
			'type'       => 'text',
		)
	);

	// Social links
	$wp_customize->add_section( new zap_Customized_Section( $wp_customize, 'zap_social_links', array(
		'priority'       => 300,
		'capability'     => 'edit_theme_options'
		) )
	);

	$wp_customize->add_setting( 'zap_fake_field', array( 'sanitize_callback' => 'sanitize_text_field' ) );

	$wp_customize->add_control(
		'zap_fake_field',
		array(
			'label'      => '',
			'section'    => 'zap_social_links',
			'type'       => 'text'
		)
	);
}
add_action( 'customize_register', 'zap_customize_register' );

if ( class_exists( 'WP_Customize_Section' ) && !class_exists( 'zap_Customized_Section' ) ) {
	class zap_Customized_Section extends WP_Customize_Section {
		public function render() {
			$classes = 'accordion-section control-section control-section-' . $this->type;
			?>
			<li id="accordion-section-<?php echo esc_attr( $this->id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
				<style type="text/css">
					.cohhe-social-profiles {
						padding: 14px;
					}
					.cohhe-social-profiles li:last-child {
						display: none !important;
					}
					.cohhe-social-profiles li i {
						width: 20px;
						height: 20px;
						display: inline-block;
						background-size: cover !important;
						margin-right: 5px;
						float: left;
					}
					.cohhe-social-profiles li i.twitter {
						background: url(<?php echo get_template_directory_uri().'/images/icons/twitter.png'; ?>);
					}
					.cohhe-social-profiles li i.facebook {
						background: url(<?php echo get_template_directory_uri().'/images/icons/facebook.png'; ?>);
					}
					.cohhe-social-profiles li i.googleplus {
						background: url(<?php echo get_template_directory_uri().'/images/icons/googleplus.png'; ?>);
					}
					.cohhe-social-profiles li i.cohhe_logo {
						background: url(<?php echo get_template_directory_uri().'/images/icons/cohhe.png'; ?>);
					}
					.cohhe-social-profiles li a {
						height: 20px;
						line-height: 20px;
					}
					#customize-theme-controls>ul>#accordion-section-zap_social_links {
						margin-top: 10px;
					}
					.cohhe-social-profiles li.documentation {
						text-align: right;
						margin-bottom: 60px;
					}
				</style>
				<ul class="cohhe-social-profiles">
					<li class="documentation"><a href="http://documentation.cohhe.com/zap" class="button button-primary button-hero" target="_blank"><?php _e( 'Documentation', 'zap' ); ?></a></li>
					<li class="social-twitter"><i class="twitter"></i><a href="https://twitter.com/Cohhe_Themes" target="_blank"><?php _e( 'Follow us on Twitter', 'zap' ); ?></a></li>
					<li class="social-facebook"><i class="facebook"></i><a href="https://www.facebook.com/cohhethemes" target="_blank"><?php _e( 'Join us on Facebook', 'zap' ); ?></a></li>
					<li class="social-googleplus"><i class="googleplus"></i><a href="https://plus.google.com/+Cohhe_Themes/posts" target="_blank"><?php _e( 'Join us on Google+', 'zap' ); ?></a></li>
					<li class="social-cohhe"><i class="cohhe_logo"></i><a href="http://cohhe.com/" target="_blank"><?php _e( 'Cohhe.com', 'zap' ); ?></a></li>
				</ul>
			</li>
			<?php
		}
	}
}

function zap_sanitize_checkbox( $input ) {
	// Boolean check 
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

/**
 * Sanitize the Featured Content layout value.
 *
 * @since Zap 1.0
 *
 * @param string $layout Layout type.
 * @return string Filtered layout type (grid|slider).
 */
function zap_sanitize_layout( $layout ) {
	if ( ! in_array( $layout, array( 'slider' ) ) ) {
		$layout = 'slider';
	}

	return $layout;
}

/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 *
 * @since Zap 1.0
 */
function zap_customize_preview_js() {
	wp_enqueue_script( 'zap_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20131205', true );
}
add_action( 'customize_preview_init', 'zap_customize_preview_js' );

/**
 * Add contextual help to the Themes and Post edit screens.
 *
 * @since Zap 1.0
 *
 * @return void
 */
function zap_contextual_help() {
	if ( 'admin_head-edit.php' === current_filter() && 'post' !== $GLOBALS['typenow'] ) {
		return;
	}

	get_current_screen()->add_help_tab( array(
		'id'      => 'zap',
		'title'   => __( 'Zap 1.0', 'zap' ),
		'content' =>
			'<ul>' .
				'<li>' . sprintf( __( 'The home page features your choice of up to 6 posts prominently displayed in a grid or slider, controlled by the <a href="%1$s">featured</a> tag; you can change the tag and layout in <a href="%2$s">Appearance &rarr; Customize</a>. If no posts match the tag, <a href="%3$s">sticky posts</a> will be displayed instead.', 'zap' ), admin_url( '/edit.php?tag=featured' ), admin_url( 'customize.php' ), admin_url( '/edit.php?show_sticky=1' ) ) . '</li>' .
				'<li>' . sprintf( __( 'Enhance your site design by using <a href="%s">Featured Images</a> for posts you&rsquo;d like to stand out (also known as post thumbnails). This allows you to associate an image with your post without inserting it. Zap 1.0 uses featured images for posts and pages&mdash;above the title&mdash;and in the Featured Content area on the home page.', 'zap' ), 'http://codex.wordpress.org/Post_Thumbnails#Setting_a_Post_Thumbnail' ) . '</li>' .
				'<li>' . sprintf( __( 'For an in-depth tutorial, and more tips and tricks, visit the <a href="%s">Zap 1.0 documentation</a>.', 'zap' ), 'http://codex.wordpress.org/Zap' ) . '</li>' .
			'</ul>',
	) );
}
add_action( 'admin_head-themes.php', 'zap_contextual_help' );
add_action( 'admin_head-edit.php',   'zap_contextual_help' );
