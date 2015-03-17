/**
 * All the Javascript functions
 * @package Girder child theme for Wonderflux framework
 */

( function( $ ) {

	/* Responsive nav 1 */
	( function() {

		$('#primary-header-nav').slicknav({
				prependTo:'#mobile-menu-1',
				allowParentLinks: 'true',
				label:'Menu',
				closeOnClick:'false',
		});

	} )();

} )( jQuery );