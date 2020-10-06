<?php

/**
 * Pagination
 */

function wpdocs_get_paginated_links( $query ) {
    // When we're on page 1, 'paged' is 0, but we're counting from 1,
    // so we're using max() to get 1 instead of 0
    $currentPage = max( 1, get_query_var( 'paged', 1 ) );

    // This creates an array with all available page numbers, if there
    // is only *one* page, max_num_pages will return 0, so here we also
    // use the max() function to make sure we'll always get 1
    $pages = range( 1, max( 1, $query->max_num_pages ) );

    // Now, map over $pages and return the page number, the url to that
    // page and a boolean indicating whether that number is the current page
    return array_map( function( $page ) use ( $currentPage ) {
        return ( object ) array(
            "isCurrent" => $page == $currentPage,
            "page" => $page,
            "url" => get_pagenum_link( $page )
        );
    }, $pages );
}

if ( ! function_exists( 'freewpthemes_pagination' ) ) :
    function freewpthemes_pagination( $wp_query, $paged )
    {
        ?>
        <ul class="pagination">
            <?php if($paged > 1): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php get_pagenum_link($paged - 1); ?>" aria-label="Previous">
                        <span class="ti-arrow-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php foreach( wpdocs_get_paginated_links( $wp_query ) as $link ) : ?>
                <li class="page-item<?php echo $link->isCurrent ? ' active' : ''  ?>">
                    <a class="page-link" href="<?php esc_attr_e($link->url); ?>"><?php _e( $link->page ) ?></a>
                </li>
            <?php endforeach; ?>
            <?php if($paged < $wp_query->max_num_pages): ?>
                <li class="page-item">
                    <a class="page-link" disabled="disabled" href="<?php echo get_pagenum_link($paged + 1); ?>" aria-label="Next">
                        <span class="ti-arrow-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
        <?php
    }
endif;

if (!function_exists('freewpthemes_select_theme_tags')) {
    function freewpthemes_select_theme_tags() {
        $cats = get_categories('taxonomy=theme-category&type=theme');
        ?>
        <select class="wide form-control br-1" name="cat">
            <option data-display="All themes" value="-1">All themes</option>
            <?php foreach ($cats as $term): ?>
                <option value="<?php echo $term->term_id; ?>"><?php echo $term->name; ?></option>
            <?php endforeach; ?>
        </select>
        <?php
    }
}


if (!function_exists('freewpthemes_get_dowload_link')) {
    function freewpthemes_get_dowload_link($dowloadId) {
        if ($dowloadId) {
            $homepage             = get_bloginfo( 'url' );
            return $homepage . '/?smd_process_download=1&download_id=' . $dowloadId;
        }
        return '#';
    }
}

if (!function_exists('freewpthemes_get_download_count')) {
    function freewpthemes_get_download_count($dowloadId) {
        if ($dowloadId) {
            $db_count = sdm_get_download_count_for_post( $dowloadId );
            $text = ($db_count == '1') ? __( 'Download', 'freewpthemes' ) : __( 'Downloads', 'freewpthemes' );
            return $db_count . " " . $text;
        }
        return __( '0 Download', 'freewpthemes' );
    }
}