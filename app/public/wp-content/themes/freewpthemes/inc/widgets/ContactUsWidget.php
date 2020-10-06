<?php

add_action( 'widgets_init', 'freewpthemes_widget_contactus_register' );

function freewpthemes_widget_contactus_register() {
    register_widget( 'ContactUsWidget' );
}

class ContactUsWidget extends WP_Widget {

    /*  ContactUsWidget Setup  */

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 ContactUsWidget', 'freewpthemes' ), array(
            'description' => esc_html__('#1 ContactUsWidget', 'freewpthemes' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $address = ( ! empty( $instance['address'] ) ) ? $instance['address'] : '';
        $email = ( ! empty( $instance['email'] ) ) ? $instance['email'] : '';
        $phone = ( ! empty( $instance['phone'] ) ) ? $instance['phone'] : '';
        $facebook = ( ! empty( $instance['facebook'] ) ) ? $instance['facebook'] : '#';
        $twitter = ( ! empty( $instance['twitter'] ) ) ? $instance['twitter'] : '#';
        $linkedin = ( ! empty( $instance['linkedin'] ) ) ? $instance['linkedin'] : '#';

        ?>
        <section class="before-footer bt-1 bb-1">
            <div class="container-fluid padd-0 full-width">

                <div class=" col-md-2 col-sm-2 br-1 mbb-1">
                    <div class="data-flex">
                        <h4><?php esc_html_e( 'Contact Us!', 'freewpthemes' ) ?></h4>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 br-1 mbb-1">
                    <div class="data-flex text-center">
                        <?php echo $address ?>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 br-1 mbb-1">
                    <div class="data-flex text-center">
                        <span class="d-block mrg-bot-0"><?php echo $phone ?></span>
                        <a href="#" class="theme-cl"><strong><?php echo $email ?></strong></a>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 padd-0">
                    <div class="data-flex padd-0">
                        <ul class="social-share">
                            <li><a href="<?php echo $facebook ?>"><i class="fa fa-facebook theme-cl"></i></a></li>
                            <li><a href="<?php echo $twitter ?>"><i class="fa fa-twitter theme-cl"></i></a></li>
                            <li><a href="<?php echo $linkedin ?>"><i class="fa fa-linkedin theme-cl"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </section>
        <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        $instance['address'] = sanitize_text_field( $new_instance['address'] );
        $instance['email'] = sanitize_text_field( $new_instance['email'] );
        $instance['phone'] = sanitize_text_field( $new_instance['phone'] );
        $instance['facebook'] = sanitize_text_field( $new_instance['facebook'] );
        $instance['twitter'] = sanitize_text_field( $new_instance['twitter'] );
        $instance['linkedin'] = sanitize_text_field( $new_instance['linkedin'] );
        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $address   = isset( $instance['address'] ) ? esc_attr( $instance['address'] ) : '';
        $email     = isset( $instance['email'] ) ? esc_attr( $instance['email'] ) : '';
        $phone     = isset( $instance['phone'] ) ? esc_attr( $instance['phone'] ) : '';
        $facebook  = isset( $instance['facebook'] ) ? esc_attr( $instance['facebook'] ) : '';
        $twitter   = isset( $instance['twitter'] ) ? esc_attr( $instance['twitter'] ) : '';
        $linkedin  = isset( $instance['linkedin'] ) ? esc_attr( $instance['linkedin'] ) : '';
        ?>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'address' )); ?>">
                <?php esc_html_e( 'Address:', 'spacethemes' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'address' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'address' )); ?>"
                   type="text" value="<?php echo esc_attr($address); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>">
                <?php esc_html_e( 'Phone:', 'spacethemes' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'phone' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'phone' )); ?>"
                   type="text" value="<?php echo esc_attr($phone); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'email' )); ?>">
                <?php esc_html_e( 'Email:', 'spacethemes' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'email' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'email' )); ?>"
                   type="text" value="<?php echo esc_attr($email); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>">
                <?php esc_html_e( 'Facebook:', 'facebook' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'facebook' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'facebook' )); ?>"
                   type="text" value="<?php echo esc_attr($facebook); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>">
                <?php esc_html_e( 'Twitter:', 'facebook' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'twitter' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'twitter' )); ?>"
                   type="text" value="<?php echo esc_attr($twitter); ?>" />
        </p>

        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>">
                <?php esc_html_e( 'Linkedin:', 'facebook' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'linkedin' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'linkedin' )); ?>"
                   type="text" value="<?php echo esc_attr($linkedin); ?>" />
        </p>
        <?php

    }
}

