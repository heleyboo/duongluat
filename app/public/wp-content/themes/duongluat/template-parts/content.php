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
            <div class="date-modified"> Last modified: <?php echo get_the_date(); ?></div>
        </div>
        <div class="body-content">
            <?php the_content(); ?>
            <div class="post-views"><i class="far fa-eye"></i><span>Post Views: 1,328</span></div>
        </div>
    </div>
</div>
