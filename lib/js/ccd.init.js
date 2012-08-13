jQuery(document).ready( function($) {

	// get the jQuery date format
	var ccd_launch	= $('input#ccd_launch').val();

	var date = new Date(ccd_launch);

	// convert date
	var launch_y = date.getFullYear();
	var launch_m = (date.getMonth()) + 1;  // javascript does months with 0-11, hence the +1
	var launch_d = date.getDate();
/*
// test output of date conversions for debugging
	console.log('Date:' + date);
	console.log('Year' + launch_y);
	console.log('Month' + launch_m);
	console.log('Day' + launch_d);
*/
	var note = $('#note'),
		ts = (new Date(launch_y, launch_m - 1, launch_d));
		newYear = true;
	
	if((new Date()) > ts){
		ts = (new Date(launch_y, launch_m - 1, launch_d));
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
