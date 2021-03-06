<?php
/**
 * ACF 
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

//home

function activate_home_journey_repeater(){
	$html = '';
	if( have_rows('journeys') ):

	    // Loop through rows.
	    while( have_rows('journeys') ) : the_row();

	        // Load sub field value.
	        $index = get_row_index();
	        $journey = get_sub_field('journey');
	        $description = get_sub_field('journey_description');
	        $title = $journey->post_title;
	        $link = get_the_permalink($journey->ID);//$journey->guid;
	        $img = get_template_directory_uri() . '/imgs/badge-' . $journey->post_name .'.svg';
	        //var_dump($journey);
	        if($index % 2 == 0){
	        	 $html .= "<div class='row home-journeys'><div class='col-md-5'><a href='{$link}'><img src='{$img}' class='img-fluid journey-home-img' alt='{$title} icon.'></a></div><div class='col-md-7 home-text'><a href='{$link}'><h2>{$title}</h2></a>{$description}</div></div>";
	        // Do something...
	        	} else {
	        		 $html .= "<div class='row home-journeys'><div class='col-md-7 home-text'><a href='{$link}'><h2>{$title}</h2></a>{$description}</div><div class='col-md-5 '><a href='{$link}'><img src='{$img}' class='img-fluid journey-home-img' alt='{$title} icon.'></a></div></div>";
	        // Do something...
	        	}
	       
	    // End loop.
	    endwhile;
	    return $html;
		// No value.
		else :
		    // Do something...
		endif;
	}




//journeys


function acf_fetch_challenge(){
  $html = '';
  $challenge = get_field('challenge_description');

    if( $challenge) {      
      $html = "<h2 class='center-label'>Challenge</h2>" . $challenge;  
     return $html;    
    }

}

function acf_fetch_supporting_resources(){
	$html = '';
	$resources = get_field('supporting_resources');
    if( $resources) {      
      $html = "<div class='supporting-resources'><h3>Supporting Resources</h3>{$resources}</div>";  
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
    $url =  get_the_permalink($journey[0]->ID);
    $slug = $journey[0]->post_name;

    $html = "<h3>Journey</h3><a href='{$url}' aria-label='See more {$name} work'><div class='journey-icon {$slug}'></div></a>";  
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
	        if(get_the_post_thumbnail_url($post->ID,'medium')){
		        $image = get_the_post_thumbnail_url($post->ID,'medium');	        
		        $img_full = "<img src='{$image}' class='challenge-image img-fluid'>";
	        } else if (activate_find_youtube(get_the_content())){
	        	 $url = activate_find_youtube(get_the_content());
	        	 $image = $url;
	        	 $img_full = "<img src='{$image}' class='challenge-image img-fluid'>";
	        } else {
	        	$num = rand(1,7);
	        	$url = get_template_directory_uri();
	        	$img_full = "<img src='{$url}/imgs/idea_{$num}.svg' class='challenge-image img-fluid svg-default'>";
	        }
	        $html .= "<div class='col-md-4'><div class='image-response'><a href='{$link}'>{$img_full}<h3>{$title}</h3></a></div></div>";
	    }
	    echo $html;
	} else {
	    // no posts found
	}
	/* Restore original Post Data */
	wp_reset_postdata();
}


function activate_find_youtube($content){
	//from https://stackoverflow.com/a/6121972/3390935
	if(preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $content, $matches)){
		 preg_match("#(?<=v=)[a-zA-Z0-9-]+(?=&)|(?<=v\/)[^&\n]+(?=\?)|(?<=v=)[^&\n]+|(?<=youtu.be/)[^&\n]+#", $content, $matches);
    	//var_dump($matches[0]);
    	return "https://img.youtube.com/vi/{$matches[0]}/hqdefault.jpg";
	} else {
		return FALSE;
	}
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
		$html .= "<div class='col-md-12 journey-resource' id='resources-div'><h2 class='center-label'>Resources</h2></>";
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
		$html .= "<div class='col-md-12' id='expert-div'><h2 class='center-label'>Experts</h2></></div>";
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
		$html .= "<div class='col-md-12 journey-challenges' id='challenge-div'><h2 class='center-label'>Try a Challenge!</h2></div>";
	    while ( $sub_query->have_posts() ) {
	        $sub_query->the_post();
	        $title = get_the_title();
	        $link = get_the_permalink();
	        $image = get_the_post_thumbnail_url($post->ID,'medium');
	        $journey = get_field('journey_alignment', $post->ID);
	        $cats = array();
	        foreach ($journey as $key => $journey_cat) {
	        	 array_push($cats, $journey_cat->post_name);
	        }	      
	        if (in_array($journey_name, $cats)){
	        	 $html .= "<div class='col-md-4'><div class='image-response'><a href='{$link}'><img src='{$image}' class='challenge-image img-fluid'><h3>{$title}</h3></a></div></div>";
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