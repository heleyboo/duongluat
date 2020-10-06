<?php
/*
Template Name: Homepage Theme List
*/
?>
<?php
    get_header();
?>

<!-- =========== Start All Themes In List View =================== -->
    <div class="main-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/4.jpg);">
        <div class="container">
            <div class="col-md-12">
                <div class="caption text-center cl-white">
                    <h2>Discover 1000+  high quality, free Wordpress Themes & Plugins </h2>
                    <p>We have a free wordpress themes for all businesses, just come here and get it</p>
                </div>
                <?php get_search_form(); ?>
            </div>
        </div>
    </div>
    <!-- ======================= End Banner ===================== -->
    <section class="gray-bg">
        <div class="container">
            <div class="row">
                <?php
                $paged = $wp_query->get( 'page' );
                $paged = ( get_query_var( 'page' ) ) ? absint( get_query_var( 'page' ) ) : 1;
                $wp_query = new WP_Query(array(
                    'post_type' => 'theme',
                    'posts_per_page' => 20,
                    'paged' => $paged
                ));
                if ( have_posts() ) : while ( have_posts() ) : the_post();

                    get_template_part( '/template-parts/theme/theme-item' );

                endwhile;
                    ?>
                <?php else : ?>

                    <!-- Themes not found Start -->
                    <!-- Themes not found End -->


                    <?php
                    wp_reset_postdata();
                endif;
                ?>
            </div>

            <?php if ($wp_query->max_num_pages > 1): ?>
                <div class="row">
                    <?php
                        freewpthemes_pagination($wp_query, $paged);
                    ?>
                </div>
            <?php endif; ?>

        </div>
    </section>
<!-- =========== End All Themes In List View =================== -->

<?php
    get_footer();
?>