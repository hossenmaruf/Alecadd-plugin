<?php

if (!define('WP_UNINSTALL_PLUGIN')) {
    die;
}


//clear the DB stored data

//    $books = get_post( array( 'post_type' => 'book', 'numberposts' => -1   )  );


//      foreach( $books as $book   ){
//         wp_delete_post( $book -> ID , true ) ;
//      } 


//clear the DB stored data

global $wpdb;

        $wpdb->query(" DELETE FROM wp_posts WHERE post_type = 'book' ");
        $wpdb->query(" DELETE FROM wp_postmeta WHERE post_id NOT IN ( SELECT id FROM wp_posts ) ");
        $wpdb->query(" DELETE FROM wp_term_relaionships WHERE object_id NOT IN ( SELECT id FROM wp_posts ) ");