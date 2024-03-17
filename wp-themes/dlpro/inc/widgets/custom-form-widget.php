<?php
/**
 * Widget API: Dlpro_Custom_Form class
 *
 * Author: Gian MR - http://www.gianmr.com
 *
 * @package  Dlpro = Null by PHPCORE Core
 * @subpackage Widgets
 * @since 1.0.0
 */

/* Exit if accessed directly */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add the Custom Subscribe Form widget.
 *
 * @since 1.0.0
 *
 * @see WP_Widget
 */
class Dlpro_Custom_Form extends WP_Widget {
	/**
	 * Sets up a Custom Form widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 */
	public function __construct() {
		$widget_ops = array(
			'classname'   => 'dlpro-form',
			'description' => __( 'Add simple custom subscribe form in your widget.', 'dlpro' ),
		);
		parent::__construct( 'dlpro-custom-sf', __( 'Custom Subscribe Form (Dlpro)', 'dlpro' ), $widget_ops );

		// add action for admin_register_scripts.
		add_action( 'admin_enqueue_scripts', array( $this, 'admin_register_scripts' ) );
		add_action( 'admin_footer-widgets.php', array( $this, 'admin_print_scripts' ), 9999 );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0
	 *
	 * @param string $hook_suffix Hook Suffix.
	 */
	public function admin_register_scripts( $hook_suffix ) {
		if ( 'widgets.php' !== $hook_suffix ) {
			return;
		}

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'underscore' );
	}

	/**
	 * Print scripts.
	 *
	 * @since 1.0
	 */
	public function admin_print_scripts() {
		?>
		<script>
			( function( $ ){
				function initColorPicker( widget ) {
					widget.find( '.color-picker' ).wpColorPicker( {
						change: _.throttle( function() { // For Customizer
							$(this).trigger( 'change' );
						}, 3000 )
					});
				}

				function onFormUpdate( event, widget ) {
					initColorPicker( widget );
				}

				$( document ).on( 'widget-added widget-updated', onFormUpdate );

				$( document ).ready( function() {
					$( '#widgets-right .widget:has(.color-picker)' ).each( function () {
						initColorPicker( $( this ) );
					} );
				} );
			}( jQuery ) );
		</script>
		<?php
	}

	/**
	 * Outputs the content for Custom Subscribe Form.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $args     Display arguments including 'before_title', 'after_title',
	 *                        'before_widget', and 'after_widget'.
	 * @param array $instance Settings for Custom Subscribe Form.
	 */
	public function widget( $args, $instance ) {
		// Title.
		$title = apply_filters( 'widget_title', empty( $instance['title'] ) ? '' : $instance['title'], $instance, $this->id_base );

		echo $args['before_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		}
		// Base Id Widget.
		$dpr_widget_id = $this->id_base . '-' . $this->number;

		// Custom Subscribe Action URL.
		$dpr_action_url = empty( $instance['dpr_action_url'] ) ? '' : wp_strip_all_tags( $instance['dpr_action_url'] );
		// Method Form.
		$dpr_method_form = empty( $instance['dpr_method_form'] ) ? 'post' : wp_strip_all_tags( $instance['dpr_method_form'] );
		// Activated name input.
		$dpr_name_check = empty( $instance['dpr_name_check'] ) ? '0' : '1';
		// Activated Email input.
		$dpr_email_check = empty( $instance['dpr_email_check'] ) ? '0' : '1';
		// Hidden input.
		$dpr_hidden_input = empty( $instance['dpr_hidden_input'] ) ? '' : $instance['dpr_hidden_input'];
		// Other input.
		$dpr_other_input = empty( $instance['dpr_other_input'] ) ? '' : $instance['dpr_other_input'];
		// Force input 100%.
		$dpr_force_100 = empty( $instance['dpr_force_100'] ) ? '0' : '1';
		// Name placeholder.
		$dpr_placeholder_name = empty( $instance['dpr_placeholder_name'] ) ? 'Enter Your Name' : wp_strip_all_tags( $instance['dpr_placeholder_name'] );
		// Email placeholder.
		$dpr_placeholder_email = empty( $instance['dpr_placeholder_email'] ) ? 'Enter Your Email Address' : wp_strip_all_tags( $instance['dpr_placeholder_email'] );
		// Button placeholder.
		$dpr_placeholder_btn = empty( $instance['dpr_placeholder_btn'] ) ? 'Subscribe Now' : wp_strip_all_tags( $instance['dpr_placeholder_btn'] );
		// Intro text.
		$dpr_introtext = empty( $instance['dpr_introtext'] ) ? '' : wp_strip_all_tags( $instance['dpr_introtext'] );
		// Spam Text.
		$dpr_spamtext = empty( $instance['dpr_spamtext'] ) ? '' : wp_strip_all_tags( $instance['dpr_spamtext'] );
		// Style.
		$bgcolor        = ( ! empty( $instance['bgcolor'] ) ) ? wp_strip_all_tags( $instance['bgcolor'] ) : '';
		$color_text     = ( ! empty( $instance['color_text'] ) ) ? wp_strip_all_tags( $instance['color_text'] ) : '#222';
		$color_button   = ( ! empty( $instance['color_button'] ) ) ? wp_strip_all_tags( $instance['color_button'] ) : '#fff';
		$bgcolor_button = ( ! empty( $instance['bgcolor_button'] ) ) ? wp_strip_all_tags( $instance['bgcolor_button'] ) : '#34495e';
		if ( $dpr_force_100 ) {
			$force = ' force-100';
		} else {
			$force = '';
		}
		if ( $bgcolor ) {
			$color = ' style="padding:20px;background-color:' . esc_html( $bgcolor ) . '"';
		} else {
			$color = '';
		}
		?>

			<div class="dlpro-form-widget<?php echo $force; ?>"<?php echo $color; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
				<?php if ( $dpr_introtext ) { ?>
					<p class="intro-text" style="color:<?php echo esc_attr( $color_text ); ?>;"><?php echo esc_attr( $dpr_introtext ); ?></p>
				<?php } ?>
				<form class="dlpro-form-wrapper" id="<?php echo esc_attr( $dpr_widget_id ); ?>" method="<?php echo esc_attr( $dpr_method_form ); ?>" name="<?php echo esc_attr( $dpr_widget_id ); ?>" action="<?php echo esc_url( $dpr_action_url ); ?>">

					<?php if ( $dpr_name_check ) { ?>
						<input type="text" name="name" id="" class="dlpro-form-name" placeholder="<?php echo esc_attr( $dpr_placeholder_name ); ?>" value="" />
					<?php } ?>

					<?php if ( $dpr_email_check ) { ?>
						<input type="email" name="email" id="" class="dlpro-form-email" placeholder="<?php echo esc_attr( $dpr_placeholder_email ); ?>" />
					<?php } ?>

					<?php
					if ( $dpr_other_input ) {
						echo $dpr_other_input; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>

					<input type="submit" name="submit" style="border-color:<?php echo esc_attr( $bgcolor_button ); ?>;background-color:<?php echo esc_attr( $bgcolor_button ); ?>;color:<?php echo esc_attr( $color_button ); ?>;" value="<?php echo esc_attr( $dpr_placeholder_btn ); ?>" />

					<?php
					if ( $dpr_hidden_input ) {
						echo $dpr_hidden_input; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					}
					?>

				</form>
				<?php if ( $dpr_spamtext ) { ?>
					<p class="spam-text" style="color:<?php echo esc_attr( $color_text ); ?>;"><?php echo esc_attr( $dpr_spamtext ); ?></p>
				<?php } ?>
			</div>

		<?php
		echo $args['after_widget']; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Handles updating settings for the current Custom form widget instance.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $new_instance New settings for this instance as input by the user via
	 *                            Dlpro_Custom_Form::form().
	 * @param array $old_instance Old settings for this instance.
	 * @return array Updated settings to save.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance     = $old_instance;
		$new_instance = wp_parse_args(
			(array) $new_instance,
			array(
				'title'                 => '',
				'dpr_action_url'        => '',
				'dpr_method_form'       => 'post',
				'dpr_name_check'        => '0',
				'dpr_email_check'       => '0',
				'dpr_hidden_input'      => '',
				'dpr_other_input'       => '',
				'dpr_force_100'         => '0',
				'dpr_placeholder_name'  => 'Enter Your Name',
				'dpr_placeholder_email' => 'Enter Your Email Address',
				'dpr_placeholder_btn'   => 'Subscribe Now',
				'dpr_introtext'         => '',
				'dpr_spamtext'          => '',
				'bgcolor'               => '',
				'color_text'            => '#222',
				'color_button'          => '#fff',
				'bgcolor_button'        => '#34495e',
			)
		);
		// Title.
		$instance['title'] = sanitize_text_field( $new_instance['title'] );
		// Action URL.
		$instance['dpr_action_url'] = wp_strip_all_tags( $new_instance['dpr_action_url'] );
		// Method Form.
		$instance['dpr_method_form'] = wp_strip_all_tags( $new_instance['dpr_method_form'] );
		// Activated name input.
		$instance['dpr_name_check'] = wp_strip_all_tags( $new_instance['dpr_name_check'] ? '1' : '0' );
		// Activated email input.
		$instance['dpr_email_check'] = wp_strip_all_tags( $new_instance['dpr_email_check'] ? '1' : '0' );
		if ( current_user_can( 'unfiltered_html' ) ) {
			$instance['dpr_hidden_input'] = $new_instance['dpr_hidden_input'];
			$instance['dpr_other_input']  = $new_instance['dpr_other_input'];
		} else {
			$instance['dpr_hidden_input'] = wp_kses_post( $new_instance['dpr_hidden_input'] );
			$instance['dpr_other_input']  = wp_kses_post( $new_instance['dpr_other_input'] );
		}
		// Force.
		$instance['dpr_force_100'] = wp_strip_all_tags( $new_instance['dpr_force_100'] ? '1' : '0' );
		// Name placeholder.
		$instance['dpr_placeholder_name'] = wp_strip_all_tags( $new_instance['dpr_placeholder_name'] );
		// Email placeholder.
		$instance['dpr_placeholder_email'] = wp_strip_all_tags( $new_instance['dpr_placeholder_email'] );
		// Button placeholder.
		$instance['dpr_placeholder_btn'] = wp_strip_all_tags( $new_instance['dpr_placeholder_btn'] );
		// Intro Text.
		$instance['dpr_introtext'] = wp_strip_all_tags( $new_instance['dpr_introtext'] );
		// Spam Text.
		$instance['dpr_spamtext'] = wp_strip_all_tags( $new_instance['dpr_spamtext'] );
		// Style.
		$instance['bgcolor']        = wp_strip_all_tags( $new_instance['bgcolor'] );
		$instance['color_text']     = wp_strip_all_tags( $new_instance['color_text'] );
		$instance['color_button']   = wp_strip_all_tags( $new_instance['color_button'] );
		$instance['bgcolor_button'] = wp_strip_all_tags( $new_instance['bgcolor_button'] );

		return $instance;
	}

	/**
	 * Outputs the settings form for the Custom form widget.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @param array $instance Current settings.
	 */
	public function form( $instance ) {
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'                 => '',
				'dpr_action_url'        => '',
				'dpr_method_form'       => 'post',
				'dpr_thx_link'          => '',
				'dpr_name_check'        => '0',
				'dpr_email_check'       => '0',
				'dpr_hidden_input'      => '',
				'dpr_other_input'       => '',
				'dpr_force_100'         => '1',
				'dpr_placeholder_name'  => 'Enter Your Name',
				'dpr_placeholder_email' => 'Enter Your Email Address',
				'dpr_placeholder_btn'   => 'Subscribe Now',
				'dpr_introtext'         => '',
				'dpr_spamtext'          => '',
				'bgcolor'               => '',
				'color_text'            => '#222',
				'color_button'          => '#fff',
				'bgcolor_button'        => '#34495e',
			)
		);
		// Title.
		$title = sanitize_text_field( $instance['title'] );
		// Action URL.
		$dpr_action_url = wp_strip_all_tags( $instance['dpr_action_url'] );
		// Method Form.
		$dpr_method_form = wp_strip_all_tags( $instance['dpr_method_form'] );
		// Activated name input.
		$dpr_name_check = wp_strip_all_tags( $instance['dpr_name_check'] ? '1' : '0' );
		// Activated email input.
		$dpr_email_check = wp_strip_all_tags( $instance['dpr_email_check'] ? '1' : '0' );
		// Force 100%.
		$dpr_force_100 = wp_strip_all_tags( $instance['dpr_force_100'] ? '1' : '0' );
		// Name placeholder.
		$dpr_placeholder_name = wp_strip_all_tags( $instance['dpr_placeholder_name'] );
		// Email placeholder.
		$dpr_placeholder_email = wp_strip_all_tags( $instance['dpr_placeholder_email'] );
		// Button placeholder.
		$dpr_placeholder_btn = wp_strip_all_tags( $instance['dpr_placeholder_btn'] );
		// Intro text.
		$dpr_introtext = wp_strip_all_tags( $instance['dpr_introtext'] );
		// Spam text.
		$dpr_spamtext = wp_strip_all_tags( $instance['dpr_spamtext'] );
		// Style.
		$bgcolor        = wp_strip_all_tags( $instance['bgcolor'] );
		$color_text     = wp_strip_all_tags( $instance['color_text'] );
		$color_button   = wp_strip_all_tags( $instance['color_button'] );
		$bgcolor_button = wp_strip_all_tags( $instance['bgcolor_button'] );
		?>

		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>"><?php esc_html_e( 'Title:', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_action_url' ) ); ?>"><?php esc_html_e( 'Action URL *(Required)', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'dpr_action_url' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_action_url' ) ); ?>" type="text" value="<?php echo esc_attr( $dpr_action_url ); ?>" />
			<br />
			<small><?php esc_html_e( 'For example, you get form code with &lt;form action="http://example.com/subscribeform" method="post"&gt; just fill with http://example.com/subscribeform', 'dlpro' ); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_method_form' ) ); ?>"><?php esc_html_e( 'Select Method:' ); ?></label>
			<select id="<?php echo esc_html( $this->get_field_id( 'dpr_method_form' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_method_form' ) ); ?>">
				<option value="post"<?php selected( $instance['dpr_method_form'], 'post' ); ?>><?php esc_html_e( 'post', 'dlpro' ); ?></option>
				<option value="get"<?php selected( $instance['dpr_method_form'], 'get' ); ?>><?php esc_html_e( 'get', 'dlpro' ); ?></option>
			</select>
		</p>
		<p>
			<input class="checkbox" value="1" type="checkbox"<?php checked( $instance['dpr_name_check'], 1 ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_name_check' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_name_check' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_name_check' ) ); ?>"><?php esc_html_e( 'Enable Full Name Field', 'dlpro' ); ?></label>
		</p>
		<p>
			<input class="checkbox" value="1" type="checkbox"<?php checked( $instance['dpr_email_check'], 1 ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_email_check' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_email_check' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_email_check' ) ); ?>"><?php esc_html_e( 'Enable Email Field', 'dlpro' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_hidden_input' ) ); ?>"><?php esc_html_e( 'Hidden Input:', 'dlpro' ); ?></label>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'dpr_hidden_input' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_hidden_input' ) ); ?>"><?php echo esc_textarea( $instance['dpr_hidden_input'] ); ?></textarea>
			<br />
			<small><?php esc_html_e( 'Fill with hidden field for example &lt;input name="hidden_name1" type="hidden" value="hidden_value1" /&gt;&lt;input name="hidden_name2" type="hidden" value="hidden_value2" /&gt;', 'dlpro' ); ?></small>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_other_input' ) ); ?>"><?php esc_html_e( 'Other Input:', 'dlpro' ); ?></label>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'dpr_other_input' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_other_input' ) ); ?>"><?php echo esc_textarea( $instance['dpr_other_input'] ); ?></textarea>
			<br />
			<small><?php esc_html_e( 'Fill with other field if you need other input for your subscribe form. For example &lt;input name="city" type="text" placeholder="Enter your city" value="" /&gt;&lt;input name="age" type="text" placeholder="Enter your age" value="" /&gt;', 'dlpro' ); ?></small>
		</p>
		<p>
			<input class="checkbox" value="1" type="checkbox"<?php checked( $instance['dpr_force_100'], 1 ); ?> id="<?php echo esc_html( $this->get_field_id( 'dpr_force_100' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_force_100' ) ); ?>" />
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_force_100' ) ); ?>"><?php esc_html_e( 'Force Input 100%', 'dlpro' ); ?></label>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_name' ) ); ?>"><?php esc_html_e( 'Placeholder For Name Field', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_name' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_placeholder_name' ) ); ?>" type="text" value="<?php echo esc_attr( $dpr_placeholder_name ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_email' ) ); ?>"><?php esc_html_e( 'Placeholder For Email Address Field', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_email' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_placeholder_email' ) ); ?>" type="text" value="<?php echo esc_attr( $dpr_placeholder_email ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_btn' ) ); ?>"><?php esc_html_e( 'Submit Button Text', 'dlpro' ); ?></label>
			<input class="widefat" id="<?php echo esc_html( $this->get_field_id( 'dpr_placeholder_btn' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_placeholder_btn' ) ); ?>" type="text" value="<?php echo esc_attr( $dpr_placeholder_btn ); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_introtext' ) ); ?>"><?php esc_html_e( 'Intro Text:', 'dlpro' ); ?></label>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'dpr_introtext' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_introtext' ) ); ?>"><?php echo esc_textarea( $instance['dpr_introtext'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'dpr_spamtext' ) ); ?>"><?php esc_html_e( 'Spam Text:', 'dlpro' ); ?></label>
			<textarea class="widefat" rows="6" id="<?php echo esc_html( $this->get_field_id( 'dpr_spamtext' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'dpr_spamtext' ) ); ?>"><?php echo esc_textarea( $instance['dpr_spamtext'] ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'bgcolor' ) ); ?>"><?php esc_html_e( 'Background Color', 'dlpro' ); ?></label><br />
			<input class="widefat color-picker" id="<?php echo esc_html( $this->get_field_id( 'bgcolor' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'bgcolor' ) ); ?>" type="text" value="<?php echo esc_attr( $bgcolor ); ?>" data-default-color="" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'color_text' ) ); ?>"><?php esc_html_e( 'Text Color', 'dlpro' ); ?></label><br />
			<input class="widefat color-picker" id="<?php echo esc_html( $this->get_field_id( 'color_text' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_text' ) ); ?>" type="text" value="<?php echo esc_attr( $color_text ); ?>" data-default-color="#222" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'color_button' ) ); ?>"><?php esc_html_e( 'Button Text Color', 'dlpro' ); ?></label><br />
			<input class="widefat color-picker" id="<?php echo esc_html( $this->get_field_id( 'color_button' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'color_button' ) ); ?>" type="text" value="<?php echo esc_attr( $color_button ); ?>" data-default-color="#fff" />
		</p>
		<p>
			<label for="<?php echo esc_html( $this->get_field_id( 'bgcolor_button' ) ); ?>"><?php esc_html_e( 'Button Background Color', 'dlpro' ); ?></label><br />
			<input class="widefat color-picker" id="<?php echo esc_html( $this->get_field_id( 'bgcolor_button' ) ); ?>" name="<?php echo esc_html( $this->get_field_name( 'bgcolor_button' ) ); ?>" type="text" value="<?php echo esc_attr( $bgcolor_button ); ?>" data-default-color="#34495e" />
		</p>
		<?php
	}
}

add_action(
	'widgets_init',
	function() {
		register_widget( 'Dlpro_Custom_Form' );
	}
);
