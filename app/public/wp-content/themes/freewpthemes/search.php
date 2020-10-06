<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package freewpthemes
 */

get_header();
?>

<?php
    global $query_string;
    wp_parse_str( $query_string, $search_query );
    if (isset($search_query['cat']) && $search_query['cat'] !== '-1' ) {
        $search_query['tax_query'] = array(
            array (
                'taxonomy' => 'theme-category',
                'field'    => 'term_id',
                'terms'    => $search_query['cat'],
            )
        );
    }

    unset($search_query['cat']);
    $search = new WP_Query( $search_query );
?>

<?php if ( $search->have_posts() ) : ?>
    <section class="gray-bg">
        <div class="container">
            <h1>
                <?php
                /* translators: %s: search query. */
                printf( esc_html__( 'Search Results for: %s', 'freewpthemes' ), '<span>' . get_search_query() . '</span>' );
                ?>
            </h1>
			<?php
			/* Start the Loop */
			while ( $search->have_posts() ) :
                $search->the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
                get_template_part( '/template-parts/theme/theme-item' );

			endwhile;
			the_posts_navigation(); ?>
        </div>
    </section>
    <?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		wp_reset_postdata();
		?>
    <!-- #main -->
<?php
get_footer();