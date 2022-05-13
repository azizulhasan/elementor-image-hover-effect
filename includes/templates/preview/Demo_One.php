<#
             _.each( settings.image_hover_effect_card, function( item, index ) { 
                
                #>
               
			  
                <a href="#" data-path-hover="m 180,34.57627 -180,0 L 0,0 180,0 z" class="elementor-repeater-item-{{{item.id}}}">
                    <figure>
                        <img src="{{{item.image.url}}}" />
                        <svg viewBox="0 0 180 320" preserveAspectRatio="none"><path d="M 180,160 0,218 0,0 180,0 z"/></svg>
                        <figcaption>
                            <h2>{{{item.card_title}}}</h2>
                            <p>{{{item.card_description}}}</p>
                            <button>View</button>
                        </figcaption>
                    </figure>
                </a>
			 <# }) #>