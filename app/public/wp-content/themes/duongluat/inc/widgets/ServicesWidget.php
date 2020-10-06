<?php

add_action( 'widgets_init', 'duongluat_widget_services_register' );

function duongluat_widget_services_register() {
    register_widget( 'ServicesWidget' );
}

class ServicesWidget extends WP_Widget {

    /*  ServicesWidget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 ServicesWidget', 'duongluat' ), array(
            'description' => esc_html__('#1 ServicesWidget', 'duongluat' )
        ));
        $services = new WP_Query( apply_filters( 'widget_posts_args', array(
            'post_type'           => 'service',
        ) ) );
        if ($services->have_posts()) {
            while ($services->have_posts()) {
                $services->the_post();
                $this->services[get_the_ID()] = [
                    'title' => get_the_title(),
                    'link' => get_the_permalink()
                ];
            }
            wp_reset_postdata();
        }
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }
        ?>
        <div class="module-service">
            <div class="container">
                <ul class="list row">
                    <?php $this->showWidget($instance); ?>
                </ul>
            </div>
        </div>
        <?php
    }

    /**
     * @param $instance
     */
    private function showWidget($instance)
    {
        for ($i=1; $i<=6; $i++) {
            $fieldName = sprintf("%s_%s", 'service', $i);
            $serviceId = ( ! empty( $instance[$fieldName] ) ) ? $instance[$fieldName] : '';
            $serviceTitle = $this->getServiceTitle($serviceId);
            $serviceLink = $this->getServiceLink($serviceId);
            ?>
            <li>
                <a class="item" href="<?php echo $serviceLink; ?>">
                    <img src="<?php echo $this->getServiceIconUrl($i); ?>" alt="">
                    <p><?php echo $serviceTitle; ?></p>
                </a>
            </li>
            <?php
        }
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;
        for ($i = 1; $i<=6; $i++) {
            $fieldName = sprintf("%s_%s", 'service', $i);
            $instance[$fieldName] = sanitize_text_field( $new_instance[$fieldName] );
        }

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        ?>
            <?php for($index = 1; $index <= 6; $index++): ?>
                <?php $this->getServicesForm('service', $index, $instance); ?>
                <br/>
            <?php endfor; ?>

        <?php

    }

    private function getServicesForm($fieldName, $index, $instance)
    {
        $fieldName = sprintf("%s_%s", $fieldName, $index);
        $serviceId  = isset( $instance[$fieldName] ) ? esc_attr( $instance[$fieldName] ) : '';
        ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( $fieldName )); ?>">
                    <?php echo sprintf( 'Service #%s:', $index ); ?>
                </label>
            </p>
            <select
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id( $fieldName )); ?>"
                    name="<?php echo esc_attr($this->get_field_name( $fieldName )); ?>"
            >
                <?php foreach ($this->services as $id => $service): ?>
                    <option value="<?php echo $id ?>" <?php echo trim($serviceId) == trim($id) ? 'selected="selected"' : '' ?>>
                        <?php echo $service['title']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        <?php
    }

    /**
     * @param $serviceID
     * @return mixed
     */
    private function getServiceTitle($serviceID) {
        if (isset($this->services[$serviceID])) {
            return $this->services[$serviceID]['title'];
        }
    }

    /**
     * @param $serviceID
     * @return mixed
     */
    private function getServiceLink($serviceID) {
        if (isset($this->services[$serviceID])) {
            return $this->services[$serviceID]['link'];
        }
    }

    private function getServiceIconUrl($index)
    {
        switch ($index) {
            case 1:
                return sprintf('%s/images/img_bs.png', get_template_directory_uri());
            case 2:
                return sprintf('%s/images/img_tvpl.png', get_template_directory_uri());
            case 3:
                return sprintf('%s/images/img_dvkt.png', get_template_directory_uri());
            case 4:
                return sprintf('%s/images/img_dvdt.png', get_template_directory_uri());
            case 5:
                return sprintf('%s/images/img_dvtt.png', get_template_directory_uri());
            case 6:
                return sprintf('%s/images/img_web.png', get_template_directory_uri());
        }
    }
}

