<?php
    $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'freewptheme-372-189');
?>

<div class="tab-content tabs">
    <div role="tabpanel" class="tab-pane fade in active" id="Overview">
        <!-- Overview -->
        <div class="row">
            <div class="tr-single-box">
                <div class="tr-single-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div>
                                <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive" alt="" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="list-overview-detail">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php the_excerpt(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>