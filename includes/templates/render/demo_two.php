<?php
$url = esc_url($item['image']['url']);
$title = esc_html($item['card_title']);
$description = esc_html($item['card_description']);
$btn_url = esc_url($item['button_url']['url']);
$target = $item['button_url']['is_external'] ? ' target="_blank"' : '';
$nofollow = $item['button_url']['nofollow'] ? ' rel="nofollow"' : '';
?>

<a href="#" data-path-hover="m 0,0 0,47.7775 c 24.580441,3.12569 55.897012,-8.199417 90,-8.199417 34.10299,0 65.41956,11.325107 90,8.199417 L 180,0 z">
	<figure>
		<img src="<?php echo $url ?>" />
		<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="m 0,0 0,171.14385 c 24.580441,15.47138 55.897012,24.75772 90,24.75772 34.10299,0 65.41956,-9.28634 90,-24.75772 L 180,0 0,0 z"/></svg>
		<figcaption>
			<h2><?php echo $title ?></h2>
            <p><?php echo $description ?></p>
			<button onclick="window.location.href='<?php echo $btn_url
             ?>'" >View</button>
		</figcaption>
	</figure>
</a>