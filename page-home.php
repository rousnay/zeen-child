<?php
/**
 * Page Template
 *
 * @package Zeen
 * @since 1.0.0
* Template Name: Homepage
 */

get_header();
$pw = post_password_required( $post );
$builder = empty( $pw ) ? get_post_meta( $post->ID, 'tipi_builder_active', true ) : '';
$builder_call = TipiBuilder\ZeenHelpers::zeen_frame_call();
if ( empty( $builder ) ) {
	$builder = $builder_call;
}

$args = zeen_get_hero_design( $post->ID, 'pages_' );
$args['is_page'] = 'pages_';
$args['is_builder'] = $builder;
$layout = zeen_get_article_layout( $post->ID );
$post_wrap_class = zeen_post_wrap_class( $post->ID, $args, array( 'page-wrap' ) );
?>
<div id="primary" class="content-area">

	<div id="site-entrance">
		<h3>Entrance block (Under development)</h3>
		<div class="stage">
			<h3>Stage</h3>
			<a class="cycler entrance-link" href="<?php echo bloginfo('url');?>/tag/stage/">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/entrance-placeholder-image.jpg" alt="" width="" height="" />
				<?php query_posts('tag="stage"&posts_per_page=4'); ?>
				<?php while (have_posts()) : the_post(); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entrance-block-thumb');
					$url = $thumb[0];
					?>

					<img class="entrance-thumb" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">

				<?php endwhile; ?>
				<?wp_reset_query(); ?>
			</a>
		</div>
		<div class="screen">
			<h3>Screen</h3>
			<a class="cycler entrance-link" href="<?php echo bloginfo('url');?>/tag/screen/">	
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/entrance-placeholder-image.jpg" alt="" width="" height="" />
				<?php query_posts('tag="screen"&posts_per_page=4'); ?>
				<?php while (have_posts()) : the_post(); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entrance-block-thumb');
					$url = $thumb[0];
					?>

					<img class="entrance-thumb" src="<?php echo $url; ?>" alt="<?php the_title(); ?>">

				<?php endwhile; ?>
				<?wp_reset_query(); ?>
			</a>
		</div>

		<style type="text/css">
			.cycler {
				position:relative;
				display: block;
				line-height: 0;
			}
			.cycler .entrance-thumb{
				position:absolute;
				z-index:1;
				background-color:white;
				top: 0;
			    left: 0;
			    width: 100%;
			}
			.cycler .entrance-thumb.active{
				z-index:3
			}
		</style>
		<script type="text/javascript">
			jQuery(".stage > .cycler > .entrance-thumb:first").addClass("active");
			jQuery(".screen > .cycler > .entrance-thumb:first").addClass("active");

			function cycleImages(){

			      var $activeStage = jQuery('.stage > .cycler .active');
			      var $nextStage = ($activeStage.next().length > 0) ? $activeStage.next() : jQuery('.stage > .cycler .entrance-thumb:first');
			      $nextStage.css('z-index',2);//move the next image up the pile
			      $activeStage.fadeOut(1500,function(){//fade out the top image
				      $activeStage.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
			          $nextStage.css('z-index',3).addClass('active');//make the next image the top one
			      });

			      var $activeScreen = jQuery('.screen > .cycler .active');
			      var $nextScreen = ($activeScreen.next().length > 0) ? $activeScreen.next() : jQuery('.screen > .cycler .entrance-thumb:first');
			      $nextScreen.css('z-index',2);//move the next image up the pile
			      $activeScreen.fadeOut(1500,function(){//fade out the top image
				      $activeScreen.css('z-index',1).show().removeClass('active');//reset the z-index and unhide the image
			          $nextScreen.css('z-index',3).addClass('active');//make the next image the top one
			      });

			    }

			jQuery(document).ready(function(){
			// run every 4s
			setInterval('cycleImages()', 4000);
			});
		</script>
	</div>

	<div id="page-wrap" <?php post_class( $post_wrap_class ); ?>>
		<?php
		if ( ( $args['hero_design'] > 9 || 4 == $args['hero_design'] ) && empty( $builder ) ) {
			zeen_hero_design( $args );
		}
		?>
		<div id="contents-wrap" class="single-content contents-wrap <?php if ( empty( $builder ) ) { echo 'tipi-row content-bg '; } ?>article-layout-<?php echo intval( $layout ); ?> clearfix">
			<?php if ( empty( $builder ) ) { ?>
				<div class="tipi-cols clearfix">
				<?php } ?>
				<?php
				if ( empty( $builder_call ) ) {
					while ( have_posts() ) :
						the_post();
						zeen_single_bones( array(
							'style' => $args,
							'layout' => $layout,
							'builder' => $builder,
						) );
					endwhile;
					zeen_get_sidebar();
				}
				?>
				<?php do_action( 'zeen_end_contents_wrap' ); ?>
				<?php if ( empty( $builder ) ) { ?>
				</div><!-- .tipi-cols -->
			<?php } ?>
		</div><!-- .tipi-row -->
	</div><!-- .post-wrap -->
</div><!-- .content-area -->

<?php
get_footer();
