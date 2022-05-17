<?php
namespace ImageHoverEffect;


use ImageHoverEffect\Widgets\Image_Hovor_Effect;

/**
 * Class Plugin
 *
 * Main Plugin class
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 * @access private
	 * @static
	 *
	 * @var Plugin The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return Plugin An instance of the class.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * widget_scripts
	 *
	 * Load required plugin's core files.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function widget_scripts() {

		wp_register_script( 'ihe-snap.svg-min', plugins_url( '/assets/js/snap.svg-min.js', __DIR__ ), [ 'jquery' ], false, true );
		wp_register_script( 'ihe-hover', plugins_url( '/assets/js/hovers.js', __DIR__ ), [  ], false, true );

		// wp_enqueue_script( 'ihe-snap.svg-min' );
		// wp_enqueue_script( 'ihe-hover' );
	}

	/**
	 * Register Widgets
	 *
	 * Register new Elementor widgets.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param Widgets_Manager $widgets_manager Elementor widgets manager.
	 */
	public function register_widgets( $widgets_manager ) {
		// Register Widgets
		$widgets_manager->register( new Widgets\Image_Hovor_Effect() );

	}


	/**
	 *  Plugin class constructor
	 *
	 * Register plugin action hooks and filters
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {

		// Register widget scripts
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'widget_scripts' ] );
		// add_action( 'wp_enqueue_scripts', [ $this, 'widget_scripts' ] );
		// add_action( 'elementor/frontend/enqueue_scripts', [ $this, 'widget_scripts' ] );

		
		// Register widgets
		add_action( 'elementor/widgets/register', [ $this, 'register_widgets' ] );

	}
}


