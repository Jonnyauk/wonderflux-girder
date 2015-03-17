/**
 * All the Javascript functions
 * @package Girder child theme for Wonderflux framework
 */

( function( $ ) {

	/* Responsive nav 1 */
	( function() {

		$('#primary-header-nav').slicknav({
				prependTo:'#header-content',
				allowParentLinks: 'true',
				label:'Menu',
				closeOnClick:'false',
		});

	} )();

} )( jQuery );