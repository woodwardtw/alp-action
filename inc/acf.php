<?php
/**
 * ACF 
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//challenges


function acf_fetch_challenge(){
  $html = '';
  $challenge = get_field('challenge_description');

    if( $challenge) {      
      $html = "<h2>Challenge</h2>" . $challenge;  
     return $html;    
    }

}





	//save acf json
		add_filter('acf/settings/save_json', 'activate_json_save_point');
		 
		function activate_json_save_point( $path ) {
		    
		    // update path
		    $path = get_stylesheet_directory() . '/acf-json'; //replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $path;
		    
		}


		// load acf json
		add_filter('acf/settings/load_json', 'activate_json_load_point');

		function activate_json_load_point( $paths ) {
		    
		    // remove original path (optional)
		    unset($paths[0]);
		    
		    
		    // append path
		    $paths[] = get_stylesheet_directory()  . '/acf-json';//replace w get_stylesheet_directory() for theme
		    
		    
		    // return
		    return $paths;
		    
		}