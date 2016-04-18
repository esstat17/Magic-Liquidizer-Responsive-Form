/*
* Plugin Name: Magic Liquidizer Responsive Form
* Plugin URI: http://www.innovedesigns.com/wordpress/magic-liquidizer-responsive-form-rwd-you-must-have-wp-plugin/
* Author: Elvin Deza
* Description: A simple and lightweight plugin that converts HTML form into responsive. After activation, go to Dashboard > * Appearance > Magic Liquidizer Responsive Form.
* Version: 1.0.3
* Tags: form, responsive, fluid
* Author URI: http://innovedesigns.com/author/esstat17
*/

(function($){
	$.fn.MagicLiquidizerForm = function(options){
   					var settings = $.extend({
            			form: '1',
            			breakpoint: '720',
            			whichelement: 'form'
        				}, options );       				
	return this.each(function() {
		
		function responsiveFormFn() {			 
			var viewwidth = $( window ).width();
    	/** Media screens **/
    		if (viewwidth < settings.breakpoint) {	// Form and Smartphone Screens 
    			$('html').addClass('rwd-form'); 		
    			if(settings.form=='1'){ $(settings.whichelement).addClass('ml-form' + ' ml-clearfix'); }			
    		} else {
    			$('html').removeClass('rwd-form');
    		     if(settings.form=='1'){ $(settings.whichelement).removeClass('ml-form' + ' ml-clearfix'); }	    
    		}		
  		} // responsiveFormFn()
  		$(window).resize(responsiveFormFn).ready(responsiveFormFn);	
	});  // each fn ends
	};  // MagicLiquidizer fn
   
}( jQuery ));