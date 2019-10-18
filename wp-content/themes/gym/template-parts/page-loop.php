<?php while(have_posts()): the_post(); ?>
	<h1 class="text-primary"><?php the_title() ;?></h1>
	<div class="">
		<?php 
			if (has_post_thumbnail()):
				the_post_thumbnail('single-img', array('class'=>'featured-image'));
			//else:
				//echo "<p>There is no image...</p>";
			endif;

			// Check the current post type
			if (get_post_type() === 'gymfitness_classes'): 
				$start_time = get_field('start_time');
				$end_time = get_field('end_time');
			?>
				<p class="content-class">
					<?php echo the_field('class_days') . " - " . $start_time . " to " . $end_time; ?>
				</p>
			<?php
			endif;
		?>
		<p><?php the_content(); ?></p>			
	</div>
<?php endwhile; ?>