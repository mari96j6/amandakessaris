<?php
/**
 * The template for displaying footer.
 *
 * @package HelloElementor
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

$footer_nav_menu = wp_nav_menu( [
	'theme_location' => 'menu-2',
	'fallback_cb' => false,
	'echo' => false,
] );
?>
<footer id="site-footer" class="site-footer" role="contentinfo">
	<?php if ( $footer_nav_menu ) : ?>
		<nav class="site-navigation" role="navigation">
			<?php
			// PHPCS - escaped by WordPress with "wp_nav_menu"
			echo $footer_nav_menu; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			?>
		</nav>
	<?php endif; ?>

	<style>
	html, body {
    height: 100%;
    width: 100%;
    margin: 0;
    display: table;
}
footer  {
    display: table-row;
    height: 0;
	text-align: center;
}
footer p {
	margin-top: 3rem;
}
</style>


	<p>Copyright AMANDA KESSARIS 2022</p>
</footer>
