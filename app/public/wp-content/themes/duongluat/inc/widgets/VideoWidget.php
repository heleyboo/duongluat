<?php

add_action( 'widgets_init', 'duongluat_widget_video_register' );

function duongluat_widget_video_register() {
    register_widget( 'VideoWidget' );
}

class VideoWidget extends WP_Widget {

    /*  VideoWidget Setup  */

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 VideoWidget', 'duongluat' ), array(
            'description' => esc_html__('#1 VideoWidget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $videoLink = ( ! empty( $instance['video_link'] ) ) ? $instance['video_link'] : '';
        $postId = ( ! empty( $instance['post_id'] ) ) ? $instance['post_id'] : '';

        ?>
        <div class="module-introduction">
            <div class="container">
                <div class="row">
                    <div class="intro-media col-12 col-md-12 col-lg-5"><iframe width="100%" height="315" src="<?php echo $videoLink; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="intro-content col-12 col-md-12 col-lg-7">
                        <h2>WE LEGAL</h2>
                        <div class="desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris pretium massa a arcu blandit finibus. Curabitur varius dui id leo tincidunt interdum. Curabitur sagittis pretium rhoncus. In vitae blandit purus. Maecenas id leo eros. Mauris aliquam nunc Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris pretium massa a arcu blandit finibus. Curabitur varius dui id leo tincidunt interdum. Curabitur sagittis pretium rhoncus. In vitae blandit purus. Maecenas id leo eros. Mauris aliquam nunc </p>
                        </div><a class="cta" href="#!">[Call to action]</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['video_link'] = sanitize_text_field( $new_instance['video_link'] );
        $instance['post_id'] = sanitize_text_field( $new_instance['post_id'] );
        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $videoLink  = isset( $instance['video_link'] ) ? esc_attr( $instance['video_link'] ) : '';
        $postId     = isset( $instance['post_id'] ) ? esc_attr( $instance['post_id'] ) : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'video_link' )); ?>">
                <?php esc_html_e( 'Video Link:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'video_link' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'video_link' )); ?>"
                   type="text" value="<?php echo esc_attr($videoLink); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'post_id' )); ?>">
                <?php esc_html_e( 'Post Id:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'post_id' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'post_id' )); ?>"
                   type="text" value="<?php echo esc_attr($postId); ?>" />
        </p>

        <?php

    }
}

