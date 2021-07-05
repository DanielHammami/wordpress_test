<?php
/**
 * Theme Ostrich Customizer
 *
 * @package Bloz
 *
 * Custom Controller
 */

class Bloz_Setting_Note extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'bloz-note';
	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title header-previously-uploaded"><?php echo esc_html( $this->label ); ?></span>
		<?php endif; ?>

		<span class="description customize-control-description"><?php echo esc_html__( 'Put here youtube video code to play in header banner background. Note: Once you put Video code Header Image will replace with youtube video', 'bloz' ); ?></span>
		<span><?php echo esc_html__( 'Select bold part of the url as video code', 'bloz' ) ; ?></span>
		<span>https://www.youtube.com/watch?v=<b>BoThVuSm4u8</b></span>
		
		<?php
	}
}

/**
 * Separator custom control
 *
 * @version 1.0.0
 * @since  1.0.0
 */
class Bloz_Separator_Custom_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'bloz-separator';
	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
			<p><hr style="border-color: #222; opacity: 0.2;"></p>
		<?php
	}
}

/**
 * Multi input custom control
 *
 * @version 1.0.0
 * @since  1.0.0
 */
class Bloz_Multi_Input_Custom_Control extends WP_Customize_Control {
	/**
	 * Control type
	 *
	 * @var string
	 */
	public $type = 'multi-input';

	/**
	 * Control button text.
	 *
	 * @var string
	 */
	public $button_text;

	/**
	 * Control method
	 *
	 * @since 1.0.0
	 */
	public function render_content() {
		?>
		<label class="customize_multi_input">
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<p><?php echo esc_html( $this->description ); ?></p>
			<input type="hidden" id="<?php echo esc_attr( $this->id ); ?>" name="<?php echo esc_attr( $this->id ); ?>" value="<?php echo esc_attr( $this->value() ); ?>" class="customize_multi_value_field" <?php $this->link(); ?> />
			<div class="customize_multi_fields">
				<div class="set">
					<input type="text" value="" class="customize_multi_single_field"/>
					<span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span>
				</div>
			</div>
			<a href="#" class="button button-primary customize_multi_add_field"><?php echo esc_html( $this->button_text ); ?></a>
		</label>
		<?php
	}
}

/**
 * The radio image customize control extends the WP_Customize_Control class.  This class allows
 * developers to create a list of image radio inputs.
 *
 * Note, the `$choices` array is slightly different than normal and should be in the form of
 * `array(
	 *	$value => array( 'color' => $color_value ),
	 *	$value => array( 'color' => $color_value ),
 * )`
 *
 */

/**
 * Radio color customize control.
 *
 * @since  3.0.0
 * @access public
 */
class Bloz_Customize_Control_Radio_Color extends WP_Customize_Control {

	/**
	 * The type of customize control being rendered.
	 *
	 * @since  3.0.0
	 * @access public
	 * @var    string
	 */
	public $type = 'radio-color';

	/**
	 * Add custom parameters to pass to the JS via JSON.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function to_json() {
		parent::to_json();

		// We need to make sure we have the correct color URL.
		foreach ( $this->choices as $value => $args )
			$this->choices[ $value ]['color'] = esc_attr( $args['color'] );

		$this->json['choices'] = $this->choices;
		$this->json['link']    = $this->get_link();
		$this->json['value']   = $this->value();
		$this->json['id']      = $this->id;
	}

	/**
	 * Don't render the content via PHP.  This control is handled with a JS template.
	 *
	 * @since  4.0.0
	 * @access public
	 * @return bool
	 */
	protected function render_content() {}

	/**
	 * Underscore JS template to handle the control's output.
	 *
	 * @since  3.0.0
	 * @access public
	 * @return void
	 */
	public function content_template() { ?>

		<# if ( ! data.choices ) {
			return;
		} #>

		<# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

		<# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

		<# _.each( data.choices, function( args, choice ) { #>
			<label>
				<input type="radio" value="{{ choice }}" name="_customize-{{ data.type }}-{{ data.id }}" {{{ data.link }}} <# if ( choice === data.value ) { #> checked="checked" <# } #> />

				<span class="screen-reader-text">{{ args.label }}</span>
				
				<# if ( 'custom' != choice ) { #>
					<span class="color-value" style="background-color: {{ args.color }}"></span>
				<# } else { #>
					<span class="color-value custom-color-value"></span>
				<# } #>
			</label>
		<# } ) #>
	<?php }
}

$wp_customize->register_control_type( 'Bloz_Customize_Control_Radio_Color');

class Bloz_Customize_Control_Sort_Sections extends WP_Customize_Control {

  	/**
   	* Control Type
   	*/
  	public $type = 'sortable';
  
	/**
	* Add custom parameters to pass to the JS via JSON.
	*
	* @access public
	* @return void
	*/
  	public function to_json() {
	  	parent::to_json();

    	$choices = $this->choices;
      	$choices = array_filter( array_merge( array_flip( $this->value() ), $choices ) );
	  	$this->json['choices'] = $choices;
	  	$this->json['link']    = $this->get_link();
	  	$this->json['value']   = $this->value();
	  	$this->json['id']      = $this->id;
  	}

  	/**
   	* Render Settings
   	*/
  	public function content_template() { ?>
	  	<# if ( ! data.choices ) {
	  		return;
	  	} #>

	    <# if ( data.label ) { #>
			<span class="customize-control-title">{{ data.label }}</span>
		<# } #>

	    <# if ( data.description ) { #>
			<span class="description customize-control-description">{{{ data.description }}}</span>
		<# } #>

	    <ul class="bloz-sortable-list">

	      	<# _.each( data.choices, function( args, choice ) { #>

	        <li>
	            <input class="bloz-sortable-input sortable-hideme" name="{{choice}}" type="hidden"  value="{{ choice }}" />
	            <span class ="menu-item-handle sortable-span">{{args.name}}</span>
	          <i title="<?php esc_attr_e( 'Drag and Move', 'bloz' );?>" class="dashicons dashicons-menu bloz-drag-handle"></i>
	          <i title="<?php esc_attr_e( 'Edit', 'bloz' );?>" class="dashicons dashicons-edit bloz-edit" data-jump="{{args.section_id}}"></i>
	        </li>

	        <# } ) #>

	        <li class="sortable-hideme">
	          <input class="bloz-sortable-value" {{{ data.link }}} value="{{data.value}}" />
	        </li>

	    </ul>
  	<?php
  	}
}

$wp_customize->register_control_type( 'Bloz_Customize_Control_Sort_Sections' );