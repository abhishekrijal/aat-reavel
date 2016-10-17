/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );


	//header background color
	wp.customize( 'aat_reavel_all[header_color]', function( value ) {
		value.bind( function( to ) {
			$( '#header' ).css( {
				'background-color' : to
			} );
		} );
	} );

	
	//contact page banner
	wp.customize('banner_contact' , function( value ){
		value.bind(function( to ){
			$('#banner-kontakt').css({
				'backgroundImage' : to
			})
		});
	});

	//about page banner
	wp.customize('banner_about', function( value ){
		value.bind(function ( to ){
			$('#banner-about').css({
				'backgroundImage'  : to
			});
		});
	});

	//Logo upload function

	wp.customize('aat_logo_upload', function( value ){
		value.bind(function ( to ){
			$('#logo-img').attr({
				'src'  : to
			});
		});
	});

	

} )( jQuery );
