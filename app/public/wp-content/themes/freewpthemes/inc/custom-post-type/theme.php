<?php

/*  themes - Post Type Start */

add_action('init', 'freewpthemes_themes', 0 );

function freewpthemes_themes() {

    $theme_slug = 'theme';
    if ( get_option( 'themes_section_slug') ) {
        $theme_slug = get_option( 'themes_section_slug', 'theme' );
    }

    $theme_name = esc_html__('WP Themes', 'freewpthemes');
    if ( get_option( 'themes_section_name') ) {
        $theme_name = get_option( 'themes_section_name', 'WP Themes' );
    }

    $args = array(
        'labels' => array(
            'name' => $theme_name,
            'add_new' => esc_html__('Add New', 'freewpthemes'),
            'edit_item' => esc_html__('Edit Item', 'freewpthemes'),
            'add_new_item' => esc_html__('Add New', 'freewpthemes'),
            'view_item' => esc_html__('View Item', 'freewpthemes'),
        ),
        'singular_label' => __('WP Theme'),
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
            'slug' => $theme_slug,
            'with_front' => false
        )
    );

    register_post_type( 'theme' , $args );

    /* --- Category: Custom Taxonomy --- */

    $themes_category_title = esc_html__('Categories', 'freewpthemes');
    if ( get_option( 'themes_category_title') ) {
        $themes_category_title = get_option( 'themes_category_title', 'Categories' );
    }

    $labels = array(
        'name' => $themes_category_title,
        'singular_name' => $themes_category_title,
        'search_items' => esc_html__('Find Taxonomy', 'freewpthemes'),
        'all_items' => esc_html__('All ', 'freewpthemes') . $themes_category_title,
        'parent_item' => esc_html__('Parent Taxonomy', 'freewpthemes'),
        'parent_item_colon' => esc_html__('Parent Taxonomy:', 'freewpthemes'),
        'edit_item' => esc_html__('Edit Taxonomy', 'freewpthemes'),
        'view_item' => esc_html__('View Taxonomy', 'freewpthemes'),
        'update_item' => esc_html__('Update Taxonomy', 'freewpthemes'),
        'add_new_item' => esc_html__('Add New Taxonomy', 'freewpthemes'),
        'new_item_name' => esc_html__('Taxonomy', 'freewpthemes'),
        'menu_name' => $themes_category_title
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

    register_taxonomy('theme-category', 'theme', $args);

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

    register_taxonomy('tag','theme',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tag' ),
    ));
}

/* --- Add meta box for theme --- */

add_filter( 'rwmb_meta_boxes', 'prefix_register_meta_boxes' );

function prefix_register_meta_boxes( $meta_boxes ) {
    $prefix = 'theme_';
    $meta_boxes[] = array(
        'title'      => 'Theme information',
        'post_types' => 'theme',
        'fields' => array(
            array(
                'name'  => 'Download link',
                'desc'  => 'Direct download link for the theme',
                'id'    => $prefix . 'link_download',
                'type'  => 'string',
            ),
            array(
                'name'  => 'Demo link',
                'desc'  => 'Demo link for the theme',
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

/* --- Add custom slug for taxonomy 'theme-category' --- */

if ( get_option( 'theme_category_slug') ) {

    function freewpthemes_change_theme_category_slug( $taxonomy, $object_type, $args ) {

        $theme_category_slug = 'theme-category';

        if ( get_option( 'theme_category_slug') ) {
            $theme_category_slug = get_option( 'theme_category_slug', 'theme-category' );
        }

        if( 'theme-category' == $taxonomy ) {
            remove_action( current_action(), __FUNCTION__ );
            $args['rewrite'] = array( 'slug' => $theme_category_slug );
            register_taxonomy( $taxonomy, $object_type, $args );
        }

    }
    add_action( 'registered_taxonomy', 'freewpthemes_change_theme_category_slug', 10, 3 );

}


/*  themes - Post Type End */


/*  themes - Additional Fields Start */

add_action( 'admin_init', 'freewpthemes_themes_fields' );

function freewpthemes_themes_fields() {
    add_meta_box( 'freewpthemes_themes_meta_box',
        esc_html__( 'Additional information', 'freewpthemes' ),
        'freewpthemes_themes_display_meta_box',
        'theme', 'side', 'high'
    );
}

function freewpthemes_themes_display_meta_box( $theme ) {

    wp_nonce_field( 'freewpthemes_themes_box', 'freewpthemes_themes_nonce' );
    $theme_short_desc = get_post_meta( $theme->ID, 'theme_short_desc', true );
    $theme_terms_desc = get_post_meta( $theme->ID, 'theme_terms_desc', true );
    $theme_demo_link = get_post_meta( $theme->ID, 'theme_demo_link', true );
    $theme_allowed_html = array(
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

    <div class="components-base-control theme_short_desc">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="theme_short_desc-0"><?php esc_html_e( 'Short description', 'freewpthemes' ); ?></label>
            <textarea class="components-textarea-control__input" id="theme_short_desc-0" rows="4" name="theme_short_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($theme_short_desc, $theme_allowed_html); ?></textarea>
        </div>
    </div>

    <div class="components-base-control theme_terms_desc">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="theme_terms_desc-0"><?php esc_html_e( 'Promotional description', 'freewpthemes' ); ?></label>
            <textarea class="components-textarea-control__input" id="theme_terms_desc-0" rows="8" name="theme_terms_desc" style="display: block; margin-bottom: 10px; width:100%;"><?php echo wp_kses($theme_terms_desc, $theme_allowed_html); ?></textarea>
        </div>
    </div>

    <div class="components-base-control theme_demo_link">
        <div class="components-base-control__field">
            <label class="components-base-control__label" for="theme_demo_link-0"><?php esc_html_e( 'External URL', 'freewpthemes' ); ?> </label>
            <input type="url" name="theme_demo_link" id="theme_demo_link-0" value="<?php echo esc_url($theme_demo_link); ?>" style="display: block; margin-bottom: 10px;" />
        </div>
    </div>
    <?php
}

add_action( 'save_post', 'freewpthemes_themes_save_fields', 10, 2 );

function freewpthemes_themes_save_fields( $post_id ) {

    if ( ! isset( $_POST['freewpthemes_themes_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['freewpthemes_themes_nonce'];

    if ( ! wp_verify_nonce( $nonce, 'freewpthemes_themes_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'theme' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    $theme_short_desc = $_POST['theme_short_desc'];
    update_post_meta( $post_id, 'theme_short_desc', $theme_short_desc );

    $theme_terms_desc = $_POST['theme_terms_desc'];
    update_post_meta( $post_id, 'theme_terms_desc', $theme_terms_desc );

    $theme_demo_link = esc_url( $_POST['theme_demo_link'] );
    update_post_meta( $post_id, 'theme_demo_link', $theme_demo_link );
}

/*  themes - Additional Fields End */

/*  themes - Ratings Start */

add_action( 'admin_init', 'freewpthemes_themes_ratings_fields' );

function freewpthemes_themes_ratings_fields() {

    add_meta_box( 'freewpthemes_themes_ratings_meta_box',
        esc_html__( 'theme Ratings', 'freewpthemes' ),
        'freewpthemes_themes_ratings_display_meta_box',
        'theme', 'side', 'high'
    );
}

function freewpthemes_themes_ratings_display_meta_box( $theme ) {

    wp_nonce_field( 'freewpthemes_themes_ratings_box', 'freewpthemes_themes_ratings_nonce' );
    $meta = get_post_meta( $theme->ID );

    $theme_rating_trust = ( isset( $meta['theme_rating_trust'][0] ) && '' !== $meta['theme_rating_trust'][0] ) ? $meta['theme_rating_trust'][0] : '';
    $theme_rating_coupons = ( isset( $meta['theme_rating_coupons'][0] ) && '' !== $meta['theme_rating_coupons'][0] ) ? $meta['theme_rating_coupons'][0] : '';
    $theme_rating_bonus = ( isset( $meta['theme_rating_bonus'][0] ) && '' !== $meta['theme_rating_bonus'][0] ) ? $meta['theme_rating_bonus'][0] : '';
    $theme_rating_customer = ( isset( $meta['theme_rating_customer'][0] ) && '' !== $meta['theme_rating_customer'][0] ) ? $meta['theme_rating_customer'][0] : '';

    ?>

    <style type="text/css">
        .freewpthemes-single-rating-box {
            padding-bottom: 10px;
        }
        .freewpthemes-single-rating-box label {
            padding-right: 12px;
        }
        .freewpthemes-single-rating-box label:last-child {
            padding-right: 0;
        }
        .freewpthemes-single-rating-box label input[type=radio] {
            margin-right: 0 !important;
        }
    </style>

    <div class="components-base-control theme_rating_trust">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_1_title = get_option( 'rating_1' );
                if ( $rating_1_title ) {
                    echo esc_html($rating_1_title);
                } else {
                    esc_html_e( 'Trust & Fairness', 'freewpthemes' );
                } ?>
            </label>
            <div class="freewpthemes-single-rating-box">
                <label>
                    <input type="radio" name="theme_rating_trust" value="1" <?php checked( $theme_rating_trust, '1' ); ?>>
                    <?php esc_attr_e( '1', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_trust" value="2" <?php checked( $theme_rating_trust, '2' ); ?>>
                    <?php esc_attr_e( '2', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_trust" value="3" <?php checked( $theme_rating_trust, '3' ); ?>>
                    <?php esc_attr_e( '3', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_trust" value="4" <?php checked( $theme_rating_trust, '4' ); ?>>
                    <?php esc_attr_e( '4', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_trust" value="5" <?php checked( $theme_rating_trust, '5' ); ?>>
                    <?php esc_attr_e( '5', 'freewpthemes' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control theme_rating_coupons">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_2_title = get_option( 'rating_2' );
                if ( $rating_2_title ) {
                    echo esc_html($rating_2_title);
                } else {
                    esc_html_e( 'coupons & Software', 'freewpthemes' );
                } ?>
            </label>
            <div class="freewpthemes-single-rating-box">
                <label>
                    <input type="radio" name="theme_rating_coupons" value="1" <?php checked( $theme_rating_coupons, '1' ); ?>>
                    <?php esc_attr_e( '1', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_coupons" value="2" <?php checked( $theme_rating_coupons, '2' ); ?>>
                    <?php esc_attr_e( '2', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_coupons" value="3" <?php checked( $theme_rating_coupons, '3' ); ?>>
                    <?php esc_attr_e( '3', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_coupons" value="4" <?php checked( $theme_rating_coupons, '4' ); ?>>
                    <?php esc_attr_e( '4', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_coupons" value="5" <?php checked( $theme_rating_coupons, '5' ); ?>>
                    <?php esc_attr_e( '5', 'freewpthemes' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control theme_rating_bonus">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_3_title = get_option( 'rating_3' );
                if ( $rating_3_title ) {
                    echo esc_html($rating_3_title);
                } else {
                    esc_html_e( 'Bonuses & Promotions', 'freewpthemes' );
                } ?>
            </label>
            <div class="freewpthemes-single-rating-box">
                <label>
                    <input type="radio" name="theme_rating_bonus" value="1" <?php checked( $theme_rating_bonus, '1' ); ?>>
                    <?php esc_attr_e( '1', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_bonus" value="2" <?php checked( $theme_rating_bonus, '2' ); ?>>
                    <?php esc_attr_e( '2', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_bonus" value="3" <?php checked( $theme_rating_bonus, '3' ); ?>>
                    <?php esc_attr_e( '3', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_bonus" value="4" <?php checked( $theme_rating_bonus, '4' ); ?>>
                    <?php esc_attr_e( '4', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_bonus" value="5" <?php checked( $theme_rating_bonus, '5' ); ?>>
                    <?php esc_attr_e( '5', 'freewpthemes' ); ?>
                </label>
            </div>
        </div>
    </div>

    <div class="components-base-control theme_rating_customer">
        <div class="components-base-control__field">
            <label class="components-base-control__label">
                <?php
                $rating_4_title = get_option( 'rating_4' );
                if ( $rating_4_title ) {
                    echo esc_html($rating_4_title);
                } else {
                    esc_html_e( 'Customer Support', 'freewpthemes' );
                } ?>
            </label>
            <div class="freewpthemes-single-rating-box">
                <label>
                    <input type="radio" name="theme_rating_customer" value="1" <?php checked( $theme_rating_customer, '1' ); ?>>
                    <?php esc_attr_e( '1', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_customer" value="2" <?php checked( $theme_rating_customer, '2' ); ?>>
                    <?php esc_attr_e( '2', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_customer" value="3" <?php checked( $theme_rating_customer, '3' ); ?>>
                    <?php esc_attr_e( '3', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_customer" value="4" <?php checked( $theme_rating_customer, '4' ); ?>>
                    <?php esc_attr_e( '4', 'freewpthemes' ); ?>
                </label>
                <label>
                    <input type="radio" name="theme_rating_customer" value="5" <?php checked( $theme_rating_customer, '5' ); ?>>
                    <?php esc_attr_e( '5', 'freewpthemes' ); ?>
                </label>
            </div>
        </div>
    </div>

    <?php
}

add_action( 'save_post', 'freewpthemes_themes_ratings_save_fields', 10, 2 );

function freewpthemes_themes_ratings_save_fields( $post_id ) {

    if ( ! isset( $_POST['freewpthemes_themes_ratings_nonce'] ) ) {
        return $post_id;
    }

    $nonce = $_POST['freewpthemes_themes_ratings_nonce'];

    if ( ! wp_verify_nonce( $nonce, 'freewpthemes_themes_ratings_box' ) ) {
        return $post_id;
    }

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( 'theme' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return $post_id;
        }
    }

    if ( isset( $_POST['theme_rating_trust'] ) ) {
        update_post_meta( $post_id, 'theme_rating_trust', sanitize_text_field( wp_unslash( $_POST['theme_rating_trust'] ) ) );
    }

    if ( isset( $_POST['theme_rating_coupons'] ) ) {
        update_post_meta( $post_id, 'theme_rating_coupons', sanitize_text_field( wp_unslash( $_POST['theme_rating_coupons'] ) ) );
    }

    if ( isset( $_POST['theme_rating_bonus'] ) ) {
        update_post_meta( $post_id, 'theme_rating_bonus', sanitize_text_field( wp_unslash( $_POST['theme_rating_bonus'] ) ) );
    }

    if ( isset( $_POST['theme_rating_customer'] ) ) {
        update_post_meta( $post_id, 'theme_rating_customer', sanitize_text_field( wp_unslash( $_POST['theme_rating_customer'] ) ) );
    }

    if ( !wp_is_post_revision( $post_id ) ) {

        $theme_rating_trust = get_post_meta( $post_id, 'theme_rating_trust', true );
        $theme_rating_coupons = get_post_meta( $post_id, 'theme_rating_coupons', true );
        $theme_rating_bonus = get_post_meta( $post_id, 'theme_rating_bonus', true );
        $theme_rating_customer = get_post_meta( $post_id, 'theme_rating_customer', true );

        $theme_ratings_all = array(
            $theme_rating_trust,
            $theme_rating_coupons,
            $theme_rating_bonus,
            $theme_rating_customer
        );

        $theme_overall_rating = esc_html(array_sum($theme_ratings_all)/count($theme_ratings_all));

        if (is_float($theme_overall_rating)) { $theme_overall_rating = number_format($theme_overall_rating,1); }

        update_post_meta($post_id, 'theme_overall_rating', $theme_overall_rating);

    }

}

/*  themes - Ratings End */