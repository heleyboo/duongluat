<?php

add_action( 'widgets_init', 'freewpthemes_widget_similartheme_register' );

function freewpthemes_widget_similartheme_register() {
    register_widget( 'SimilarThemeWidget' );
}

class SimilarThemeWidget extends WP_Widget {

    /*  SimilarThemeWidget Setup  */

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 SimilarThemeWidget', 'freewpthemes' ), array(
            'description' => esc_html__('#1 SimilarThemeWidget', 'freewpthemes' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $similarThemes = new WP_Query( apply_filters( 'widget_posts_args', array(
            'post_type'           => 'theme',
            'posts_per_page'      => 5,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
        ) ) );

        if ($similarThemes->have_posts()):
        ?>
        <div class="tr-single-box">
            <div class="tr-single-header">
                <h4><?php echo $title; ?></h4>
            </div>
            <div class="tr-single-body">
                <div class="single-side-slide">
                    <!-- Single Destination -->
                    <?php while ($similarThemes->have_posts()): $similarThemes->the_post(); ?>
                    <div class="col-md-4 col-sm-6">
                        <article class="destination-box style-1">
                            <div class="destination-box-image">
                                <figure>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php $thumbnail = wp_get_attachment_image_src(get_post_thumbnail_id(), 'freewptheme-228-250'); ?>
                                        <img src="<?php echo esc_url($thumbnail[0]); ?>" alt="<?php the_title_attribute(); ?>" class="img-responsive listing-box-img" alt="" />
                                        <div class="list-overlay"></div>
                                    </a>
                                    <div class="free-tag">Free</div>
                                    <h4 class="destination-place">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h4>
                                    <a href="#" class="list-like left"><i class="ti-heart"></i></a>
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
                            </div>

                            <div class="inner-box">
                                <div class="box-inner-ellipsis">
                                    <h4 class="entry-location">
                                        <a href="<?php the_permalink(); ?>">Detail</a>
                                    </h4>
                                    <div class="price-box">
                                        <div class="destination-price fl-right">
                                            <a href="<?php the_permalink(); ?>"><i class="theme-cl ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </article>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
        <?php wp_reset_postdata(); endif;
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $title   = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e( 'Title:', 'spacethemes' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"
                   type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <?php

    }
}

