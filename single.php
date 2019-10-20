<?php
/**
 * @package Zeen
 * @since 1.0.0
*/

get_header();
$ipl = get_theme_mod( 'ipl' );
$args = zeen_get_hero_design( $post->ID );
$layout = zeen_get_article_layout( $post->ID, $args );
$post_wrap_class = zeen_post_wrap_class( $post->ID, $args );
$ipl_args = array();
?>
<div id="primary" class="content-area">

	<div <?php post_class( $post_wrap_class ); ?>>
		<?php
		if ( $args['hero_design'] > 9 || 4 == $args['hero_design'] ) {
			zeen_hero_design( $args );
		}
		?>
		<div class="single-content contents-wrap tipi-row content-bg clearfix article-layout-<?php echo (int) $layout; ?><?php if ( empty( $args['fi'] ) ) { echo ' no-fi-wrap'; } ?><?php if ( $layout > 30 && $layout < 40 && 25 == $args['hero_design'] ) { echo ' limited-width-cut'; } ?>">
			<div class="title-wrap ksa-post-title"><h1 class="entry-title title flipboard-title"><?php the_title(); ?></h1></div>
			<div class="tipi-cols clearfix">
		<?php
		while ( have_posts() ) :
			the_post();
			zeen_single_bones( array(
				'style' => $args,
				'layout' => $layout,
			) );
			if ( ! empty( $ipl ) ) {
				$ipl_args = zeen_ipl_args( $post->ID );
			}
		endwhile;
		zeen_get_sidebar( $args );
		?>

		</div><!-- .tipi-cols -->
		
		</div><!-- .tipi-row -->
	</div><!-- .post-wrap -->
	<?php do_action( 'zeen_single_end' ); ?>
	<?php zeen_ipl_base( $ipl_args ); ?>

</div><!-- .content-area -->
<?php
if ( ! empty( $ipl ) && ! empty( $next_post ) ) {
	echo '<div id="ipl-loader" class="ipl-loader tipi-spin"></div>';
}
get_footer();
