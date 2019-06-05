<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package makinggayhistory
 */

?>

				<?php $image = get_field('n_image');
				$thumb = $image['sizes']['medium_large'];
				$cat = get_category(get_field('n_source'));
				$source = $cat->name;
				$news_source = get_field('n_news_source');
				$border = get_field('n_border') == 'yes' ? '1px solid #000000' : '0'; ?>

<article class="news__entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<section class="news__content">
		<img class="news__image" style="border:<?php echo $border; ?>;" src="<?php echo $thumb ?>" />
		<div class="news__body">
			<h2 class="news__title"><?php the_title(); ?></h2>

				<?php if($news_source != '') : ?>

			<h4 class="news__source"><?php echo $news_source; ?></h4>

				<?php endif;
				the_field('n_description'); ?>

		</div>
		<a class="news__link button" href="<?php echo the_field('n_link'); ?>" target="_blank">Read More</a>
	</section><!-- .entry-content -->

</article><!-- #post-## -->
