<?php
	global $post;
	$game_allowed_html = array(
		'a' => array(
			'href' => true,
			'title' => true,
			'target' => true,
			'rel' => true
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
		'span' => array(
			'class' => true
		),
		'div' => array(
			'class' => true
		),
		'p' => array()
	);

	$game_short_desc = wp_kses( get_post_meta( get_the_ID(), 'game_short_desc', true ), $game_allowed_html );
	$game_external_link = esc_url( get_post_meta( get_the_ID(), 'game_external_link', true ) );
	$game_button_title = esc_html( get_post_meta( get_the_ID(), 'game_button_title', true ) );
	$game_button_notice = wp_kses( get_post_meta( get_the_ID(), 'game_button_notice', true ), $game_allowed_html );

	if ($game_button_title) {
		$button_title = $game_button_title;
	} else {
		if ( get_option( 'games_play_now_title') ) {
			$button_title = esc_html( get_option( 'games_play_now_title') );
		} else {
			$button_title = esc_html__( 'Play Now', 'mercury' );
		}
	}

	if ($game_external_link) {
		$external_link_url = $game_external_link;
	} else {
		$external_link_url = get_the_permalink();
	}

	$terms = get_the_terms( $post->ID, 'game-category' );
?>

<div class="space-games-archive-item box-25 left relative">
	<div class="space-games-archive-item-ins relative">
		<?php $widget_img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'mercury-450-317'); if ($widget_img) { ?>
		<div class="space-games-archive-item-img relative">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<img src="<?php echo esc_url($widget_img[0]); ?>" alt="<?php the_title_attribute(); ?>">
			</a>
		</div>
		<?php } ?>

		<div class="space-games-archive-item-wrap text-center relative">
			<div class="space-games-archive-item-title relative">
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			</div>

			<?php if ($game_short_desc) { ?>
			<div class="space-games-archive-item-short-desc relative">
				<?php echo wp_kses( $game_short_desc, $game_allowed_html ); ?>
			</div>
			<?php } ?>

			<div class="space-games-archive-item-button relative">
				<a href="<?php echo esc_url( $external_link_url ); ?>" title="<?php echo esc_attr( $button_title ); ?>" <?php if ($game_external_link) { ?>target="_blank" rel="nofollow"<?php } ?>><?php echo esc_html( $button_title ); ?></a>
			</div>

			<?php if ($game_button_notice) { ?>

			<div class="space-games-archive-item-button-notice relative">
				<?php echo wp_kses( $game_button_notice, $game_allowed_html ); ?>
			</div>

			<?php } ?>
			
		</div>
	</div>
</div>