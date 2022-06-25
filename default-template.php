<?php
// phpcs:ignoreFile -- legacy code in need of refactoring.
?><!DOCTYPE html>
<html>
	<head>
		<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' ); ?></title>
		<link rel="canonical" href="<?php the_permalink(); ?>" />
		<meta name="robots" content="noindex" />
	</head>
	<body <?php body_class(); ?>>

	<?php
		if( have_posts() ):
			while( have_posts() ):
				the_post();
				?>
				<div <?php post_class(); ?>>
					<h1><?php the_title(); ?></h1>
					<p>by <?php the_author(); ?> | <?php the_time( get_option( 'date_format' ) . ' ' . get_option( 'time_format' ) ); ?></p>

					<?php
						if( is_attachment() && wp_attachment_is_image() )
							echo '<p>' . wp_get_attachment_image( $post->ID, 'large' ) . '</p>';

						the_content();
					?>

					<?php
						if( function_exists( 'wpf_the_page_numbers' ) )
							wpf_the_page_numbers( false, '<p class="page_numbers">Page ', ' of ', '</p><!-- .page_numbers -->' );
					?>

					<p class="wpf-source">
						<?php
							printf(
								/* translators: 1. Post permalink. */
								__(
									'<strong>Source URL:</strong> %1$s',
									'wp-print-friendly'
								),
								get_the_permalink()
							);
						?>
					</p>

					<hr class="wpf-divider" />
				</div>
				<?php
			endwhile;
		endif;
	?>

		<p class="copyright">
			<?php
				printf(
					/* translators: 1. Copyright year, 2. Site name. */
					__(
						'Copyright &copy;%1$d %2$s unless otherwise noted.',
						'wp-print-friendly'
					),
					date( 'Y' ),
					get_bloginfo( 'name' )
				);
			?>
		</p>

	</body>
</html>
