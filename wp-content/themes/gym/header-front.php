<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="utf-8" name="viewport" content= "width=device-width, initial-scale=1.0"> 
	<title>Gym</title>
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header" class="site-header">
		<!-- logo start -->
		<div class="container header-grid">
			<div class="navigation-bar">
				<div class="logo">
					<a href="<?php echo home_url(); ?>"><img src="<?php echo get_stylesheet_directory_uri()."/img/logo.svg" ?>" alt="logo" /></a>
				</div>
				<!-- menu start -->
				<?php 
					$args = array(
						'theme_location' => 'main-menu',
						'container' => 'nav',
						'container_class' => 'main-menu'
					);
					wp_nav_menu($args);
				?>
				<!-- menu end -->
			</div>
			<div class="tagline text-center">
				<h2><?php the_field('hero_tagline') ?></h2>
				<p><?php the_field('hero_content') ?></p>
			</div>
		</div>
		<!-- logo end -->
		
	</header><!-- /header -->