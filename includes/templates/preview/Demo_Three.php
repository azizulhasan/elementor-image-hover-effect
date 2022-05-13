<# _.each( settings.material_card, function( item, index ) { #>
				<a href="#" data-path-hover="M 0,0 0,38 90,58 180.5,38 180,0 z">
					<figure>
						<img src="{{{item.image.url}}}" />
						<svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 0 0 L 0 182 L 90 126.5 L 180 182 L 180 0 L 0 0 z "/></svg>
						<figcaption>
							<h2>{{{item.card_title}}}</h2>
							<p>{{{item.card_description}}}</p>
							<button>View</button>
						</figcaption>
					</figure>
				</a>
			<# }) #>