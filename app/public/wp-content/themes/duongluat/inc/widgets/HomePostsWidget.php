<?php

add_action( 'widgets_init', 'duongluat_widget_home_posts_register' );

function duongluat_widget_home_posts_register() {
    register_widget( 'HomePostsWidget' );
}

class HomePostsWidget extends WP_Widget {

    /*  Header Info Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 Home Posts Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 Home Posts Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : '';
        $imageSize = ( ! empty( $instance['image_size'] ) ) ? $instance['image_size'] : '';
        $termId = ( ! empty( $instance['term_id'] ) ) ? $instance['term_id'] : '';

        $posts = new WP_Query( apply_filters( 'widget_posts_args', array(
            'post_type'           => 'post',
            'posts_per_page'      => 5,
            'no_found_rows'       => true,
            'post_status'         => 'publish',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $termId
                )
            )
        ) ) ); ?>

        <?php if ($posts->have_posts()): ?>

                <div class="<?php echo $imageSize == 'large' ? 'market-news' : 'legal-new' ?> col-12 col-md-12 col-lg-6">
                    <h2 class="title"><?php echo $title; ?></h2>
                    <ul class="list">
                        <?php while ($posts->have_posts()): $posts->the_post(); ?>
                            <li>
                                <a class="item" href="<?php echo the_permalink(); ?>">
                                    <span class="img" style="background-image:url(https://via.placeholder.com/300"></span>
                                    <div class="content">
                                        <h3><?php echo the_title(); ?></h3>
                                        <span class="date-create"><?php echo get_the_time() . "|" . get_the_date(); ?></span>
                                        <p class="desc"><?php echo the_excerpt(); ?></p>
                                        <span class="cta">[More..]</span>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                </div>

            <?php wp_reset_postdata(); endif;
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = sanitize_text_field( $new_instance['title'] );
        $instance['image_size'] = sanitize_text_field( $new_instance['image_size'] );
        $instance['term_id'] = sanitize_text_field( $new_instance['term_id'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $title  = isset( $instance['title'] ) ? esc_attr( $instance['title'] ) : '';
        $imageSize  = isset( $instance['image_size'] ) ? esc_attr( $instance['image_size'] ) : '';
        $termId  = isset( $instance['term_id'] ) ? esc_attr( $instance['term_id'] ) : '';

        $sizes = array(
                'large' => 'Large',
                'small' => 'Small'
        );

        $categories = get_terms(array(
            'taxonomy'               => 'category',
            'orderby'                => 'name',
            'order'                  => 'ASC',
            'hide_empty'             => false,
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
            <label for="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>">
                <?php esc_html_e( 'Image size:', 'duongluat' ); ?>
            </label>

            <select
                    class="widefat"
                    id="<?php echo esc_attr($this->get_field_id( 'image_size' )); ?>"
                    name="<?php echo esc_attr($this->get_field_name( 'image_size' )); ?>"
            >
                <?php foreach ($sizes as $id => $value): ?>
                    <option value="<?php echo $id ?>" <?php echo trim($id) == trim($imageSize) ? 'selected="selected"' : '' ?>>
                        <?php echo $value; ?>
                    </option>
                <?php endforeach; ?>
            </select>

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

