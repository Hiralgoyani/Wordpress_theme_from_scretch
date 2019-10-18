<aside class="sidebar">
	<h4>Side Menu</h4>
	<?php 
		if ( is_active_sidebar( 'sidebar' ) ):
			dynamic_sidebar('sidebar');
		endif;
	?>
</aside>