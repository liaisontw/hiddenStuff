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

})( jQuery );


// Define the onclick action event.
function hiddenShowToggle(hiddenShowDivId) {
	
	var x = document.getElementById('hiddenShowDiv-' + hiddenShowDivId);
	
	if (x.style.display === "none") {
	  	x.style.display = "block";
		var insertedContent = document.querySelector(".insertedContent");
		if(insertedContent) {
			insertedContent.parentNode.removeChild(insertedContent);
		}
	} else {
	  	x.style.display = "none";
		var y = x.nextElementSibling;

		if (y) {
			// Using insertAdjacentHTML for HTML strings
    		y.insertAdjacentHTML('beforeend', '<span class ="insertedContent">Appended content to next sibling</span>');
		}    
	}
}
