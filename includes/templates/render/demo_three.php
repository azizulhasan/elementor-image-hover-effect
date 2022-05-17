<?php
    $url = esc_url( $item['image']['url'] );
    $title = esc_html( $item['card_title']  );
    $description = esc_html( $item['card_description']  );
?>


<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
	<figure>
		<img src="<?php echo $url ?>" />
		<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
		<figcaption>
			<h2><?php echo $title ?></h2>
            <p><?php echo $description ?></p>
			<button>View</button>
		</figcaption>
	</figure>
</a>