// Foundation JavaScript
// Documentation can be found at: http://foundation.zurb.com/docs
$(document).foundation({
	orbit: {
		animation: 'fade', // Sets the type of animation used for transitioning between slides, can also be 'fade'
		timer_speed: 7000, // Sets the amount of time in milliseconds before transitioning a slide
		pause_on_hover: true, // Pauses on the current slide while hovering
		resume_on_mouseout: true, // If pause on hover is set to true, this setting resumes playback after mousing out of slide
		animation_speed: 500, // Sets the amount of time in milliseconds the transition between slides will last
		slide_number: false,
		navigation_arrows: false,
		swipe: true,
		bullets: false
	}});

	// grab an element
	var myElement = document.getElementById("header");
	// construct an instance of Headroom, passing the element
	var headroom  = new Headroom(myElement);
	// initialise
	headroom.init(); 




// Open Coach Profiles

$('.project-item').click(function () {

	var projectID = '#' + $(this).data('project-id');
	
	$('.project').hide();
	
	$(projectID).show();

	$('html, body').animate({
		scrollTop: $(projectID).offset().top - 76
	}, 600);

});
// close coach profiles

$('.project-close').click(function () {

	$(this).closest('.project').hide();

	$('html, body').animate({
		scrollTop: $('#our-team').offset().top - 76
	}, 600);

});

// //  Contact form

$( "#contact" ).submit(function( event ) {
	console.log('contact script submit');
	$(this).each(function(){
		var count = $(this).find(':input[data-invalid]').length;
		if (count === 0) {
			
			var url = "./php/form.php";
			var data = $(this).serialize();
			var success = $(this).append( "<p>Thank You! Your message has been sent.</p>" );

		$.ajax({
			type: "POST",
			url: url,
			data: data,
			success: success
		});

		}
	});

	event.preventDefault();

});

function submitForm(){
	//$(this).each(function(){
		//var count = $(this).find(':input[data-invalid]').length;
		//if (count === 0) {
	var url = "./php/form.php";
	var data  = {};
	$("#week").find(":input").each(function() {
	// The selector will match buttons; if you want to filter
	// them out, check `this.tagName` and `this.type`; see
	// below	
	if($(this).attr("type")==="checkbox"){
		data[this.name] = $(this).prop('checked');
	}
	else{
		data[this.name] = $(this).val();
	}
	});
    data.recaptcha = grecaptcha.getResponse();
    console.log(data);
	var success = $("#sucmessage").append( "<p>Thank You! Your message has been sent. You can reach Coach Paul at (416) 707-8850 with any questions, and he will be in contact with you this week to confirm your registration and collect your payment.</p>" );

			$.ajax({
				type: "POST",
				url: url,
				data: data,
				success: success
			});
}

// // Add camper function
function addCamper(){
	document.getElementById('kid-two').style.display = 'block';
	document.getElementById('add-camper').style.display = 'none';
}

