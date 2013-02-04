		<div id="bg_slides">
			<ul class="rslides">
				<?php
						$slides = new WP_Query( array( 'post_type' => 'slide' ) );
						while ( $slides->have_posts() ) : $slides->the_post();
						if ( has_post_thumbnail() ) {
				?>
						<li>
							<?php the_post_thumbnail( '', array( 'class' => 'full' )  ); ?>
						</li>
				<?php } endwhile; /* End loop */ ?>
			</ul>
		</div>