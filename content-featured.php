<?php

$tag = get_theme_mod('zap_slidertag', '');
$limit = get_theme_mod('zap_sliderlimit', '-1');

if ( !$tag ) {
	return;
}

query_posts(array(
	'post_type' => 'post',
	'posts_per_page' => $limit,
	'tag' => $tag

));

if ( !have_posts() ) {
	wp_reset_query();
	wp_reset_postdata();
	return;
}

$output = '
<div class="frontpage-slider-wrapper">';

while(have_posts()) {
	the_post();

	$img = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
	$bacground = '';

	if ( !empty($img['0']) ) {
		$bacground = ' style="background: url('.$img['0'].') no-repeat;"';
	}

	$output .= '<div class="fp-slide-container"'.$bacground.'>';
			$output .= '<div class="fp-slide-inner-container">';
				$output .= '<div class="fp-slide-title paint-area paint-area--text">' . get_the_title() . '</div>';
				$output .= '<div class="fp-slide-excerpt paint-area paint-area--text">' . get_the_excerpt() . '</div>';
				$output .= '<a href="' . get_the_permalink() . '" class="fp-slide-readmore icon-right paint-area paint-area--text">' . __('Read More', 'zap-lite') . '</a>';
			$output .= '</div>';
	$output .= '</div>';
}

$output .= '</div>';

wp_reset_query();
wp_reset_postdata();

echo $output;