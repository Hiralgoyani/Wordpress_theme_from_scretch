<?php 
/*
 * Template Name: Gallery
 */
?>


<?php get_header(); ?>
	
	<main class="container page section gallery-div">
		<?php while(have_posts()): the_post(); ?>
			<h1 class="text-primary"><?php the_title() ;?></h1>

			<?php 
				$gallery = get_post_gallery( get_the_ID(), false );
				$gallery_images_ids = explode(',', $gallery['ids']);
				foreach ($gallery_images_ids as $id) {
					$image = wp_get_attachment_image_src( $id,'glryimg');
					?>
					<a href="<?php echo $image[0] ?>" data-lightbox="gallery">
						<img src="<?php echo $image[0] ?>" alt="" /> 						
					</a>
					<?php
				}

			?>

		
			<?php //the_content(); ?>			
		<?php endwhile; ?>
		
	</main>

<?php get_footer(); ?>