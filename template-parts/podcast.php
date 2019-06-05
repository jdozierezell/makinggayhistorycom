<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package makinggayhistory
 */

?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<h2 class="page__title"><?php the_title(); ?></h2>
		<section class="podcast">
		
				<?php if(get_field('p_image')) :
					$image = get_field('p_image');
					$thumb = $image['sizes']['square'];
					echo '<img class="podcast__image" src="' . $thumb . '" />';
				endif; 
				the_content(); ?>
				
			<footer class="entry-footer">
				<?php making_gay_history_entry_footer(); ?>
			</footer><!-- .entry-footer -->

		</section>
	</main>
</div><!-- #post-## -->