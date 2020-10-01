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
                    <div class="market-news col-12 col-md-12 col-lg-6">
                        <h2 class="title">Market News</h2>
                        <ul class="list">
                            <li><a class="item" href="#!"><span class="img" style="background-image:url(https://via.placeholder.com/300"></span>
                                    <div class="content">
                                        <h3>Tin tức thị trường</h3><span class="date-create">08:54 | 14/09/2020</span>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris …. </p><span class="cta">[More..]</span>
                                    </div></a></li>
                            <li><a class="item" href="#!"><span class="img" style="background-image:url(https://via.placeholder.com/360"></span>
                                    <div class="content">
                                        <h3>Tin tức thị trường</h3><span class="date-create">08:54 | 14/09/2020</span>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris …. </p><span class="cta">[More..]</span>
                                    </div></a></li>
                        </ul>
                    </div>
                    <div class="legal-new col-12 col-md-12 col-lg-6">
                        <h2 class="title">Legal News</h2>
                        <ul class="list">
                            <li><a class="item" href="#!"><span class="img" style="background-image:url(https://via.placeholder.com/300"></span>
                                    <div class="content">
                                        <h3>Tin tức thị trường</h3><span class="date-create">08:54 | 14/09/2020</span>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris …. </p><span class="cta">[More..]</span>
                                    </div></a></li>
                            <li><a class="item" href="#!"><span class="img" style="background-image:url(https://via.placeholder.com/360"></span>
                                    <div class="content">
                                        <h3>Tin tức thị trường</h3><span class="date-create">08:54 | 14/09/2020</span>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris …. </p><span class="cta">[More..]</span>
                                    </div></a></li>
                            <li><a class="item" href="#!"><span class="img" style="background-image:url(https://via.placeholder.com/360"></span>
                                    <div class="content">
                                        <h3>Tin tức thị trường</h3><span class="date-create">08:54 | 14/09/2020</span>
                                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate dapibus ortor in tempus. Suspendisse aliquam luctus molestie. Mauris …. </p><span class="cta">[More..]</span>
                                    </div></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
<?php
get_footer();

