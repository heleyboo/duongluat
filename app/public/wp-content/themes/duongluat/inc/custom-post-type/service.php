<?php

/*  Services - Post Type Start */

add_action('init', 'duongluat_services', 0 );

function duongluat_services() {

    $service_slug = 'service';
    if ( get_option( 'services_section_slug') ) {
        $service_slug = get_option( 'services_section_slug', 'service' );
    }

    $service_name = esc_html__('WP services', 'duongluat');
    if ( get_option( 'services_section_name') ) {
        $service_name = get_option( 'services_section_name', 'WP services' );
    }

    $args = array(
        'labels' => array(
            'name' => $service_name,
            'add_new' => esc_html__('Add New', 'duongluat'),
            'edit_item' => esc_html__('Edit Item', 'duongluat'),
            'add_new_item' => esc_html__('Add New', 'duongluat'),
            'view_item' => esc_html__('View Item', 'duongluat'),
        ),
        'singular_label' => __('WP service'),
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
            'slug' => $service_slug,
            'with_front' => false
        )
    );

    register_post_type( 'service' , $args );

    /* --- Category: Custom Taxonomy --- */

    $services_category_title = esc_html__('Categories', 'duongluat');
    if ( get_option( 'services_category_title') ) {
        $services_category_title = get_option( 'services_category_title', 'Categories' );
    }

    $labels = array(
        'name' => $services_category_title,
        'singular_name' => $services_category_title,
        'search_items' => esc_html__('Find Taxonomy', 'duongluat'),
        'all_items' => esc_html__('All ', 'duongluat') . $services_category_title,
        'parent_item' => esc_html__('Parent Taxonomy', 'duongluat'),
        'parent_item_colon' => esc_html__('Parent Taxonomy:', 'duongluat'),
        'edit_item' => esc_html__('Edit Taxonomy', 'duongluat'),
        'view_item' => esc_html__('View Taxonomy', 'duongluat'),
        'update_item' => esc_html__('Update Taxonomy', 'duongluat'),
        'add_new_item' => esc_html__('Add New Taxonomy', 'duongluat'),
        'new_item_name' => esc_html__('Taxonomy', 'duongluat'),
        'menu_name' => $services_category_title
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

    register_taxonomy('service-category', 'service', $args);

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

    register_taxonomy('tag','service',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
    ));
}

/* --- Add meta box for service --- */

add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );

function prefix_register_meta_boxes( $meta_boxes ) {
    $prefix = 'service_';
    $meta_boxes[] = array(
        'title'      => 'service information',
        'post_types' => 'service',
        'fields' => array(
            array(
                'name'  => 'Download link',
                'desc'  => 'Direct download link for the service',
                'id'    => $prefix . 'link_download',
                'type'  => 'string',
            ),
            array(
                'name'  => 'Demo link',
                'desc'  => 'Demo link for the service',
                'id'    => $prefix . 'link_demo',
                'type'  => 'string',
            ),
            array(
                'name'  => 'Download Id',
                'desc'  => 'Simple Download Monitoring ID',
                'id'    => $prefix . 'download_id',
                'type'  => 'string',
            )
        )
    );

    return $meta_boxes;
}

/* --- Add custom slug for taxonomy 'service-category' --- */

if ( get_option( 'service_category_slug') ) {

    function duongluat_change_service_category_slug( $taxonomy, $object_type, $args ) {

        $service_category_slug = 'service-category';

        if ( get_option( 'service_category_slug') ) {
            $service_category_slug = get_option( 'service_category_slug', 'service-category' );
        }

        if( 'service-category' == $taxonomy ) {
            remove_action( current_action(), __FUNCTION__ );
            $args['rewrite'] = array( 'slug' => $service_category_slug );
            register_taxonomy( $taxonomy, $object_type, $args );
        }

    }
    add_action( 'registered_taxonomy', 'duongluat_change_service_category_slug', 10, 3 );

}


/*  services - Post Type End */


/*  services - Additional Fields Start */

add_action( 'admin_init', 'duongluat_services_fields' );

function duongluat_services_fields() {
    add_meta_box( 'duongluat_services_meta_box',
        esc_html__( 'Additional information', 'duongluat' ),
        'duongluat_services_display_meta_box',
        'service', 'side', 'high'
    );
}

function duongluat_services_display_meta_box( $service ) {

    wp_nonce_field( 'duongluat_services_box', 'duongluat_services_nonce' );
    $service_short_desc = get_post_meta( $service->ID, 'service_short_desc', true );
    $service_terms_desc = get_post_meta( $service->ID, 'service_terms_desc', true );
    $service_demo_link = get_post_meta( $service->ID, 'service_demo_link', true );
    $service_allowed_html = array(
        'a' => array(
            'href' => true,
            'title' => true,
            'target' => true,
            'rel' => true
        ),
        'img' => array(
            'src' => true,
            'alt' => true
        ),
        'br' => array(),
        'em' => array(),
        'strong' => array(),
        'span' => array(
            'class' => true
        ),
        'div' => array(
            'class' => true
        ),
        'p' => array()
    );
    ?>

    <div class="components-base-control service_short_desc">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="service_short_desc-0"><?php esc_html_e( 'Short description', 'duongluat' ); ?></label>
            <textarea class="components-textarea-control__input" id="service_short_desc-0" rows="4" name="service_short_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($service_short_desc, $service_allowed_html); ?></textarea>
        </div>
    </div>

    <div class="components-base-control service_terms_desc">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="service_terms_desc-0"><?php esc_html_e( 'Promotional description', 'duongluat' ); ?></label>
            <textarea class="components-textarea-control__input" id="service_terms_desc-0" rows="8" name="service_terms_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($service_terms_desc, $service_allowed_html); ?></textarea>
        </div>
    </div>

    <div class="components-base-control service_demo_link">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="service_demo_link-0"><?php esc_html_e( 'External URL', 'duongluat' ); ?> </label>
            <input type="url" name="service_demo_link" id="service_demo_link-0" value="<?php echo esc_url($service_demo_link); ?>" style="display: block; margin-bottom: 10px;" />
        </div>
    </div>
    <?php
}

add_action( 'save_post', 'duongluat_services_save_fields', 10, 2 );

function duongluat_services_save_fields( $post_id ) {

    if ( ! isset( $_POST['duongluat_services_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['duongluat_services_nonce'];

    if ( ! wp_verify_nonce( $nonce, 'duongluat_services_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'service' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    $service_short_desc = $_POST['service_short_desc'];
    update_post_meta( $post_id, 'service_short_desc', $service_short_desc );

    $service_terms_desc = $_POST['service_terms_desc'];
    update_post_meta( $post_id, 'service_terms_desc', $service_terms_desc );

    $service_demo_link = esc_url( $_POST['service_demo_link'] );
    update_post_meta( $post_id, 'service_demo_link', $service_demo_link );
}

/*  services - Additional Fields End */

/*  services - Ratings Start */

add_action( 'admin_init', 'duongluat_services_ratings_fields' );

function duongluat_services_ratings_fields() {

    add_meta_box( 'duongluat_services_ratings_meta_box',
        esc_html__( 'service Ratings', 'duongluat' ),
        'duongluat_services_ratings_display_meta_box',
        'service', 'side', 'high'
    );
}

function duongluat_services_ratings_display_meta_box( $service ) {

    wp_nonce_field( 'duongluat_services_ratings_box', 'duongluat_services_ratings_nonce' );
    $meta = get_post_meta( $service->ID );

    $service_rating_trust = ( isset( $meta['service_rating_trust'][0] ) && '' !== $meta['service_rating_trust'][0] ) ? $meta['service_rating_trust'][0] : '';
    $service_rating_coupons = ( isset( $meta['service_rating_coupons'][0] ) && '' !== $meta['service_rating_coupons'][0] ) ? $meta['service_rating_coupons'][0] : '';
    $service_rating_bonus = ( isset( $meta['service_rating_bonus'][0] ) && '' !== $meta['service_rating_bonus'][0] ) ? $meta['service_rating_bonus'][0] : '';
    $service_rating_customer = ( isset( $meta['service_rating_customer'][0] ) && '' !== $meta['service_rating_customer'][0] ) ? $meta['service_rating_customer'][0] : '';

    ?>

    <style type="text/css">
        .duongluat-single-rating-box {
            padding-bottom: 10px;
        }
        .duongluat-single-rating-box label {
            padding-right: 12px;
        }
        .duongluat-single-rating-box label:last-child {
            padding-right: 0;
        }
        .duongluat-single-rating-box label input[type=radio] {
            margin-right: 0 !important;
        }
    </style>

    <div class="components-base-control service_rating_trust">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_1_title = get_option( 'rating_1' );
                if ( $rating_1_title ) {
                    echo esc_html($rating_1_title);
                } else {
                    esc_html_e( 'Trust & Fairness', 'duongluat' );
                } ?>
            </label>
            <div class="duongluat-single-rating-box">
                <label>
                    <input type="radio" name="service_rating_trust" value="1" <?php checked( $service_rating_trust, '1' ); ?>>
                    <?php esc_attr_e( '1', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_trust" value="2" <?php checked( $service_rating_trust, '2' ); ?>>
                    <?php esc_attr_e( '2', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_trust" value="3" <?php checked( $service_rating_trust, '3' ); ?>>
                    <?php esc_attr_e( '3', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_trust" value="4" <?php checked( $service_rating_trust, '4' ); ?>>
                    <?php esc_attr_e( '4', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_trust" value="5" <?php checked( $service_rating_trust, '5' ); ?>>
                    <?php esc_attr_e( '5', 'duongluat' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control service_rating_coupons">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_2_title = get_option( 'rating_2' );
                if ( $rating_2_title ) {
                    echo esc_html($rating_2_title);
                } else {
                    esc_html_e( 'coupons & Software', 'duongluat' );
                } ?>
            </label>
            <div class="duongluat-single-rating-box">
                <label>
                    <input type="radio" name="service_rating_coupons" value="1" <?php checked( $service_rating_coupons, '1' ); ?>>
                    <?php esc_attr_e( '1', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_coupons" value="2" <?php checked( $service_rating_coupons, '2' ); ?>>
                    <?php esc_attr_e( '2', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_coupons" value="3" <?php checked( $service_rating_coupons, '3' ); ?>>
                    <?php esc_attr_e( '3', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_coupons" value="4" <?php checked( $service_rating_coupons, '4' ); ?>>
                    <?php esc_attr_e( '4', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_coupons" value="5" <?php checked( $service_rating_coupons, '5' ); ?>>
                    <?php esc_attr_e( '5', 'duongluat' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control service_rating_bonus">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_3_title = get_option( 'rating_3' );
                if ( $rating_3_title ) {
                    echo esc_html($rating_3_title);
                } else {
                    esc_html_e( 'Bonuses & Promotions', 'duongluat' );
                } ?>
            </label>
            <div class="duongluat-single-rating-box">
                <label>
                    <input type="radio" name="service_rating_bonus" value="1" <?php checked( $service_rating_bonus, '1' ); ?>>
                    <?php esc_attr_e( '1', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_bonus" value="2" <?php checked( $service_rating_bonus, '2' ); ?>>
                    <?php esc_attr_e( '2', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_bonus" value="3" <?php checked( $service_rating_bonus, '3' ); ?>>
                    <?php esc_attr_e( '3', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_bonus" value="4" <?php checked( $service_rating_bonus, '4' ); ?>>
                    <?php esc_attr_e( '4', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_bonus" value="5" <?php checked( $service_rating_bonus, '5' ); ?>>
                    <?php esc_attr_e( '5', 'duongluat' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control service_rating_customer">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_4_title = get_option( 'rating_4' );
                if ( $rating_4_title ) {
                    echo esc_html($rating_4_title);
                } else {
                    esc_html_e( 'Customer Support', 'duongluat' );
                } ?>
            </label>
            <div class="duongluat-single-rating-box">
                <label>
                    <input type="radio" name="service_rating_customer" value="1" <?php checked( $service_rating_customer, '1' ); ?>>
                    <?php esc_attr_e( '1', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_customer" value="2" <?php checked( $service_rating_customer, '2' ); ?>>
                    <?php esc_attr_e( '2', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_customer" value="3" <?php checked( $service_rating_customer, '3' ); ?>>
                    <?php esc_attr_e( '3', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_customer" value="4" <?php checked( $service_rating_customer, '4' ); ?>>
                    <?php esc_attr_e( '4', 'duongluat' ); ?>
                </label>
                <label>
                    <input type="radio" name="service_rating_customer" value="5" <?php checked( $service_rating_customer, '5' ); ?>>
                    <?php esc_attr_e( '5', 'duongluat' ); ?>
                </label>
            </div>
        </div>
    </div>

    <?php
}

add_action( 'save_post', 'duongluat_services_ratings_save_fields', 10, 2 );

function duongluat_services_ratings_save_fields( $post_id ) {

    if ( ! isset( $_POST['duongluat_services_ratings_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['duongluat_services_ratings_nonce'];

    if ( ! wp_verify_nonce( $nonce, 'duongluat_services_ratings_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'service' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    if ( isset( $_POST['service_rating_trust'] ) ) {
        update_post_meta( $post_id, 'service_rating_trust', sanitize_text_field( wp_unslash( $_POST['service_rating_trust'] ) ) );
    }

    if ( isset( $_POST['service_rating_coupons'] ) ) {
        update_post_meta( $post_id, 'service_rating_coupons', sanitize_text_field( wp_unslash( $_POST['service_rating_coupons'] ) ) );
    }

    if ( isset( $_POST['service_rating_bonus'] ) ) {
        update_post_meta( $post_id, 'service_rating_bonus', sanitize_text_field( wp_unslash( $_POST['service_rating_bonus'] ) ) );
    }

    if ( isset( $_POST['service_rating_customer'] ) ) {
        update_post_meta( $post_id, 'service_rating_customer', sanitize_text_field( wp_unslash( $_POST['service_rating_customer'] ) ) );
    }

    if ( !wp_is_post_revision( $post_id ) ) {

        $service_rating_trust = get_post_meta( $post_id, 'service_rating_trust', true );
        $service_rating_coupons = get_post_meta( $post_id, 'service_rating_coupons', true );
        $service_rating_bonus = get_post_meta( $post_id, 'service_rating_bonus', true );
        $service_rating_customer = get_post_meta( $post_id, 'service_rating_customer', true );

        $service_ratings_all = array(
            $service_rating_trust,
            $service_rating_coupons,
            $service_rating_bonus,
            $service_rating_customer
        );

        $service_overall_rating = esc_html(array_sum($service_ratings_all)/count($service_ratings_all));

        if (is_float($service_overall_rating)) { $service_overall_rating = number_format($service_overall_rating,1); }

        update_post_meta($post_id, 'service_overall_rating', $service_overall_rating);

    }

}

/*  services - Ratings End */