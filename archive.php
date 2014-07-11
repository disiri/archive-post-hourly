<?php

/**
 * Auto archive Posted Ads
 *
 * @version 1.0
 * @author Desiree Anne Q. Banua
 *
 * @package
 *
 **/



add_action( 'auto_archive_hook', 'auto_archive' );
/**
* Auto archive Posted Ads
*
* @since 1.0
*/

function auto_archive() {
	
	$ads = get_posted_ads();
	
	if( ! empty( $ads ) ) :

		foreach( $ads as $key=>$expiration ) :

			$current_day = date("F j, Y");

			if( strtotime( $current_day ) > strtotime( $expiration ) ) :

				$update_post = array(

					'ID'        => $key,
			    'post_type' => 'archive'
			  	
			  	);

				$postId = wp_update_post( $update_post );	
			
			endif;
			

		endforeach;
		
	endif;

}


/**
 * Get past shows
 *
 * @since 1.0
 * @return array $show_data data of shows
 */

function get_posted_ads() {
	
	date_default_timezone_set('America/Los_Angeles');
	
	$args = array( 'post_type' => 'post', 'posts_per_page' => 999999 );
	
	$posts = get_posts( $args );
	
	$args = array();
	$expiration = array();
	//return $show_data;
	foreach($posts as $post) {

		$meta = get_post_meta( $ad->ID, 'expiration' );
		$expiration[$ad->ID] = $meta[0];

	}
	
	return $expiration;
}



?>
