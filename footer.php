<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package makinggayhistory
 */

?>

	</div><!-- #content -->
				
				<?php $upload_dir = wp_upload_dir(); ?>



	<footer class="footer" role="contentinfo">
		<div class="footer__content">

				<?php if(!is_page('About Making Gay History')) : ?>

			<div class="footer__partner">
				<a href="http://www.nypl.org" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2016/11/nypl_logo.jpeg" />
				</a>
			</div>
			<div class="footer__partner">
				<a href="http://www.onearchives.org" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2016/12/ONE-AF.jpg" />
				</a>
			</div>
			<div class="footer__partner">
				<a href="https://www.fordfoundation.org" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2016/09/images.jpg" />
				</a>
			</div>
			<div class="footer__partner">
				<a href="https://jonathanloganfamilyfoundation.org/about" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2016/09/jlff.png" />
				</a>
			</div>
			<div class="footer__partner">
				<a href="http://www.calamusfoundation.org/" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2018/06/calamus.png" />
				</a>
			</div>
			<div class="footer__partner">
				<a href="http://pineapple.fm" target="_blank">
					<img src="<?php echo $upload_dir['baseurl']; ?>/2018/06/pineapple-wide-rule.jpg" />
				</a>
			</div>

				<?php endif; ?>

			<div class="footer__copy">
				<p>&copy; <?php echo date('Y'); ?> Eric Marcus &amp; Sara Burningham</p>
			</div>
		</div>
	</footer>
</div><!-- #page -->



<div class="modal__overlay"></div>
<div class="modal">
	<h2 class="modal__title">Choose your player</h2>
	<div class="modal__buttons">
		<a class="modal__button" id="iTunes" href="https://itunes.apple.com/podcast/id1162447122" target="_blank">iTunes Podcasts</a>
		<a class="modal__button" id="stitcher" href="http://www.stitcher.com/podcast/101533" target="_blank">Stitcher</a>
		<a class="modal__button" id="googlePlay" href="https://play.google.com/music/listen#/ps/Ix2nqacftzy2vy3zl442dlqe2qa" target="_blank">Google Play</a>
		<a class="modal__button" id="spotify" href="https://open.spotify.com/show/1NlHk37Vo7HlGE1CFg8uGx" target="_blank">Spotify</a>
	</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($){
	$('#subscribe_button, #podcast_subscribe a').on('click',function(e){
		e.preventDefault();
		$('.modal__overlay, .modal').css('display','block');
	});
	$('.modal__overlay').on('click',function(){
		$('.modal__overlay, .modal').css('display','none');
	});
});
</script>

<?php wp_footer(); ?>

</body>
</html>
