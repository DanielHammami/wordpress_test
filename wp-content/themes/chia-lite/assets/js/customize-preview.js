/* global chiaGetHexLum, jQuery */
( function() {
	// Add listener for the "background_color" control.
	wp.customize( 'background_color', function( value ) {
		value.bind( function( to ) {
			var lum = chiaGetHexLum( to ),
				isDark = 127 > lum,
				textColor = ! isDark ? 'var(--global--color-dark-green)' : 'var(--global--color-light-gray)',
				tableColor = ! isDark ? 'var(--global--color-light-gray)' : 'var(--global--color-dark-green)',
				buttonColor = ! isDark ? 'var(--global--color-main-green)' : 'var(--global--color-light-gray)',
				stylesheetID = 'chia-lite-customizer-inline-styles',
				stylesheet,
				styles;

			// Toggle the white background class.
			if ( 225 <= lum ) {
				document.body.classList.add( 'has-background-white' );
			} else {
				document.body.classList.remove( 'has-background-white' );
			}

			stylesheet = jQuery( '#' + stylesheetID );
			styles = '';
			// If the stylesheet doesn't exist, create it and append it to <head>.
			if ( ! stylesheet.length ) {
				jQuery( '#chia-lite-style-inline-css' ).after( '<style id="' + stylesheetID + '"></style>' );
				stylesheet = jQuery( '#' + stylesheetID );
			}

			// Generate the styles.
			styles += '--global--color-primary:' + textColor + ';';
			styles += '--global--color-secondary:' + textColor + ';';
			styles += '--global--color-background:' + to + ';';

			styles += '--button--color-background:' + textColor + ';';
			styles += '--button--color-text:' + to + ';';
			styles += '--button--color-text-hover:' + textColor + ';';

			styles += '--table--stripes-border-color:' + tableColor + ';';
			styles += '--table--stripes-background-color:' + tableColor + ';';

			styles += '--button--color-background:' + buttonColor + ';';

			// Add the styles.
			stylesheet.html( ':root{' + styles + '}' );
		} );
	} );
}() );
