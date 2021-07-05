/**
 * Scripts within the customizer controls window.
 *
 * Contextually shows the color hue control and informs the preview
 * when users open or close the front page sections section.
 */

(function( $, api ) {
    wp.customize.bind('ready', function() {
        // Show message on change.
        var bloz_settings = ['bloz_slider_num', 'bloz_services_num', 'bloz_projects_num', 'bloz_testimonial_num', 'bloz_blog_section_num', 'bloz_reset_settings', 'bloz_testimonial_num', 'bloz_partner_num'];
        _.each( bloz_settings, function( bloz_setting ) {
            wp.customize( bloz_setting, function( setting ) {
                var ostrichblogNotice = function( value ) {
                    var name = 'needs_refresh';
                    if ( value && bloz_setting == 'bloz_reset_settings' ) {
                        setting.notifications.add( 'needs_refresh', new wp.customize.Notification(
                            name,
                            {
                                type: 'warning',
                                message: localized_data.reset_msg,
                            }
                        ) );
                    } else if( value ){
                        setting.notifications.add( 'reset_name', new wp.customize.Notification(
                            name,
                            {
                                type: 'info',
                                message: localized_data.refresh_msg,
                            }
                        ) );
                    } else {
                        setting.notifications.remove( name );
                    }
                };

                setting.bind( ostrichblogNotice );
            });
        });

        /* === Radio Image Control === */
        api.controlConstructor['radio-color'] = api.Control.extend( {
            ready: function() {
                var control = this;

                $( 'input:radio', control.container ).change(
                    function() {
                        control.setting.set( $( this ).val() );
                    }
                );
            }
        } );


         // Sortable sections
        jQuery( 'ul.bloz-sortable-list' ).sortable({
            handle: '.bloz-drag-handle',
            axis: 'y',
            update: function( e, ui ){
                jQuery('input.bloz-sortable-input').trigger( 'change' );
            }
        });

        // Sortable sections
        jQuery( "body" ).on( 'hover', '.bloz-drag-handle', function() {
            jQuery( 'ul.bloz-sortable-list' ).sortable({
                handle: '.bloz-drag-handle',
                axis: 'y',
                update: function( e, ui ){
                    jQuery('input.bloz-sortable-input').trigger( 'change' );
                }
            });
        });

        /* On changing the value. */
        jQuery( "body" ).on( 'change', 'input.bloz-sortable-input', function() {
            /* Get the value, and convert to string. */
            this_checkboxes_values = jQuery( this ).parents( 'ul.bloz-sortable-list' ).find( 'input.bloz-sortable-input' ).map( function() {
                return this.value;
            }).get().join( ',' );

            /* Add the value to hidden input. */
            jQuery( this ).parents( 'ul.bloz-sortable-list' ).find( 'input.bloz-sortable-value' ).val( this_checkboxes_values ).trigger( 'change' );

        });

        // Deep linking for counter section to about section.
        jQuery('.bloz-edit').click(function(e) {
            e.preventDefault();
            var jump_to = jQuery(this).attr( 'data-jump' );
            wp.customize.section( jump_to ).focus()
        });

        $('#sub-accordion-section-bloz_topbar').css( 'display', 'none' );
    });
})( jQuery, wp.customize );

jQuery( document ).ready(function($) {
    $( document ).on( 'click', '.customize_multi_add_field', bloz_customize_multi_add_field )
        .on( 'change', '.customize_multi_single_field', bloz_customize_multi_single_field )
        .on( 'click', '.customize_multi_remove_field', bloz_customize_multi_remove_field )

    /********* Multi Input Custom control ***********/
    $( '.customize_multi_input' ).each(function() {
        var $this = $( this );
        var multi_saved_value = $this.find( '.customize_multi_value_field' ).val();
        if (multi_saved_value.length > 0) {
            var multi_saved_values = multi_saved_value.split( "|" );
            $this.find( '.customize_multi_fields' ).empty();
            var $control = $this.parents( '.customize_multi_input' );
            $.each(multi_saved_values, function( index, value ) {
                $this.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="' + value + '" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            });
        }
    });

    function bloz_customize_multi_add_field(e) {
        var $this = $( e.currentTarget );
        e.preventDefault();
            var $control = $this.parents( '.customize_multi_input' );
            $control.find( '.customize_multi_fields' ).append( '<div class="set"><input type="text" value="" class="customize_multi_single_field" /><span class="customize_multi_remove_field"><span class="dashicons dashicons-no-alt"></span></span></div>' );
            bloz_customize_multi_write( $control );
    }

    function bloz_customize_multi_single_field() {
        var $control = $( this ).parents( '.customize_multi_input' );
        bloz_customize_multi_write( $control );
    }

    function bloz_customize_multi_remove_field(e) {
        e.preventDefault();
        var $this = $( this );
        var $control = $this.parents( '.customize_multi_input' );
        $this.parent().remove();
        bloz_customize_multi_write( $control );
    }

    function bloz_customize_multi_write( $element) {
        var customize_multi_val = '';
        $element.find( '.customize_multi_fields .customize_multi_single_field' ).each(function() {
            customize_multi_val += $( this ).val() + '|';
        });
        $element.find( '.customize_multi_value_field' ).val( customize_multi_val.slice( 0, -1 ) ).change();
    }       
});