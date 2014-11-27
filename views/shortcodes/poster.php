<?php
/**
 * Movie Poster Shortcode view Template
 * 
 * Showing a movie's poster.
 * 
 * @since    1.2.0
 * 
 * @uses    $size
 * @uses    $movie_id
 * @uses    $poster
 */
?>

	<div class="wpmoly shortcode block <?php echo $size ?> poster">
		<a class="wpmoly shortcode block <?php echo $size ?> poster link wpmoly-fancybox" href="<?php echo $poster['full'][0] ?>" data-fancybox-group="wpmoly-poster-<?php echo $movie_id ?>" title="">
			<img src="<?php echo $poster['thumbnail'][0] ?>" width="<?php echo $poster['thumbnail'][1] ?>" height="<?php echo $poster['thumbnail'][2] ?>" alt="" />
		</a>
	</div>
