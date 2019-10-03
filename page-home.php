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
		<div class="stage">
			<a class="cycler entrance-link" href="<?php echo bloginfo('url');?>/tag/stage/">
				<div class="block-overlay"><div class="block-name">Stage</div></div>
				<img class="entrance-placeholder" src="<?php echo get_stylesheet_directory_uri(); ?>/images/entrance-placeholder-image.jpg" alt="" width="" height="" />
				<?php query_posts('tag="stage"&posts_per_page=4'); ?>
				<?php while (have_posts()) : the_post(); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entrance-block-thumb-bg');
					$url = $thumb[0];
					?>
					<div class="entrance-thumb" style="background-image:url('<?php echo $url; ?>')">
						<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
					</div>
				<?php endwhile; ?>
				<?wp_reset_query(); ?>
			</a>
		</div>
		<div class="screen">
			<a class="cycler entrance-link" href="<?php echo bloginfo('url');?>/tag/screen/">
				<div class="block-overlay"><div class="block-name">Screen</div></div>	
				<img class="entrance-placeholder" src="<?php echo get_stylesheet_directory_uri(); ?>/images/entrance-placeholder-image.jpg" alt="" width="" height="" />
				<?php query_posts('tag="screen"&posts_per_page=4'); ?>
				<?php while (have_posts()) : the_post(); 
					$thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'entrance-block-thumb-bg');
					$url = $thumb[0];
					?>
					<div class="entrance-thumb" style="background-image:url('<?php echo $url; ?>')">
						<img src="<?php echo $url; ?>" alt="<?php the_title(); ?>">
					</div>
				<?php endwhile; ?>
				<?wp_reset_query(); ?>
			</a>
		</div>

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
</div><!-- .content-area -->

<?php
get_footer();
