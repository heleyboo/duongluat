<?php

/*  FAQ - Post Type Start */

add_action('init', 'duongluat_faqs', 0 );

function duongluat_faqs() {

    $faq_slug = 'faq';
    if ( get_option( 'faqs_section_slug') ) {
        $faq_slug = get_option( 'faqs_section_slug', 'faq' );
    }

    $faq_name = esc_html__('WP FAQS', 'duongluat');
    if ( get_option( 'faqs_section_name') ) {
        $faq_name = get_option( 'faqs_section_name', 'WP faqs' );
    }

    $args = array(
        'labels' => array(
            'name' => $faq_name,
            'add_new' => esc_html__('Add New', 'duongluat'),
            'edit_item' => esc_html__('Edit Item', 'duongluat'),
            'add_new_item' => esc_html__('Add New', 'duongluat'),
            'view_item' => esc_html__('View Item', 'duongluat'),
        ),
        'singular_label' => __('WP faq'),
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        '_builtin' => false,
        '_edit_link' => 'post.php?post=%d',
        'capability_type' => 'post',
        'hierarchical' => false,
        'supports' => array(
            'title',
            'editor',
            'author',
            'comments',
            'thumbnail',
            'excerpt',
            'revisions'
        ),
        'has_archive' => false,
        'rewrite' => array(
            'slug' => $faq_slug,
            'with_front' => false
        )
    );

    register_post_type( 'faq' , $args );

    /* --- Category: Custom Taxonomy --- */

    $faqs_category_title = esc_html__('FAQ Categories', 'duongluat');
    if ( get_option( 'faqs_category_title') ) {
        $faqs_category_title = get_option( 'faqs_category_title', 'FAQ Categories' );
    }

    $labels = array(
        'name' => $faqs_category_title,
        'singular_name' => $faqs_category_title,
        'search_items' => esc_html__('Find Taxonomy', 'duongluat'),
        'all_items' => esc_html__('All ', 'duongluat') . $faqs_category_title,
        'parent_item' => esc_html__('Parent Taxonomy', 'duongluat'),
        'parent_item_colon' => esc_html__('Parent Taxonomy:', 'duongluat'),
        'edit_item' => esc_html__('Edit Taxonomy', 'duongluat'),
        'view_item' => esc_html__('View Taxonomy', 'duongluat'),
        'update_item' => esc_html__('Update Taxonomy', 'duongluat'),
        'add_new_item' => esc_html__('Add New Taxonomy', 'duongluat'),
        'new_item_name' => esc_html__('Taxonomy', 'duongluat'),
        'menu_name' => $faqs_category_title
    );

    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_in_rest' => true,
        'show_tagcloud' => true,
        'show_admin_column' => true,
        'hierarchical' => true,
        'update_count_callback' => '',
        'rewrite' => true,
        'query_var' => '',
        'capabilities' => array(),
        '_builtin' => false
    );

    register_taxonomy('faq-category', 'faq', $args);

    // Add new taxonomy, NOT hierarchical (like tags)
    $labels = array(
        'name' => _x( 'Tags', 'taxonomy general name' ),
        'singular_name' => _x( 'Tag', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tags' ),
        'popular_items' => __( 'Popular Tags' ),
        'all_items' => __( 'All Tags' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Edit Tag' ),
        'update_item' => __( 'Update Tag' ),
        'add_new_item' => __( 'Add New Tag' ),
        'new_item_name' => __( 'New Tag Name' ),
        'separate_items_with_commas' => __( 'Separate tags with commas' ),
        'add_or_remove_items' => __( 'Add or remove tags' ),
        'choose_from_most_used' => __( 'Choose from the most used tags' ),
        'menu_name' => __( 'Tags' ),
    );

    register_taxonomy('tag','faq',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
    ));
}


/* --- Add custom slug for taxonomy 'faq-category' --- */

if ( get_option( 'faq_category_slug') ) {

    function duongluat_change_faq_category_slug( $taxonomy, $object_type, $args ) {

        $faq_category_slug = 'faq-category';

        if ( get_option( 'faq_category_slug') ) {
            $faq_category_slug = get_option( 'faq_category_slug', 'faq-category' );
        }

        if( 'faq-category' == $taxonomy ) {
            remove_action( current_action(), __FUNCTION__ );
            $args['rewrite'] = array( 'slug' => $faq_category_slug );
            register_taxonomy( $taxonomy, $object_type, $args );
        }

    }
    add_action( 'registered_taxonomy', 'duongluat_change_faq_category_slug', 10, 3 );

}