<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freewpthemes
 */

get_header();
?>
    <!-- ======================= Start Banner ===================== -->
    <section class="page-title-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner.jpg);">
        <div class="container">
            <div class="row">
                <div class="tr-list-detail">
                    <div class="tr-list-info">
                        <h4><?php echo get_the_archive_title() ?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ======================= End Banner ===================== -->
		<?php if ( have_posts() ) : ?>
        <section class="tr-single-detail gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <?php
                        /* Start the Loop */
                        while ( have_posts() ) :
                            the_post(); ?>

                                    <?php

                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    get_template_part( 'template-parts/content', 'archive' );

                            endwhile;
                            ?>
                    </div>
                </div>
            </div>
        </section>
        <?php
			the_posts_navigation();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
<?php
get_sidebar();
get_footer();
