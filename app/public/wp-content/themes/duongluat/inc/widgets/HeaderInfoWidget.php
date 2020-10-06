<?php

add_action( 'widgets_init', 'duongluat_widget_header_info_register' );

function duongluat_widget_header_info_register() {
    register_widget( 'HeaderInfoWidget' );
}

class HeaderInfoWidget extends WP_Widget {

    /*  Header Info Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 Header Info Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 Header Info Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $slogan = ( ! empty( $instance['slogan'] ) ) ? $instance['slogan'] : '';
        $email = ( ! empty( $instance['email'] ) ) ? $instance['email'] : '';
        $phone = ( ! empty( $instance['phone'] ) ) ? $instance['phone'] : '';

        ?>
        <div class="info">
            <h1 class="title-info"><?php echo $slogan; ?></h1>
            <div class="contact-group">
                <div class="item"><img src="https://www.sbsgroup.com.sg/wp-content/themes/Chameleon/images/message.png" alt=""><a href="<?php echo $email; ?>"><?php echo $email; ?></a></div>
                <div class="item"><img src="https://www.sbsgroup.com.sg/wp-content/themes/Chameleon/images/contact.png" alt=""><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></div>
            </div>
        </div>
        <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['slogan'] = sanitize_text_field( $new_instance['slogan'] );
        $instance['email'] = sanitize_text_field( $new_instance['email'] );
        $instance['phone'] = sanitize_text_field( $new_instance['phone'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $slogan  = isset( $instance['slogan'] ) ? esc_attr( $instance['slogan'] ) : '';
        $email  = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
        $phone  = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'slogan' )); ?>">
                <?php esc_html_e( 'Slogan:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'slogan' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'slogan' )); ?>"
                   type="text" value="<?php echo esc_attr($slogan); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>">
                <?php esc_html_e( 'Mail:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>"
                   type="text" value="<?php echo esc_attr($email); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>">
                <?php esc_html_e( 'Phone:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>"
                   type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>

        <?php

    }
}

