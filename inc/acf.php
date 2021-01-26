<?php
/**
 * ACF 
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//journeys


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
  $phase = get_field('phase_alignment',$post->ID);

    if( $phase) {  
    $name = $phase->name;
    $slug = $phase->slug;
    $url = get_term_link($phase->term_id);
    //var_dump($url);

    $html = "<h3>Phase</h3><a href='{$url}' aria-label='See more {$name} work'><div class='phase-icon {$slug}'></div></a>";  
     return $html;    
    }

}



function acf_fetch_journey(){
  global $post;
  $html = '';
  $journey = get_field('journey_alignment', $post->ID);
    if( $journey) {  
    $name = $journey[0]->post_title;
    $url = $journey[0]->guid;
    $slug = $journey[0]->post_name;

    $html = "<h3>Journey</h3><a href='#' aria-label='See more {$name} work'><div class='journey-icon {$slug}'></div></a>";  
     return $html;    
    }

}


function acf_fetch_submission_path(){
  $html = '';
  $submission_path = get_field('submission_path');
    if( $submission_path) {      
      $html = $submission_path;  
     return $html;    
    }

}

function activate_show_challenge_submissions(){
	global $post;
	$challenge_name = $post->post_name;
	$html = '';
	$args = array( 
		'post_type' => 'post',
		'tag' => $challenge_name,
		'posts_per_page' => 12, 
    	'nopaging' => false, 
    	'paged' => get_query_var('paged'), 
	);

	$module_query = new WP_Query( $args );
	if ( $module_query->have_posts() ) {
		$html .= "<div class='col-md-12'><h2>Challenge Answered!</h2></div>";
	    while ( $module_query->have_posts() ) {
	        $module_query->the_post();
	        $title = get_the_title();
	        $link = get_the_permalink();
	        $image = get_the_post_thumbnail_url($post->ID,'medium');
	        $html .= "<div class='col-md-4 image-response'><a href='{$link}'><img src='{$image}' class='challenge-image img-fluid'><h3>{$title}</h3></a></div>";
	    }
	    echo $html;
	} else {
	    // no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}

//JOURNEY

function acf_fetch_journey_description(){
  global $post;
  $html = '';
  $journey_description = get_field('journey_description');

    if( $journey_description) {      
      $html = $journey_description;  
     return $html;    
    }

}


function activate_resource_repeater(){
	$html = '';
	if( have_rows('resources') ):
		$html .= "<div class='col-md-12 journey-resource'><h2 class='center-label'>Resources</h2></>";
	    // Loop through rows.
	    while( have_rows('resources') ) : the_row();

	        // Load sub field value.
	        $title = get_sub_field('resource_title');
	        $link = get_sub_field('resource_link');
	        $description = get_sub_field('resource_description');
	        $html .= "<div class='resource-item'><h3><a href='{$link}'>{$title}</a></h3> {$description}</div>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html . '</div>';
		// No value.
		else :
		    // Do something...
		endif;
	}


function activate_expert_repeater(){
	$html = '';
	if( have_rows('experts') ):
		$html .= "<div class='col-md-12'><h2 class='center-label'>Experts</h2></></div>";
	    // Loop through rows.
	    while( have_rows('experts') ) : the_row();

	        // Load sub field value.
	        $name = get_sub_field('expert_name');
	      	$description = get_sub_field('expert_description');
	      	$image = get_sub_field('expert_image')['sizes']['medium'];
	      	$twitter = get_sub_field('twitter');
	      	$page = get_sub_field('personal_site');
	      	if($twitter){
	      		$twit = "<a href='{$twitter}' class='twitter' aria-label='Twitter account for {$name}'></a>";
	      	} else {
	      		$twit = '';
	      	}
	      	if($page){
	      		$homepage = "<a href='{$page}' class='homepage' aria-label='Homepage account for {$name}'></a>";
	      	} else {
	      		$homepage = '';
	      	}

	        $html .= "<div class='col-md-4'><div class='expert-item'><img src='{$image}' class='img-fluid expert-bio'><h3>{$name}</h3> <p>{$description}</p><div class='expert-social'>{$twit}{$homepage}</div></div></div>";
	        // Do something...
	    // End loop.
	    endwhile;
	    return $html;
		// No value.
		else :
		    // Do something...
		endif;
	}


function activate_show_journey_submissions(){
	global $post;
	$journey_name = $post->post_name;
	$html = '';
	$args = array( 
		'post_type' => 'challenge',
		'posts_per_page' => -1, 
    	'nopaging' => true,     	
	);

	$sub_query = new WP_Query( $args );
	if ( $sub_query->have_posts() ) {
		$html .= "<div class='col-md-12 journey-challenges'><h2 class='center-label'>Challenges Answered!</h2></div>";
	    while ( $sub_query->have_posts() ) {
	        $sub_query->the_post();
	        $title = get_the_title();
	        $link = get_the_permalink();
	        $image = get_the_post_thumbnail_url($post->ID,'medium');
	        $journey = get_field('journey_alignment', $post->ID)[0]->post_name;

	        if ($journey === $journey_name){
	        	 $html .= "<div class='col-md-4 image-response'><a href='{$link}'><img src='{$image}' class='challenge-image img-fluid'><h3>{$title}</h3></a></div>";
	        }
	    }
	    echo $html;
	} else {
	    // no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}







//gravity forms - note that the advanced post creation plugin is turned on

//SOLELY FOR AUTO TAGGING SUBMISSIONS WITH THE TITLE OF THE CHALLENGE PAGE THEY ARE ON
add_filter( 'gform_field_value_challenge_tag', 'activate_add_challenge_tag' );

function activate_add_challenge_tag(){
	//challenge_tag
	global $post;
	return get_the_title($post->ID);
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