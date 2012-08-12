jQuery(document).ready( function($) {

	// get my dates
	var ccd_year	= $('input#ccd_year').val();
	var ccd_month	= $('input#ccd_month').val();
	var ccd_day		= $('input#ccd_day').val();
	
	var note = $('#note'),
		ts = (new Date(ccd_year, ccd_month - 1, ccd_day));
		newYear = true;
	
	if((new Date()) > ts){
		ts = (new Date(ccd_year, ccd_month - 1, ccd_day));
		newYear = false;
	}
		
	$('#countdown').countdown({
		timestamp	: ts,
		callback	: function(days, hours, minutes, seconds){
			
			var message = "";
			
			message += days + " day" + ( days==1 ? '':'s' ) + ", ";
			message += hours + " hour" + ( hours==1 ? '':'s' ) + ", ";
			message += minutes + " minute" + ( minutes==1 ? '':'s' ) + " and ";
			message += seconds + " second" + ( seconds==1 ? '':'s' ) + " <br />";

			
			note.html(message);
		}
	});
	
});
