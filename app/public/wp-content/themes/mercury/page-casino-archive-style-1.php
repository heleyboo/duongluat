<?php
/*
Template Name: Casinos Archive Style #1
*/
?>
<?php get_header(); ?>


<!-- Archive Section Start -->

<div class="space-archive-section box-100 relative space-casino-archive">
	<div class="space-archive-section-ins space-page-wrapper relative">
		<div class="space-casino-archive-ins box-100 relative">
			<div class="space-companies-archive-items box-100 relative">

				<?php
				$paged = $wp_query->get( 'paged' );
				$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
				$wp_query = new WP_Query(array(
					'post_type' => 'theme',
                    'posts_per_page' => 2,
                    'paged' => $paged
				));
				if ( have_posts() ) : while ( have_posts() ) : the_post();

					get_template_part( '/aces/casino-item-style-1' );

				endwhile;
				?>

				<!-- Archive Navigation Start -->

				<?php
					the_posts_pagination( array(
						'end_size' => 10,
						'prev_text'    => esc_html__('&laquo;', 'mercury'),
						'next_text'    => esc_html__('&raquo;', 'mercury'),
					));
				?>

				<!-- Archive Navigation End -->

				<?php else : ?>

				<!-- Posts not found Start -->

				<div class="space-page-content-wrap relative">
					<div class="space-page-content page-template box-100 relative">
						<h2><?php esc_html_e( 'Posts not found', 'mercury' ); ?></h2>
						<p>
							<?php esc_html_e( 'No posts has been found. Please return to the homepage.', 'mercury' ); ?>
						</p>
					</div>
				</div>

				<!-- Posts not found End -->

				<?php
					wp_reset_postdata();
					endif;
				?>

			</div>
		</div>
	</div>
</div>

<!-- Archive Section End -->

<?php get_footer(); ?>