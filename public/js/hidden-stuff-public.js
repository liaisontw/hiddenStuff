(function( $ ) {
	'use strict';

	/**
	 * All of the code for your public-facing JavaScript source
	 * should reside in this file.
	 *
	 * Note: It has been assumed you will write jQuery code here, so the
	 * $ function reference has been prepared for usage within the scope
	 * of this function.
	 *
	 * This enables you to define handlers, for when the DOM is ready:
	 *
	 * $(function() {
	 *
	 * });
	 *
	 * When the window is loaded:
	 *
	 * $( window ).load(function() {
	 *
	 * });
	 *
	 * ...and/or other possibilities.
	 *
	 * Ideally, it is not considered best practise to attach more than a
	 * single DOM-ready or window-load handler for a particular page.
	 * Although scripts in the WordPress core, Plugins and Themes may be
	 * practising this, we should strive to set a better example in our own work.
	 */

	// Check if the document is ready.
    // $( function() {

    //     // For each "read more" element, i.e., review...
    //     $( ".hidden-show" ).each( function(){
    //         // Display the Read More button.
    //         $( this ).show();
    //     });
    // });

})( jQuery );

// Define the onclick action event for the Read More button.
function hiddenShowButton($hiddenShowDivId){
	var x = document.getElementById("hidden-show-wrap");
	if (x.style.display === "none") {
	  x.style.display = "block";
	} else {
	  x.style.display = "none";
	}
}

// Define the onclick action event.
function hiddenShowToggle(hiddenShowDivId) {
	
	//var x = jQuery( '#hiddenShowDiv' );
	//const $x = $('#hiddenShowDiv');
	var x = document.getElementById('hiddenShowDiv-' + hiddenShowDivId);
	//var divId = 'hiddenShowDiv-' + $hiddenShowDivId;
	//var x = document.getElementById(divId);
	if (x.style.display === "none") {
	  	x.style.display = "block";
		var insertedContent = document.querySelector(".insertedContent");
		if(insertedContent) {
			insertedContent.parentNode.removeChild(insertedContent);
		}
	} else {
	  	x.style.display = "none";
		//var y = document.getElementById("hidden-show-wrap-end");
		//y.appendChild('#hidden-show-wrap');
		var y = x.nextElementSibling;

		if (y) {
			// Using insertAdjacentHTML for HTML strings
    		y.insertAdjacentHTML('beforeend', '<span class ="insertedContent">Appended content to next sibling</span>');
		}
    
		//x.next('.hidden-show-wrap-end').append('#hidden-show-wrap');
		//var textToggle          = jQuery( '#rmwp-toggle-' + rmwpID );
		//var buttonWrap          = jQuery( '#rmwp-button-wrap-' + rmwpID );
		//textToggle.next( '.rmwp-toggle-end' ).append( buttonWrap );
	}
}
