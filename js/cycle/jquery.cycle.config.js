// Publishers reference at http://jquery.malsup.com/cycle/options.html
// or view wonderflux/wf-content/js/cycle/jquery-cycle-readme.txt

jQuery.noConflict();
jQuery(document).ready(function($) {

	$('.wfx-cycle.slideshow-1').cycle({
		speed: 2000,  // speed of the transition (any valid fx speed value)
		timeout: 6000,  // milliseconds between slide transitions (0 to disable auto advance)
	});

});