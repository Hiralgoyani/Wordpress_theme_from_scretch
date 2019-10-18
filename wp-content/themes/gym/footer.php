<footer class="site-footer container">
	<div class="footer-content">
		<!-- menu start -->
		<?php 
			$args = array(
				'theme_location' => 'main-menu',
				'container' => 'nav',
				'container_class' => 'footer-menu'
			);
			wp_nav_menu($args);
		?>
		<!-- menu end -->
		<p class="copyright">All Right Reserved By : <?php echo get_bloginfo( 'name' )." " . date('Y'); ?></p>
	</div>	
	<?php wp_footer(); ?>
</footer>
</body>
</html>