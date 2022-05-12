<?php
namespace ImageHoverEffect\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;
use Elementor\Utils;
use Elementor\Repeater;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Elementor Image Hover Effect
 *
 * Elementor widget for Image Hover Effect.
 *
 * @since 1.0.0
 */
class Demo_Three extends Widget_Base {

	/**
	 * Retrieve the widget name.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'image-hover-effect-three';
	}

	/**
	 * Retrieve the widget title.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Image Hover Effect 3', 'image-hover-effect' );
	}

	/**
	 * Retrieve the widget icon.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-ticker';
	}

	/**
	 * Retrieve the list of categories the widget belongs to.
	 *
	 * Used to determine where to display the widget in the editor.
	 *
	 * Note that currently Elementor supports only one category.
	 * When multiple categories passed, Elementor uses the first one.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_script_depends() {
		return [ 'image-hover-effect', 'ihe-snap.svg-min', 'ihe-hover' ];
	}

	/**
	 * Retrieve the list of scripts the widget depended on.
	 *
	 * Used to set scripts dependencies required to run the widget.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 *
	 * @return array Widget scripts dependencies.
	 */
	public function get_style_depends() {

		wp_register_style( 'ihe-normalize', plugins_url( '../assets/css/normalize.css', __DIR__ ), array(), '1.0.0', 'all' );
		wp_register_style( 'ihe-demo', plugins_url( '../assets/css/demo.css', __DIR__ ), array(), '1.0.0', 'all' );
		wp_register_style( 'ihe-component', plugins_url( '../assets/css/component.css', __DIR__ ), array(), '1.0.0', 'all' );

		return [ 'ihe-normalize', 'ihe-demo', 'ihe-component' ];
	}

	/**
	 * Register the widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function register_controls() {
		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'image-hover-effect' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$repeater = new Repeater();
        $repeater->add_control(
			'image',
			[
				'label' => __( 'Choose Image', 'image-hover-effect' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' =>  plugins_url( '../assets/img/1.png', __DIR__ ),
				],
			]
		);
		$repeater->add_control(
			'card_title',
			[
				'label' => __( 'Title', 'image-hover-effect' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'John Doe.', 'image-hover-effect' ),
				'placeholder' => __( 'Type your title here', 'image-hover-effect' ),
			]
		);
        
        $repeater->add_control(
			'card_description',
			[
				'label' => __( 'Description', 'image-hover-effect' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'He has appeared in more than 100 films and television shows', 'image-hover-effect' ),
				'placeholder' => __( 'Type your description here', 'image-hover-effect' ),
			]
		);
        
		$repeater->add_control(
			'url',
			[
				'label' => __( 'URL', 'image-hover-effect' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://twitter.com', 'image-hover-effect' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
				],
			]
		);
		
		$this->add_control(
			'material_card',
			[
				'label' => __( 'Cards List', 'image-hover-effect' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'card_title' => __( 'John Doe.', 'image-hover-effect' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows', 'image-hover-effect' ),
						'url' => plugins_url( '../assets/img/1.png', __DIR__ ),
					],
					[
						'card_title' => __( 'John Doe.', 'image-hover-effect' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows', 'image-hover-effect' ),
						'url' => plugins_url( '../assets/img/2.png', __DIR__ ),
					],
					[
						'card_title' => __( 'John Doe.', 'image-hover-effect' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows', 'image-hover-effect' ),
						'url' => plugins_url( '../assets/img/3.png', __DIR__ ),
					],
					[
						'card_title' => __( 'John Doe.', 'image-hover-effect' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows', 'image-hover-effect' ),
						'url' => plugins_url( '../assets/img/4.png', __DIR__ ),
					],
				],
				'title_field' => '{{{ card_title }}}',
			]
		);

		$this->end_controls_section();

		/**
		 * Heading style.
		 */
		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Heading', 'image-hover-effect' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'image-hover-effect' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'capitalize',
				'options' => [
					'' => __( 'None', 'image-hover-effect' ),
					'uppercase' => __( 'UPPERCASE', 'image-hover-effect' ),
					'lowercase' => __( 'lowercase', 'image-hover-effect' ),
					'capitalize' => __( 'Capitalize', 'image-hover-effect' ),
				],
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption h2' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'image-hover-effect' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption h2' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'heading_color',
			[
				'label' => __( 'Heading Color', 'image-hover-effect' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Blue',
				'options' => [
					'Red'  => __( 'Red', 'image-hover-effect' ),
					'Pink' => __( 'Pink', 'image-hover-effect' ),
					'Purple' => __( 'Purple', 'image-hover-effect' ),
					'Deep-Purple' => __( 'Deep-Purple', 'image-hover-effect' ),
					'Indigo' => __( 'Indigo', 'image-hover-effect' ),
                    'Blue'  => __( 'Blue', 'image-hover-effect' ),
					'Light-Blue' => __( 'Light-Blue', 'image-hover-effect' ),
					'Cyan' => __( 'Cyan', 'image-hover-effect' ),
					'Teal' => __( 'Teal', 'image-hover-effect' ),
					'Green' => __( 'Green', 'image-hover-effect' ),
                    'Light-Green'  => __( 'Light-Green', 'image-hover-effect' ),
					'Lime' => __( 'Lime', 'image-hover-effect' ),
					'Yellow' => __( 'Yellow', 'image-hover-effect' ),
					'Amber' => __( 'Amber', 'image-hover-effect' ),
					'Orange' => __( 'Orange', 'image-hover-effect' ),
                    'Deep-Orange' => __( 'Deep-Orange', 'image-hover-effect' ),
					'Brown' => __( 'Brown', 'image-hover-effect' ),
					'Grey' => __( 'Grey', 'image-hover-effect' ),
					'Blue-Grey' => __( 'Blue-Grey', 'image-hover-effect' ),
				],
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption h2' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();

		/**
		 * Description style.
		 */
		$this->start_controls_section(
			'description_style',
			[
				'label' => __( 'Description', 'image-hover-effect' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'description_text_transform',
			[
				'label' => __( 'Text Transform', 'image-hover-effect' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'capitalize',
				'options' => [
					'' => __( 'None', 'image-hover-effect' ),
					'uppercase' => __( 'UPPERCASE', 'image-hover-effect' ),
					'lowercase' => __( 'lowercase', 'image-hover-effect' ),
					'capitalize' => __( 'Capitalize', 'image-hover-effect' ),
				],
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption p' => 'text-transform: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'description_alignment',
			[
				'type' => Controls_Manager::CHOOSE,
				'label' => esc_html__( 'Alignment', 'image-hover-effect' ),
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'image-hover-effect' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'center',
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption p' => 'text-align: {{VALUE}};',
				],
			]
		);
		$this->add_control(
			'description_color',
			[
				'label' => __( 'Color', 'image-hover-effect' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Black',
				'options' => [
					'Red'  => __( 'Red', 'image-hover-effect' ),
					'Pink' => __( 'Pink', 'image-hover-effect' ),
					'Purple' => __( 'Purple', 'image-hover-effect' ),
					'Deep-Purple' => __( 'Deep-Purple', 'image-hover-effect' ),
					'Indigo' => __( 'Indigo', 'image-hover-effect' ),
                    'Blue'  => __( 'Blue', 'image-hover-effect' ),
					'Black'  => __( 'Black', 'image-hover-effect' ),
					'Light-Blue' => __( 'Light-Blue', 'image-hover-effect' ),
					'Cyan' => __( 'Cyan', 'image-hover-effect' ),
					'Teal' => __( 'Teal', 'image-hover-effect' ),
					'Green' => __( 'Green', 'image-hover-effect' ),
                    'Light-Green'  => __( 'Light-Green', 'image-hover-effect' ),
					'Lime' => __( 'Lime', 'image-hover-effect' ),
					'Yellow' => __( 'Yellow', 'image-hover-effect' ),
					'Amber' => __( 'Amber', 'image-hover-effect' ),
					'Orange' => __( 'Orange', 'image-hover-effect' ),
                    'Deep-Orange' => __( 'Deep-Orange', 'image-hover-effect' ),
					'Brown' => __( 'Brown', 'image-hover-effect' ),
					'Grey' => __( 'Grey', 'image-hover-effect' ),
					'Blue-Grey' => __( 'Blue-Grey', 'image-hover-effect' ),
				],
				'selectors' => [
					'{{WRAPPER}} #grid a figure figcaption p' => 'color: {{VALUE}} !important;',
				],
			]
		);

		$this->end_controls_section();

	}

	/**
	 * Render the widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		if ( $settings['material_card'] ) {
			echo "<div class='demo-3'>";
			echo "<section id='grid' class='grid clearfix'>";
			foreach (  $settings['material_card'] as $item ) { ?>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
					<figure>
						<img src="<?php echo $item['image']['url'] ?>" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2><?php echo $item['card_title'] ?></h2>
							<p><?php echo $item['card_description'] ?></p>
							<button>View</button>
						</figcaption>
					</figure>
				</a>
			<?php }
			echo "</section>";
			echo "</div>";
		}?>
		<script>
			(function() {
	
	function init() {
		var speed = 250,
			easing = mina.easeinout;

		[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
			var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
				pathConfig = {
					from : path.attr( 'd' ),
					to : el.getAttribute( 'data-path-hover' )
				};

			el.addEventListener( 'mouseenter', function() {
				path.animate( { 'path' : pathConfig.to }, speed, easing );
			} );

			el.addEventListener( 'mouseleave', function() {
				path.animate( { 'path' : pathConfig.from }, speed, easing );
			} );
		} );
	}

	init();

})();
		</script>
		<?php


	}

	/**
	 * Render the widget output in the editor.
	 *
	 * Written as a Backbone JavaScript template and used to generate the live preview.
	 *
	 * @since 1.0.0
	 *
	 * @access protected
	 */
	protected function content_template() {
		?>

			<div class='demo-3'>
			<section id='grid' class='grid clearfix'>
			<# _.each( settings.material_card, function( item, index ) { #>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
					<figure>
						<img src="{{{item.image.url}}}" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2>{{{item.card_title}}}</h2>
							<p>{{{item.card_description}}}</p>
							<button>View</button>
						</figcaption>
					</figure>
				</a>
			<# }) #>
			</section>
			</div>
			<script>
				(function() {
	
	function init() {
		var speed = 250,
			easing = mina.easeinout;

		[].slice.call ( document.querySelectorAll( '#grid > a' ) ).forEach( function( el ) {
			var s = Snap( el.querySelector( 'svg' ) ), path = s.select( 'path' ),
				pathConfig = {
					from : path.attr( 'd' ),
					to : el.getAttribute( 'data-path-hover' )
				};

			el.addEventListener( 'mouseenter', function() {
				path.animate( { 'path' : pathConfig.to }, speed, easing );
			} );

			el.addEventListener( 'mouseleave', function() {
				path.animate( { 'path' : pathConfig.from }, speed, easing );
			} );
		} );
	}

	init();

})();
			</script>
		<?php
	}
}
