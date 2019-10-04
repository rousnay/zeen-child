<?php
/**
 * @package Zeen
 * @since 1.0.0
 */
?>
		</div><!-- .site-content -->
		<?php
		zeen_instagram_block( array(
			'placement' => 1,
			'location' => 'footer',
		) );
		?>
		<footer id="colophon" class="site-footer site-footer-<?php echo (int) zeen_get_style( 'footer' ); ?> site-img-<?php echo (int) zeen_skin_style( 'footer', 'repeat' ); ?> widget-area-borders-<?php echo (int) get_theme_mod( 'footer_widget_borders', 1 ); ?> footer-<?php if ( get_theme_mod( 'footer_width', 1 ) == 1 ) { echo 'fs'; } else { echo 'box'; } ?> <?php if ( get_theme_mod( 'footer_widgets_centered' ) == 1 ) { echo ' widget-title-center'; } else { echo ' widget-title-default'; } ?> clearfix">
			<div class="bg-area">
				<?php if ( get_theme_mod( 'footer_splitter_top_onoff' ) == 1 ) { ?>
					<?php zeen_shape( array( 'shape' => get_theme_mod( 'footer_splitter_top' ), 'location' => 'top' ) ); ?>
				<?php } ?>
				<div class="bg-area-inner">
					<?php get_template_part( 'template-parts/footer/footer-widget', 1 ); ?>

					<div class="footer-lower-area footer-area clearfix site-skin-<?php echo (int) get_theme_mod( 'footer_skin', 2 ); ?>">

						<div class="tipi-row tipi-flex tipi-xs-flex-full">

							<div class="logo-copyright-block">

								<?php zeen_logo( 'footer' ); ?>

								<?php //zeen_copyright_line(); ?>
								<div class="copyright font-1 copyright-l">
									<a href="<?php echo get_stylesheet_directory_uri(); ?>/assets/Privacy-Notice-Keddie-Scott-Associates-Ltd.pdf">Privacy Policy</a>
								</div>
							</div>

							<div class="tipi-flex-right">
								<div class="kas-member">Members of the PMA</div>
								<a class="ksa-thepma" target="_blank" href="http://www.thepma.com"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/pma.png" alt="Members of the PMA"></a>
								<?php zeen_footer_icons(); ?>

								<?php get_template_part( 'template-parts/menu/menu-footer', 1 ); ?>

								<?php zeen_to_top( '', 'footer' ); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer><!-- .site-footer -->
		<?php do_action( 'zeen_after_footer' ); ?>
		<?php
		zeen_instagram_block( array(
			'placement' => 2,
			'location' => 'footer',
		) );
		?>

	</div><!-- .site-inner -->

</div><!-- .site -->
<?php zeen_slide_menu(); ?>
<?php zeen_slide_menu( 'slide' ); ?>
<?php do_action( 'zeen_after_site' ); ?>
<?php wp_footer(); ?>
</body>
</html>