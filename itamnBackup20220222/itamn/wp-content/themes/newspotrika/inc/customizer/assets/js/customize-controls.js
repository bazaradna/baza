( function( $, api ) {

	// "upsell" section.
	api.sectionConstructor['upsell'] = api.Section.extend( {

		attachEvents: function () {},

		isContextuallyActive: function () {
			return true;
		}
	} );

} )( jQuery, wp.customize );
