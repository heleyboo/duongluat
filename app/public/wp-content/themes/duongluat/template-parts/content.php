<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package beautyspa
 */

?>

<div class="module-new-detail">
    <?php the_title( '<h1 class="title-detail">', '</h1>' ); ?>
    <div class="wrap-content-detail">
        <div class="heading-content">
            <div class="info">
                <p class="tweet"><i class="fab fa-twitter"></i><span class="text">Tweet</span></p>
                <p class="fb"><i class="fas fa-thumbs-up"></i><span class="text">Like 10</span></p>
                <p class="email"><i class="far fa-envelope"></i><span>Email</span></p>
                <p class="linked"><i class="fab fa-linkedin"></i><span class="text">Share</span></p>
            </div>
            <div class="date-modified"> Last modified: <?php echo get_the_date(); ?></div>
        </div>
        <div class="body-content">
            <?php the_content(); ?>
            <div class="post-views"><i class="far fa-eye"></i><span>Post Views: 1,328</span></div>
        </div>
    </div>
</div>
