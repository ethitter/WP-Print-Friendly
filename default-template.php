<!DOCTYPE html>
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
					<p>by <?php the_author(); ?> | <?php the_time( 'F j, Y g:i a' ); ?></p>
					
					<?php
						if( is_attachment() && wp_attachment_is_image() )
							echo '<p>' . wp_get_attachment_image( $post->ID, 'large' ) . '</p>';
							
						the_content();
					?>
					
					<?php
						if( function_exists( 'wpf_the_page_numbers' ) )
							wpf_the_page_numbers( false, '<p class="page_numbers">Page ', ' of ', '</p><!-- .page_numbers -->' );
					?>
					
					<p class="wpf-source"><strong>Source URL:</strong> <?php the_permalink(); ?></p>
					
					<hr class="wpf-divider" />
				</div>
				<?php
			endwhile;
		endif;
	?>
	
		<p class="copyright">Copyright &copy;<?php echo date( 'Y' ); ?> <strong><?php bloginfo( 'name' ); ?></strong> unless otherwise noted.</p>
		
	</body>
</html>