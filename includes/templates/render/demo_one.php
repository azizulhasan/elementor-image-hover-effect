<?php
$url = esc_url($item['image']['url']);
$title = esc_html($item['card_title']);
$description = esc_html($item['card_description']);
$btn_url = esc_url($item['button_url']['url']);
$target = $item['button_url']['is_external'] ? ' target="_blank"' : '';
$nofollow = $item['button_url']['nofollow'] ? ' rel="nofollow"' : '';

?>

<a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z">
    <figure>
        <img src="<?php echo $url ?>" />
        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
        <figcaption>
            <h2><?php echo $title ?></h2>
            <p><?php echo $description ?></p>
            <button onclick="window.open(<?php echo $btn_url?>, <?php echo $target; ?> " >View</button>
        </figcaption>
    </figure>
</a>