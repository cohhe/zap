// Admin Javascript
jQuery( document ).ready( function( $ ) {

	// Choose layout
	$("#vh_layouts img").click(function() {
		$(this).parent().parent().find(".selected").removeClass("selected");
		$(this).addClass("selected");
	});

	$('.rpp_show-expert-options').live('change', function(){
		if( $(this).is(':checked') ) {
			$(this).parent().parent().find('.rpp_expert-panel').show();
		} else {
			$(this).parent().parent().find('.rpp_expert-panel').hide();
		}
	});

	jQuery(document).on('click', '.zap-rating-dismiss', function() {
		jQuery.ajax({
			type: 'POST',
			url: ajaxurl,
			data: { 
				'action': 'zap_dismiss_notice'
			},
			success: function(data) {
				jQuery('.zap-rating-notice').remove();
			}
		});
	});
});