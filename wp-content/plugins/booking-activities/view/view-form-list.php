<?php
/**
 * Form list page
 * @since 1.5.0
 * @version 1.7.12
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) { exit; }
?>
<div class='wrap'>
	<h1 class='wp-heading-inline'><?php echo esc_html__( 'Booking Forms', 'booking-activities' ); ?></h1>
	
	<?php 
	$can_create_form = current_user_can( 'bookacti_create_forms' );
	if( $can_create_form ) { 
		?>
		<a href='<?php echo esc_url( admin_url( 'admin.php?page=bookacti_forms&action=new' ) ); ?>' class='page-title-action' >
			<?php echo esc_html_x( 'Add New', 'form', 'booking-activities' ); ?>
		</a>
		<?php
	}
	do_action( 'bookacti_form_list_page_header' );
	?>
	
	<hr class='wp-header-end' />
	
	<div id='bookacti-form-list-container' >
		<?php
			do_action( 'bookacti_before_form_list' );
		?>
		<div id='bookacti-form-list' >
		<?php
			$bookings_list_table = new Forms_List_Table();
			
			$filters = array(
				'id'		=> isset( $_REQUEST[ 'id' ] )		? $_REQUEST[ 'id' ] : array(), 
				'title'		=> isset( $_REQUEST[ 'title' ] )	? $_REQUEST[ 'title' ] : '', 
				'user_id'	=> isset( $_REQUEST[ 'user_id' ] )	? $_REQUEST[ 'user_id' ] : 0, 
				'status'	=> isset( $_REQUEST[ 'status' ] )	? $_REQUEST[ 'status' ] : array( 'publish' ), 
				'active'	=> isset( $_REQUEST[ 'active' ] )	? $_REQUEST[ 'active' ] : false, 
				'order_by'	=> isset( $_REQUEST[ 'orderby' ] )	? $_REQUEST[ 'orderby' ] : array( 'id' ),
				'order'		=> isset( $_REQUEST[ 'order' ] )	? $_REQUEST[ 'order' ] : 'DESC'
			);
			$bookings_list_table->prepare_items( $filters );
			$bookings_list_table->views();
			$bookings_list_table->display();
		?>
		</div>
		<?php
			do_action( 'bookacti_after_form_list' );
		?>
	</div>
</div>