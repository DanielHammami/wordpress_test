<?php
/**
 * Metabox file
 *
 * @package Bloz
 */

/**
 * Register meta box(es).
 */
function bloz_register_meta_boxes() {
    add_meta_box( 'bloz-select-sidebar', __( 'Sidebar position', 'bloz' ), 'bloz_display_metabox', array( 'post', 'page' ), 'side' );
}
add_action( 'add_meta_boxes', 'bloz_register_meta_boxes' );
 
/**
 * Meta box display callback.
 *
 * @param WP_Post $post Current post object.
 */
function bloz_display_metabox( $post ) {
    // Display code/markup goes here. Don't forget to include nonces!

    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'bloz_select_sidebar_save_meta_box', 'bloz_select_sidebar_meta_box_nonce' );

    $bloz_sidebar_meta = get_post_meta( $post->ID, 'bloz-select-sidebar', true );
	$choices = array( 
			'left'  => esc_html__( 'Left', 'bloz' ), 
			'right' => esc_html__( 'Right', 'bloz' ), 
			'no'    => esc_html__( 'No Sidebar', 'bloz' ), 
		);

		foreach ( $choices as $value => $name ) : ?>
	    	<p>
	    		<label>
					<input value="<?php echo esc_attr( $value ); ?>" <?php checked( $bloz_sidebar_meta, $value, true ); ?> name="bloz-select-sidebar" type="radio" />
					<?php echo esc_html( $name ); ?>
	    		</label>
			</p>	
		<?php endforeach; 

}
 
/**
 * Save meta box content.
 *
 * @param int $post_id Post ID
 */
function bloz_save_meta_box( $post_id ) {
    // Save logic goes here. Don't forget to include nonce checks!

    /*
     * We need to verify this came from our screen and with proper authorization,
     * because the save_post action can be triggered at other times.
     */

    // Check if our nonce is set.
    if ( ! isset( $_POST['bloz-select-sidebar'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ! wp_verify_nonce( sanitize_key( $_POST['bloz_select_sidebar_meta_box_nonce'] ), 'bloz_select_sidebar_save_meta_box' ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    /* OK, it's safe for us to save the data now. */
    
    // Make sure that it is set.
    if ( isset( $_POST['bloz-select-sidebar'] ) ) {
        // Sanitize user input.
        $bloz_sidebar_meta = sanitize_text_field( wp_unslash( $_POST['bloz-select-sidebar'] ) );
        // Update the meta field in the database.
        update_post_meta( $post_id, 'bloz-select-sidebar', $bloz_sidebar_meta );
    }
}
add_action( 'save_post', 'bloz_save_meta_box' );