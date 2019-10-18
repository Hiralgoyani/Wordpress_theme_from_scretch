<?php get_header('front'); ?>

	<?php while(have_posts()): the_post(); ?>

	<section class="welcome text-center section">
		<h2 class="text-primary"><?php the_field('welcome_heading'); ?></h2>
		<p><?php the_field('welcome_text'); ?></p>
	</section>

	<!-- Welcome section start -->
	<section class="section-areas">
		<ul class="areas-container">
			<li class="area">
				<?php 
					$area1 = get_field('area_1');
					$image = wp_get_attachment_image_src( $area1['area_image'], 'blog')[0];
				?>
				<img src="<?php echo $image; ?>" />
				<p><?php echo $area1['area_name']; ?></p>
			</li>

			<li class="area">
				<?php 
					$area2 = get_field('area_2');
					$image = wp_get_attachment_image_src( $area2['area_image'], 'blog')[0];
				?>
				<img src="<?php echo $image; ?>" />
				<p><?php echo $area2['area_name']; ?></p>
			</li>

			<li class="area">
				<?php 
					$area3 = get_field('area_3');
					$image = wp_get_attachment_image_src( $area3['area_image'], 'blog')[0];
				?>
				<img src="<?php echo $image; ?>" />
				<p><?php echo $area3['area_name']; ?></p>
			</li>

			<li class="area">
				<?php 
					$area4 = get_field('area_4');
					$image = wp_get_attachment_image_src( $area4['area_image'], 'blog')[0];
				?>
				<img src="<?php echo $image; ?>" />
				<p><?php echo $area4['area_name']; ?></p>
			</li>
		</ul>
	</section>
	<!-- Welcome section end -->

	<!-- Classes section start -->
	<section class="classes-homepage section">
		<div class="container text-center">
			<h2 class="text-primary text-center">Our Classes</h2>
			<?php gymfitness_classes_list(4); ?>

			<div class="button-container">
				<a class="button" href="<?php echo get_permalink( get_page_by_title( 'Classes' ) ); ?>">
					View all classes
				</a>
			</div>
		</div>
	</section>
	<!-- Classes section end -->
	

	<!-- Instructors section start -->
	<section class="instructors">
		<div class="container section">
			<h2 class="text-center">Our Instructors</h2>
			<p class="text-center">Professional instuctors that will help you to achieve your goals</p>

			<?php gymfitness_instructors_list(); ?>	

		</div>
	</section>
	<!-- Instructors section end -->


	<!-- Testimonial section start -->
	<section class="testimonials">
		<h2 class="text-center">Testimonials</h2>

		<div class="container-testimonials">
			<ul class="testimonials-list">
				<?php 
					$args = array(
						'post_type' => 'testimonials',
						'posts_per_page' => 10
					);
					$testimonials = new WP_Query($args);
					while($testimonials->have_posts()): $testimonials->the_post(); ?>
						<li class="testimonial text-center">
							<blockquote>
								<p><?php the_content(); ?></p>
							</blockquote>

							<footer class="testimonial-footer">
								<?php the_post_thumbnail( 'thumbnail' ); ?>
								<p><?php the_title(); ?></p>
							</footer>
						</li>
				<?php endwhile; wp_reset_postdata();
				?>
			</ul>
		</div>	
	</section>
	<!-- Testimonial section end -->


	<!-- Blog section start -->
	<section class="blog container section">
		<h2 class="text-center">Our Blog</h2>
		<p class="text-center">Read our export blog posts to achieve your goals</p>
		<ul class="blog-entries">
			<?php 
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 4
				);
				$blog = new WP_Query($args);
				while($blog->have_posts()): $blog->the_post(); ?>
					<?php get_template_part( 'template-parts/blog','loop' ) ?>
			<?php endwhile;	wp_reset_postdata(); ?>
			
		</ul>
	</section>
	<!-- Blog section end -->


	<?php endwhile; ?>

<?php get_footer(); ?>