<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freewpthemes
 */
?>
<section class="page-title-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="tr-list-detail">
                <div class="tr-list-info">
                    <?php
                        if ( is_singular() ) :
                            the_title( '<h4>', '</h4>' );
                        else :
                            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= Start Detail ===================== -->
<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Overview">
                        <!-- Description -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-files"></i><?php the_title(); ?></h4>
                                </div>
                                <div class="tr-single-body">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar Start -->
            <div class="col-md-4 col-sm-12">
                <?php
                    if ( is_active_sidebar( 'post-sidebar-widget' ) ) {
                        dynamic_sidebar( 'post-sidebar-widget' );
                    }
                ?>
            </div>
            <!-- /col-md-4 -->
        </div>
    </div>
</section>