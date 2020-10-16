<?php
/*
Template Name: Homepage (For homepage Widgets)
*/
?>

<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package beautyspa
 */

get_header();
?>
        <?php
            if ( is_active_sidebar( 'homepage-central-block' ) ) {
                dynamic_sidebar( 'homepage-central-block' );
            }
        ?>

        <div class="module-news-home">
            <div class="container">
                <div class="row">
                    <?php
                        if ( is_active_sidebar( 'homepage-post-block' ) ) {
                            dynamic_sidebar( 'homepage-post-block' );
                        }
                    ?>
                </div>
            </div>
        </div>
<?php
get_footer();

