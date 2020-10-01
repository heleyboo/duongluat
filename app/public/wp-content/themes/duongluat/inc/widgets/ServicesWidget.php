<?php

add_action( 'widgets_init', 'duongluat_widget_services_register' );

function duongluat_widget_services_register() {
    register_widget( 'ServicesWidget' );
}

class ServicesWidget extends WP_Widget {

    /*  ServicesWidget Setup  */

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 ServicesWidget', 'duongluat' ), array(
            'description' => esc_html__('#1 ServicesWidget', 'duongluat' )
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
        <div class="module-service">
            <div class="container">
                <ul class="list row">
                    <li><a class="item" href="#!"><img src="images/img_bs.png" alt="">
                            <p>Business Matching</p></a></li>
                    <li><a class="item" href="#!"><img src="images/img_tvpl.png" alt="">
                            <p>Tư vấn pháp lý</p></a></li>
                    <li><a class="item" href="#!"><img src="images/img_dvkt.png" alt="">
                            <p>Dịch vụ kiểm toán</p></a></li>
                    <li><a class="item" href="#!"><img src="images/img_dvdt.png" alt="">
                            <p>Dịch vụ dịch thuật</p></a></li>
                    <li><a class="item" href="#!"><img src="images/img_dvtt.png" alt="">
                            <p>Dịch vụ thanh toán</p></a></li>
                    <li><a class="item" href="#!"><img src="images/img_web.png" alt="">
                            <p>Thiết kế website</p></a></li>
                </ul>
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

