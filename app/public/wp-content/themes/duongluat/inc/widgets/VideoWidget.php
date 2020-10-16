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
        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $text = ( ! empty( $instance['text'] ) ) ? $instance['text'] : '';
        $buttonText = ( ! empty( $instance['button_text'] ) ) ? $instance['button_text'] : '';
        $link = ( ! empty( $instance['link'] ) ) ? $instance['link'] : '';

        ?>
        <div class="module-introduction">
            <div class="container">
                <div class="row">
                    <div class="intro-media col-12 col-md-12 col-lg-5"><iframe width="100%" height="315" src="<?php echo $videoLink; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                    <div class="intro-content col-12 col-md-12 col-lg-7">
                        <h2><?php echo $title; ?></h2>
                        <div class="desc">
                            <p>
                                <?php echo $text ?>
                            </p>
                        </div><a class="cta" href="<?php echo $link; ?>"><?php echo $buttonText; ?></a>
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
        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['text'] = sanitize_text_field( $new_instance['text'] );
        $instance['button_text'] = sanitize_text_field( $new_instance['button_text'] );
        $instance['link'] = sanitize_text_field( $new_instance['link'] );
        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $videoLink  = isset( $instance['video_link'] ) ? esc_attr( $instance['video_link'] ) : '';
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $text  = isset( $instance['text'] ) ? esc_attr( $instance['text'] ) : '';
        $buttonText  = isset( $instance['button_text'] ) ? esc_attr( $instance['button_text'] ) : '';
        $link     = isset( $instance['link'] ) ? esc_attr( $instance['link'] ) : '';
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
            <label for="<?php echo esc_attr($this->get_field_id( 'link' )); ?>">
                <?php esc_html_e( 'Link:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'link' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'link' )); ?>"
                   type="text" value="<?php echo esc_attr($link); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e( 'Title:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"
                   type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'button_text' )); ?>">
                <?php esc_html_e( 'Button text:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'button_text' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'button_text' )); ?>"
                   type="text" value="<?php echo esc_attr($buttonText); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'text' )); ?>">
                <?php esc_html_e( 'Text:', 'duongluat' ); ?>
            </label>
        </p>
            <textarea
                    class="widefat" id="<?php echo esc_attr($this->get_field_id( 'text' )); ?>"
                    name="<?php echo esc_attr($this->get_field_name( 'text' )); ?>">
                <?php echo stripslashes($text); ?>
            </textarea>
        <?php

    }
}

