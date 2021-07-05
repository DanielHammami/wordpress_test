/* global setTimeout */
wp.domReady( function() {
	// Unregister "Wide" Separator Style.
	wp.blocks.unregisterBlockStyle( 'core/separator', 'wide' );
} );
