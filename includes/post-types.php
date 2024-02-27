<?php 

function register_bookinghub_post_type() {

    // Booking
    $labels = array(
        'name'               => 'Bookings',
        'singular_name'      => 'Booking',
        'menu_name'          => 'BookingHub',
        'name_admin_bar'     => 'Booking',
        'add_new'            => 'Add New',
        'add_new_item'       => 'Add New Booking',
        'new_item'           => 'New Booking',
        'edit_item'          => 'Edit Booking',
        'view_item'          => 'View Booking',
        'all_items'          => 'All Booking',
        'search_items'       => 'Search Booking',
        'parent_item_colon'  => 'Parent Booking:',
        'not_found'          => 'No bookings found.',
        'not_found_in_trash' => 'No bookings found in Trash.'
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'query_var'           => true,
        'menu_icon'           => 'dashicons-calendar',
        'rewrite'             => array( 'slug' => 'booking' ),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'supports'            => array( 'title' )
    );

    register_post_type( 'bhub-booking', $args );
    
    // Form
    $labels = array(
        'name'               => 'Form',
        'singular_name'      => 'Form',
    );

    $args = array(
        'labels'              => $labels,
        'public'              => false,
        'publicly_queryable'  => false,
        'show_ui'             => true,
        'show_in_menu'        => false,
        'query_var'           => true,
        'menu_icon'           => 'dashicons-calendar',
        'rewrite'             => array( 'slug' => 'booking' ),
        'capability_type'     => 'post',
        'has_archive'         => false,
        'hierarchical'        => false,
        'supports'            => array( 'title' )
    );

    register_post_type( 'bhub-form', $args );
}

add_action( 'init', 'register_bookinghub_post_type' );
