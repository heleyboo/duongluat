<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package freewpthemes
 */

?>
<div class="main-banner" style="background-image:url(<?php echo get_template_directory_uri(); ?>/img/4.jpg);">
    <div class="container">
        <div class="col-md-12">

            <?php
            if ( is_home() && current_user_can( 'publish_posts' ) ) :

                printf(
                    '<p>' . wp_kses(
                    /* translators: 1: link to WP admin new post page. */
                        __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'freewpthemes' ),
                        array(
                            'a' => array(
                                'href' => array(),
                            ),
                        )
                    ) . '</p>',
                    esc_url( admin_url( 'post-new.php' ) )
                );

            elseif ( is_search() ) :
                ?>

                <div class="caption text-center cl-white">
                    <h2>Discover 1000+  high quality, free Wordpress Themes & Plugins </h2>
                    <p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'freewpthemes' ); ?></p>
                </div>

                <?php
                get_search_form();

            else :
                ?>

                <div class="caption text-center cl-white">
                    <h2>Discover 1000+  high quality, free Wordpress Themes & Plugins </h2>
                    <p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'freewpthemes' ); ?></p>
                </div>

                <?php
                get_search_form();

            endif;
            ?>
        </div>
    </div>
</div>




