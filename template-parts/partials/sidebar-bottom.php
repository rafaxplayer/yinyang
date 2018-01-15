<?php

if (!is_active_sidebar( 'sidebar-bottom' ) ) {
	return;
}
?>

<aside class="widget-area">
	<?php dynamic_sidebar( 'sidebar-bottom' ); ?>
</aside>