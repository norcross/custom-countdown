jQuery(document).ready(function($) {



//********************************************************
// jquery datepicker(s)
//********************************************************


	$( 'input#ccd_launch' ).datepicker({
		dateFormat:		'mm/dd/yy',
		defaultDate:	null,
		changeMonth:	true,
		changeYear:		true,
		onClose: function() {
			$('input#ccd_launch').trigger('change');
		},
		altField:		'input#ccd_launch_format',
		altFormat:		'@'

	}); // end datepicker for start date

//********************************************************
// You're still here? It's over. Go home.
//********************************************************
	

});	// end schema form init
