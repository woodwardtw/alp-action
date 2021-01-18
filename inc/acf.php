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


function acf_fetch_phase(){
  global $post;
  $html = '';
  $phase = get_field('phase_alignment');

    if( $phase) {  
    $name = $phase->name;
    $slug = $phase->slug;

    $html = "<div class='phase {$slug}'><h3>{$name}</h3></div>";  
     return $html;    
    }

}



function acf_fetch_journey(){
  global $post;
  $html = '';
  $journey = get_field('journey_alignment');
    if( $journey) {  
    $name = $journey[0]->post_title;
    $url = $journey[0]->guid;
    $slug = $journey[0]->post_name;

    $html = "<div class='journey {$slug}'><h3>{$name}</h3></div>";  
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