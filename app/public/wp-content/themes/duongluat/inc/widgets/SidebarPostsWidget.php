<?php

add_action( 'widgets_init', 'duongluat_widget_sidebar_posts_register' );

function duongluat_widget_sidebar_posts_register() {
    register_widget( 'SidebarPostsWidget' );
}

class SidebarPostsWidget extends WP_Widget {

    /*  Sidebar Post Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 Sidebar Posts Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 Sidebar Posts Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $termId = ( ! empty( $instance['term_id'] ) ) ? $instance['term_id'] : '';

        $posts = new WP_Query( apply_filters( 'widget_posts_args', array(
            'posts_per_page'      => 5,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'tax_query' => array(
                'relation' => 'OR',
                array(
                    'taxonomy' => 'service-category',
                    'field' => 'term_id',
                    'terms' => $termId
                ),
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $termId
                )
            )
        ) ) ); ?>

        <?php if ($posts->have_posts()): ?>
            <div class="item">
                <div class="heading-item"><?php echo $title; ?></div>
                <div class="body-item">
                    <div class="link-list">
                        <?php while ($posts->have_posts()): $posts->the_post(); ?>
                            <a class="item-link" href="<?php echo the_permalink(); ?>"><?php echo the_title(); ?></a>
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
        $instance['term_id'] = sanitize_text_field( $new_instance['term_id'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $imageSize  = isset( $instance['image_size'] ) ? esc_attr( $instance['image_size'] ) : '';
        $termId  = isset( $instance['term_id'] ) ? esc_attr( $instance['term_id'] ) : '';

        $categories = get_terms(array(
            'taxonomy'    => array('service-category', 'category'),
            'orderby'     => 'name',
            'order'       => 'ASC',
            'hide_empty'  => false,
        ));

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
            <label for="<?php echo esc_attr($this->get_field_id( 'taxonomy' )); ?>">
                <?php esc_html_e( 'Category:', 'duongluat' ); ?>
            </label>

            <select
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id( 'term_id' )); ?>"
                    name="<?php echo esc_attr($this->get_field_name( 'term_id' )); ?>"
            >
                <?php foreach ($categories as $category): ?>
                    <option value="<?php echo $category->term_id ?>" <?php echo trim($termId) == trim($category->term_id) ? 'selected="selected"' : '' ?>>
                        <?php echo $category->name; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <?php

    }
}

