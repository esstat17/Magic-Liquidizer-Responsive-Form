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

function liquidizer_form_uninstall() {

if ( ! current_user_can( 'activate_plugins' ) )
        return;
     check_admin_referer( 'bulk-plugins' );
if ( __FILE__ != WP_UNINSTALL_PLUGIN )
        return;           

// For Single site
if ( !is_multisite() ) 
{
    delete_option('liquidizer_lite_wp_form');
	delete_option('liquidizer_lite_wp_which_form_element');
	delete_option('liquidizer_lite_wp_form_width');
} 
// For Multisite
else 
{
    // For regular options.
    global $wpdb;
    $blog_ids = $wpdb->get_col( "SELECT blog_id FROM $wpdb->blogs" );
    $original_blog_id = get_current_blog_id();
    foreach ( $blog_ids as $blog_id ) 
    {
        switch_to_blog( $blog_id );
        delete_option('liquidizer_lite_wp_form');
		delete_option('liquidizer_lite_wp_which_form_element');
		delete_option('liquidizer_lite_wp_form_width');   
    }
    switch_to_blog( $original_blog_id );

    // For site options.
    // delete_site_option( $option_name );  
}

}
