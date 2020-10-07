<?php

add_action( 'widgets_init', 'duongluat_widget_contact_info_register' );

function duongluat_widget_contact_info_register() {
    register_widget( 'ContactInfoWidget' );
}

class ContactInfoWidget extends WP_Widget {

    /*  Contact Info Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 Contact Info Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 Contact Info Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $companyName = ( ! empty( $instance['company_name'] ) ) ? $instance['company_name'] : '';
        $email = ( ! empty( $instance['email'] ) ) ? $instance['email'] : '';
        $phone = ( ! empty( $instance['phone'] ) ) ? $instance['phone'] : '';
        $address = ( ! empty( $instance['address'] ) ) ? $instance['address'] : '';

        ?>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="content">
                <h3><?php echo $title; ?></h3>
                <div class="infor-list"><strong><?php echo $companyName; ?></strong>
                    <p class="addr"><?php echo $address; ?></p>
                    <p class="phone">Phone: <strong><?php echo $phone; ?></strong></p>
                    <p class="email">Email: <strong><?php echo $email; ?></strong></p>
                </div>
            </div>
        </div>
        <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['company_name'] = sanitize_text_field( $new_instance['company_name'] );
        $instance['email'] = sanitize_text_field( $new_instance['email'] );
        $instance['phone'] = sanitize_text_field( $new_instance['phone'] );
        $instance['address'] = sanitize_text_field( $new_instance['address'] );
        $instance['gmap_url'] = sanitize_text_field( $new_instance['gmap_url'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $companyName  = isset( $instance['company_name'] ) ? esc_attr( $instance['company_name'] ) : '';
        $email  = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
        $phone  = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
        $address  = isset( $instance['address'] ) ? esc_attr( $instance['address'] ) : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">
                <?php esc_html_e( 'Title:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>"
                   type="text" value="<?php echo esc_attr($title); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'company_name' )); ?>">
                <?php esc_html_e( 'Company name:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'company_name' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'company_name' )); ?>"
                   type="text" value="<?php echo esc_attr($companyName); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>">
                <?php esc_html_e( 'Phone:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>"
                   type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>">
                <?php esc_html_e( 'Email:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>"
                   type="text" value="<?php echo esc_attr($email); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'address' )); ?>">
                <?php esc_html_e( 'Address:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'address' )); ?>"
                   type="text" value="<?php echo esc_attr($address); ?>" />
        </p>

        <?php

    }
}

