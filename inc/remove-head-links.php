<?php
remove_action( 'wp_head', 'feed_links_extra', 3 ); // Display the links to the extra feeds such as category feeds
remove_action( 'wp_head', 'feed_links', 2 ); // Display the links to the general feeds: Post and Comment Feed
remove_action( 'wp_head', 'rsd_link' ); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action( 'wp_head', 'wlwmanifest_link' ); // Display the link to the Windows Live Writer manifest file.
remove_action( 'wp_head', 'index_rel_link' ); // index link
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 ); // prev link
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 ); // start link
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); // Display relational links for the posts adjacent to the current post.
remove_action( 'wp_head', 'wp_generator' ); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action( 'wp_head', 'wp_oembed_add_discovery_links' ); // Display json+oembed link.
// Below is for The Events Calendar
function remove_single_event_feed_links() {
    if ( ! class_exists( 'Tribe__Events__Main' ) ) {
        return;
    }
    // Add / Uncomment these lines if you only want them removed on the single event pages.
    // if ( ! is_singular( Tribe__Events__Main::POSTTYPE ) ) {
    //     return;
    // }
    remove_theme_support( 'automatic-feed-links' );
    
    // Add / Uncomment this line to re-enable support for just Posts
    // add_theme_support( 'automatic-feed-links', array( 'post' ) );
}
add_action( 'after_setup_theme', 'remove_single_event_feed_links', 11 );