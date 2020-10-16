<?php

add_action( 'widgets_init', 'duongluat_widget_whyvietnam_posts_register' );

function duongluat_widget_whyvietnam_posts_register() {
    register_widget( 'WhyVietnamPostsWidget' );
}

class WhyVietnamPostsWidget extends WP_Widget {

    /*  Sidebar Post Widget Setup  */

    private $services;

    public function __construct() {
        parent::__construct(false, $name = esc_html__('#1 WhyVietnam Posts Widget', 'duongluat' ), array(
            'description' => esc_html__('#1 WhyVietnam Posts Widget', 'duongluat' )
        ));
    }

    /*  Display Widget  */

    public function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
            $args['widget_id'] = $this->id;
        }

        $topContent = ( ! empty( $instance['top_content'] ) ) ? $instance['top_content'] : '';
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

        <div class="module-whyvietnam">
            <div class="heading">
                <div class="content">
                    <p><?php echo $topContent; ?></p>
                </div>
            </div>
            <div class="body">
                <div class="content">
                    <?php if ($posts->have_posts()): $index = 0;?>
                        <ul class="list">
                            <?php while ($posts->have_posts()): $posts->the_post(); $index++;?>
                                <li>
                                    <?php if ($index % 2 !== 0): ?>
                                    <div class="item">
                                        <span class="img" style="background-image:url(<?php echo get_template_directory_uri();  ?>/images/img_whyvietnam.png)"></span>
                                        <div class="desc">
                                            <h2 class="title"><?php echo the_title(); ?></h2>
                                            <p class="text"><?php echo the_content(); ?></p>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                        <div class="item">
                                            <div class="desc">
                                                <h2 class="title"><?php echo the_title(); ?></h2>
                                                <p class="text"><?php echo the_content(); ?></p>
                                            </div>
                                            <span class="img" style="background-image:url(<?php echo get_template_directory_uri();  ?>/images/img_whyvietnam.png)"></span>
                                        </div>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php wp_reset_postdata(); endif; ?>
                </div>
            </div>
        </div>
            <?php
    }

    /*  Update Widget #1  */

    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['top_content'] = sanitize_text_field( $new_instance['top_content'] );
        $instance['term_id'] = sanitize_text_field( $new_instance['term_id'] );

        return $instance;
    }

    /*  Widget #1 Settings Form  */

    public function form( $instance ) {
        $topContent  = isset( $instance['top_content'] ) ? esc_attr( $instance['top_content'] ) : '';
        $termId  = isset( $instance['term_id'] ) ? esc_attr( $instance['term_id'] ) : '';

        $categories = get_terms(array(
            'taxonomy'    => array('category'),
            'orderby'     => 'name',
            'order'       => 'ASC',
            'hide_empty'  => false,
        ));

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'top_content' )); ?>">
                <?php esc_html_e( 'Top content:', 'duongluat' ); ?>
            </label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id( 'top_content' )); ?>"
                   name="<?php echo esc_attr($this->get_field_name( 'top_content' )); ?>">
                <?php echo $topContent; ?>
            </textarea>
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

