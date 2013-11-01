/** JQuery Image Slider
    Nikolas Harris 200210310 
    This slider uses changes the attributes of the CSS rules and HTML attributes on click of the 
		'next' or 'previous' buttons.   
**/

$(document).ready(function() {

	//URL Paths for slide images
	var slidepaths = new Array();
	slidepaths[0] = 'images/githublink.jpg';
	slidepaths[1] = 'images/hovercarslide.jpg';
	slidepaths[2] = 'images/gluonslide.jpg';
	slidepaths[3] = 'images/projservslide.jpg';
	
	//URL paths for each slide to go to
	var slideDest = new Array();
	slideDest[0] = 'https://github.com/naddison';
	slideDest[1] = 'http://hovercardigital.com/';
	slideDest[2] = 'http://99.239.85.142/gluon/controller/index.php';
	slideDest[3] = 'projects.html';
	
	var position = 1;

        //if the next button is pressed
        $( '#next' ).on( 'click', function( event ) {
			if (position < 3) {
				position = position + 1;
			}
				else {
			position = 0;
			}
            $( '#slide' ).css('background-image', 'url(' +slidepaths[position]+ ')' );
			$( '#slidelink' ).attr("href", slideDest[position]);
			
		})		

	//if the previous button is pressed
        $( '#prev' ).on( 'click', function( event ) {
			if (position <= 0) {
				position = 3;
			}
			else {
				position = position - 1;
			}
			$( '#slide' ).css('background-image', 'url(' +slidepaths[position]+ ')' );
			$( '#slidelink' ).attr("href", slideDest[position]);
				   				
		})      
});
