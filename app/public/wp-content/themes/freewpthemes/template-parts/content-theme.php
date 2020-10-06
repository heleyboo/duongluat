<?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'freewptheme-372-189');
    $themeLinkDemo = esc_url( get_post_meta( get_the_ID(), 'theme_link_demo', true ) );
    $themeDownloadID = get_post_meta( get_the_ID(), 'theme_download_id', true );
    $dowloadLink = esc_url(freewpthemes_get_dowload_link($themeDownloadID));
    $downloadCount = sdm_get_download_count_for_post( $themeDownloadID );
?>

<!-- ======================= Start Banner ===================== -->
<section class="page-title-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/banner.jpg);">
    <div class="container">
        <div class="row">
            <div class="tr-list-detail">
                <div class="tr-list-info">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= End Banner ===================== -->

<!-- ======================= Start Detail Header ===================== -->
<section class="profile-header-nav padd-0 bb-1">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Overview" aria-controls="home" role="tab" data-toggle="tab"><i class="ti-user"></i>Overview</a></li>
                        <li role="presentation"><a href="#Photos" aria-controls="messages" role="tab" data-toggle="tab"><i class="ti-gallery"></i>Photos</a></li>
                        <li role="presentation"><a href="#Review" aria-controls="messages" role="tab" data-toggle="tab"><i class="ti-thumb-up"></i>Review</a></li>
                    </ul>
                    <!-- Tab panes -->
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="fl-right">
                    <a href="<?php echo $dowloadLink ?>" type="button" target="_blank" class="btn download-btn"><span class="fa fa-download mrg-r-10"></span>Download</a>
                    <a href="<?php echo $themeLinkDemo ? $themeLinkDemo : '#' ?>" type="button" target="_blank" class="btn theme-btn"><span class="fa fa-paper-plane mrg-r-10"></span>Live demo</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ======================= End Detail Header ===================== -->

<!-- ======================= Start Detail ===================== -->
<section class="tr-single-detail gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Overview">
                        <!-- Overview -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="fa fa-star-o"></i>Overview</h4>
                                </div>
                                <div class="tr-single-body">
                                    <div class="row">

                                        <div class="col-md-6 col-sm-6">
                                            <div>
                                                <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" alt="" />
                                                <a href="#" class="list-like left"><i class="ti-heart"></i></a>
                                            </div>
                                        </div>

                                        <div class="col-md-6 col-sm-6">
                                            <div class="list-overview-detail">
                                                <h4><?php the_title(); ?></h4>
                                                <ul class="extra-service">
                                                    <li>
                                                        <div class="icon-box-icon-block">
                                                            <a href="#">
                                                                <div class="icon-box-round">
                                                                    <i class="fa fa-money"></i>
                                                                </div>
                                                                <div class="icon-box-text">
                                                                    <span class="label label-success font-16">100% Free Wordpress Theme</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon-box-icon-block">
                                                            <a href="#">
                                                                <div class="icon-box-round">
                                                                    <i class="ti-share"></i>
                                                                </div>
                                                                <div class="icon-box-text">
                                                                    110 Share
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="icon-box-icon-block">
                                                            <a href="#">
                                                                <div class="icon-box-round">
                                                                    <i class="ti-comment-alt"></i>
                                                                </div>
                                                                <div class="icon-box-text">
                                                                    22 comments
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </li>

                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Description -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-files"></i>Description</h4>
                                </div>
                                <div class="tr-single-body">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ============ Features =================== -->
                    <div role="tabpanel" class="tab-pane fade in" id="Features">

                        <!-- About Features -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-files"></i>About Features</h4>
                                </div>
                                <div class="tr-single-body">
                                    <p>Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Extra features -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-thumb-up"></i>Extra Features</h4>
                                </div>
                                <div class="tr-single-body">

                                    <ul class="simple-features-list">
                                        <li>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
                                        <li>Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</li>
                                        <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.</li>
                                        <li>Pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes.</li>
                                        <li>Sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</li>
                                        <li>Minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam.</li>
                                        <li>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain.</li>
                                        <li>Pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes.</li>
                                    </ul>

                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- ============ Review =================== -->
                    <div role="tabpanel" class="tab-pane fade in" id="Review">

                        <!-- Review -->
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-write"></i>All Review</h4>
                                </div>
                                <div class="tr-single-body">

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-1.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>4.7/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Daniel Dicoss</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>87</a>
                                                <a href="#"><i class="ti-comment"></i>52</a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-2.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>4.4/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Archita Singh</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>65</a>
                                                <a href="#"><i class="ti-comment"></i>78</a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-3.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>5.0/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Devesh Patri</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>110</a>
                                                <a href="#"><i class="ti-comment"></i>47</a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-4.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>4.9/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Ruchi Sethi</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>120</a>
                                                <a href="#"><i class="ti-comment"></i>36</a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-5.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>4.8/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Duke Divalkis</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>80</a>
                                                <a href="#"><i class="ti-comment"></i>70</a>
                                            </div>
                                        </div>

                                    </div>

                                    <!-- Single Review -->
                                    <div class="review-box">
                                        <div class="review-thumb">
                                            <img src="<?php echo get_template_directory_uri(); ?>/img/user-6.jpg" class="img-responsive img-circle" alt="" />
                                        </div>

                                        <div class="review-box-content">
                                            <div class="reviewer-rate">
                                                <p><i class="fa fa-star cl-warning"></i>4.7/<span>5</span></p>
                                            </div>
                                            <div class="review-user-info">
                                                <h4>Shilka Rai</h4>
                                                <p>Et Harum Quidem Rerum Facilis Est Et Expedita Distinctio. Nam Libero Tempore, Cum Soluta Nobis Est Eligendi Optio Cumque Nihil Impedit Quo Minus Id Quod Maxime Placeat Facere Possimus</p>
                                            </div>
                                            <div class="review-lc text-right">
                                                <a href="#"><i class="ti-heart"></i>120</a>
                                                <a href="#"><i class="ti-comment"></i>140</a>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- ============ Photos =================== -->
                    <div role="tabpanel" class="tab-pane fade in" id="Photos">
                        <div class="row">
                            <div class="tr-single-box">
                                <div class="tr-single-header">
                                    <h4><i class="ti-gallery"></i>All Gallery</h4>
                                </div>
                                <div class="tr-single-body">
                                    <ul class="gallery-list">
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-1.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-1.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-2.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-2.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-3.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-3.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-4.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-4.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-5.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-5.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-6.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-6.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-7.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-7.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-8.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-8.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                        <li>
                                            <a data-fancybox="gallery" href="<?php echo get_template_directory_uri(); ?>/img/destination/des-9.jpg">
                                                <img src="<?php echo get_template_directory_uri(); ?>/img/destination/des-9.jpg" class="img-responsive" alt="">
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Sidebar Start -->
            <div class="col-md-4 col-sm-12">
                <?php
                    if ( is_active_sidebar( 'theme-sidebar-widget' ) ) {
                        dynamic_sidebar( 'theme-sidebar-widget' );
                    }
                ?>
                <!-- Share this -->
                <div class="tr-single-box">
                    <div class="tr-single-header">
                        <h4>Share this</h4>
                    </div>

                    <div class="tr-single-body">
                        <ul class="extra-service half">
                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-facebook"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Facebook
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-google-plus"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Google plus
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-twitter"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Twitter
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-linkedin"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            LinkedIn
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-instagram"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Instagram
                                        </div>
                                    </a>
                                </div>
                            </li>

                            <li>
                                <div class="icon-box-icon-block">
                                    <a href="#">
                                        <div class="icon-box-round">
                                            <i class="fa fa-pinterest"></i>
                                        </div>
                                        <div class="icon-box-text">
                                            Pinterest
                                        </div>
                                    </a>
                                </div>
                            </li>

                        </ul>
                    </div>

                </div>

                <!-- Share this -->


            </div>
            <!-- /col-md-4 -->
        </div>
    </div>
</section>
<!-- ======================= End Detail ===================== -->