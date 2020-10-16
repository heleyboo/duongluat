<?php

add_action( 'widgets_init', 'duongluat_widget_contact_sidebar_register' );

function duongluat_widget_contact_sidebar_register() {
    register_widget( 'SidebarContactWidget' );
}

class SidebarContactWidget extends WP_Widget {

    /*  Contact Info Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 Contact Sidebar Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 Contact Sidebar Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $shortCode = ( ! empty( $instance['short_code'] ) ) ? $instance['short_code'] : '';

        ?>
        <div class="item">
            <div class="heading-item"><?php echo $title; ?></div>
            <div class="body-item">
                <div class="sidebar-form">
                    <?php echo do_shortcode($shortCode); ?>
                </div>
            </div>
        </div>
        <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['short_code'] = sanitize_text_field( $new_instance['short_code'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $shortCode  = isset( $instance['short_code'] ) ? esc_attr( $instance['short_code'] ) : '';
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
            <label for="<?php echo esc_attr($this->get_field_id( 'short_code' )); ?>">
                <?php esc_html_e( 'Short code:', 'duongluat' ); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'short_code' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'short_code' )); ?>"
                   type="text" value="<?php echo esc_attr($shortCode); ?>" />
        </p>
        <?php

    }
}

