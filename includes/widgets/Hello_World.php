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
class Hello_World extends Widget_Base {

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
		return 'image-hover-effect';
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
		return __( 'Image Hover Effect', 'image-hover-effect' );
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
				'label' => __( 'Choose Image', 'plugin-domain' ),
				'type' => Controls_Manager::MEDIA,
				'default' => [
					'url' => Utils::get_placeholder_image_src(),
				],
			]
		);
		$repeater->add_control(
			'card_title',
			[
				'label' => __( 'Title', 'wpac-material-cards' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'John Doe.', 'wpac-material-cards' ),
				'placeholder' => __( 'Type your title here', 'wpac-material-cards' ),
			]
		);
        
        $repeater->add_control(
			'card_description',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => Controls_Manager::TEXTAREA,
				'rows' => 10,
				'default' => __( 'He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...', 'plugin-domain' ),
				'placeholder' => __( 'Type your description here', 'plugin-domain' ),
			]
		);
        $repeater->add_control(
			'card_color',
			[
				'label' => __( 'Card Color', 'plugin-domain' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Red',
				'options' => [
					'Red'  => __( 'Red', 'plugin-domain' ),
					'Pink' => __( 'Pink', 'plugin-domain' ),
					'Purple' => __( 'Purple', 'plugin-domain' ),
					'Deep-Purple' => __( 'Deep-Purple', 'plugin-domain' ),
					'Indigo' => __( 'Indigo', 'plugin-domain' ),
                    'Blue'  => __( 'Blue', 'plugin-domain' ),
					'Light-Blue' => __( 'Light-Blue', 'plugin-domain' ),
					'Cyan' => __( 'Cyan', 'plugin-domain' ),
					'Teal' => __( 'Teal', 'plugin-domain' ),
					'Green' => __( 'Green', 'plugin-domain' ),
                    'Light-Green'  => __( 'Light-Green', 'plugin-domain' ),
					'Lime' => __( 'Lime', 'plugin-domain' ),
					'Yellow' => __( 'Yellow', 'plugin-domain' ),
					'Amber' => __( 'Amber', 'plugin-domain' ),
					'Orange' => __( 'Orange', 'plugin-domain' ),
                    'Deep-Orange' => __( 'Deep-Orange', 'plugin-domain' ),
					'Brown' => __( 'Brown', 'plugin-domain' ),
					'Grey' => __( 'Grey', 'plugin-domain' ),
					'Blue-Grey' => __( 'Blue-Grey', 'plugin-domain' ),
				],
			]
		);
		$repeater->add_control(
			'link_twitter',
			[
				'label' => __( 'URL', 'plugin-domain' ),
				'type' => Controls_Manager::URL,
				'placeholder' => __( 'https://twitter.com', 'plugin-domain' ),
				'show_external' => true,
				'default' => [
					'url' => 'https://twitter.com',
					'is_external' => true,
					'nofollow' => true,
				],
			]
		);
		
		$this->add_control(
			'material_card',
			[
				'label' => __( 'Cards List', 'plugin-domain' ),
				'type' => Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'card_title' => __( 'John Doe.', 'plugin-domain' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...', 'plugin-domain' ),
					],
					[
						'card_title' => __( 'John Doe.', 'plugin-domain' ),
                        'card_description' => __( 'He has appeared in more than 100 films and television shows, including The Deer Hunter, Annie Hall, The Prophecy trilogy, The Dogs of War ...', 'plugin-domain' ),
					],
				],
				'title_field' => '{{{ card_title }}}',
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'image-hover-effect' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'text_transform',
			[
				'label' => __( 'Text Transform', 'image-hover-effect' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'Hello World',
				'options' => [
					'' => __( 'None', 'image-hover-effect' ),
					'uppercase' => __( 'UPPERCASE', 'image-hover-effect' ),
					'lowercase' => __( 'lowercase', 'image-hover-effect' ),
					'capitalize' => __( 'Capitalize', 'image-hover-effect' ),
				],
				'selectors' => [
					'{{WRAPPER}} .title' => 'text-transform: {{VALUE}};',
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
					'{{WRAPPER}} .title' => 'text-align: {{VALUE}};',
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
			echo "<section id='grid' class='grid clearfix'>";
			foreach (  $settings['material_card'] as $item ) { ?>
				<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z" class="elementor-repeater-item-">
					<figure>
						<img src="<?php echo $item['image']['url'] ?>" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
						<figcaption>
							<h2><?php echo $item['card_title'] ?></h2>
							<p><?php echo $item['card_description'] ?></p>
							<button>View</button>
						</figcaption>
					</figure>
				</a>
			<?php }
			echo "</section>";
		}?>
		
		<?php

		//echo Group_Control_Image_Size::get_attachment_image_html( $settings );

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

		
			<section id='grid' class='grid clearfix'>
			<# _.each( settings.material_card, function( item, index ) { #>
				<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z" class="elementor-repeater-item-{{{item.id}}}">
					<figure>
						<img src="{{{item.image.url}}}" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
						<figcaption>
							<h2>{{{item.card_title}}}</h2>
							<p>{{{item.card_description}}}</p>
							<button>View</button>
						</figcaption>
					</figure>
				</a>
			<# }) #>
			</section>

		<?php
	}
}
