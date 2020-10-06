<?php
$themeDownloadID = get_post_meta( get_the_ID(), 'theme_download_id', true );
$dowloadLink = esc_url(freewpthemes_get_dowload_link($themeDownloadID));
$themeLinkDemo = esc_url( get_post_meta( get_the_ID(), 'theme_link_demo', true ) );
?>
<div class="col-md-4 col-sm-6">
    <article class="restaurent-box style-1">
        <div class="restaurent-box-image">
            <figure>
                <a href="<?php the_permalink(); ?>">
                    <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'freewptheme-228-250'); ?>
                    <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive listing-box-img" alt="" />
                    <div class="list-overlay"></div>
                    <div class="read_more"><span>View details</span></div>
                </a>
                <h4 class="restaurent-place">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
            </figure>
        </div>
        <div class="entry-meta">
            <div class="meta-item meta-rating">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half"></i>
            </div>
            <div class="meta-item meta-comment fl-right">
                <span class="real-price padd-l-10">Free download</span>
            </div>
        </div>

        <div class="restaurent-detail-box">
            <div class="restaurent-ellipsis">
                <h4 class="restaurent-name">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
                <div class="row">
                    <div class="col-sm-6">
                        <a href="<?php echo $dowloadLink ?>" type="button" target="_blank" class="btn btn-block download-btn"><span class="fa fa-download mrg-r-10"></span>Download</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo $themeLinkDemo ? $themeLinkDemo : '#' ?>" type="button" target="_blank" class="btn btn-block theme-btn"><span class="fa fa-paper-plane mrg-r-10"></span>Live demo</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="restaurent-inner inner-box">
            <div class="box-inner-ellipsis">
                <div class="free-tag">Free</div>
                <div class="restaurent-review entry-location">
                    <span class="review-status bg-success"><i class="fa fa-download"></i></span>
                    <h6><?php echo freewpthemes_get_download_count($themeDownloadID) ?></h6>
                </div>
                <div class="view-box">
                    <div class="fl-right">
                        <span><i class="ti-eye padd-r-5"></i>
                        <?php echo get_post_meta( get_the_ID(), 'wpb_theme_views_count', true ) ? get_post_meta( get_the_ID(), 'wpb_theme_views_count', true ) : 0 ?></span>
                    </div>
                </div>
            </div>
        </div>

    </article>
</div>