jQuery(document).ready(function($) {
	if ( window.wdscolorbox.element !== undefined ) {
		if ( window.wdscolorbox.params !== undefined ) {
			$(wdscolorbox.element).colorbox(wdscolorbox.params);
		} else {
			$(wdscolorbox.element).colorbox();
		}
	}
});