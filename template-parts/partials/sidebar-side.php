<?php

if (!is_active_sidebar( 'sidebar-side' ) ) {
	return;
}
?>
<aside id="panel-right" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-side' ); ?>
</aside>