<?php
defined( 'ABSPATH' ) OR exit;

/*
/--------------------------------------------------------------------\
|                                                                    |
| License: GLP Version 3                                             |
|                                                                    |
| Magic Liquidizer Responsive Form - Make HTML Form Responsive.    |
| Copyright (C) 2014, Elvin Deza,                                    |
| http://innovedesigns.com/                                          |
| All rights reserved.                                               |
|                                                                    |
| By using the software, you agree to be bound by the terms of		 | 		
| this license.														 |
| 																	 |
|                                                                    |
\--------------------------------------------------------------------/
*/

if (!function_exists('liquidizer_form_activation')) {
	function liquidizer_form_activation() {
		if(!current_user_can( 'activate_plugins' )) { 
			echo 'You have no permission to activate this plugin';
			exit();
		} else { 
		
			$liquidizer_lite_options = array(
			'liquidizer_lite_wp_form' => '1',
			'liquidizer_lite_wp_which_form_element' => 'form',
			'liquidizer_lite_wp_form_width' => '780');
		
	/* Handling variable array */	
			foreach($liquidizer_lite_options as $x=>$x_value) {
				if ( get_option( $x ) !== false ) {
					update_option($x, $x_value);
				} else {			
					add_option( $x, $x_value, '', 'yes' );
				}
			}
		
		} // else	
	}
}	

