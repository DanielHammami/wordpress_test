<?php
/**
 * side bar template
 * @subpackage spasalon
 */
?>

<?php if ( is_active_sidebar( 'sidebar-1' )  ) : ?>
<!--Sidebar-->
<div class="col-md-4 col-xs-12">
	<div class="sidebar">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div>
</div>
<!--/End of Sidebar-->
<?php endif; ?>