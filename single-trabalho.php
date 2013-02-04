<?php get_header(); ?>
	<section id="single">

		<div id="spoiler">
			<div class="container">
				<div class="row">
					<div id="article">
						<?php while (have_posts()) : the_post(); ?>
						<article id="trabalho-<?php the_ID(); ?>" class="span10">
				      <header class="entry-title">
					      <div class="row">
						      <img src="<?php echo (types_render_field("icon", array("alt" => "Icone", "title" => "", "proportional" => "true","url" => "true"))); ?>" class="span1" >
									<h1 class="span11"><?php the_title(); ?></h1>
					      </div>
					    </header>
							<div class="entry-content span9">
								<div class="row">
									<?php if (has_post_thumbnail()) { ?>
										<div class="yes-post_thumbnail span6">
											<?php the_content(); ?>
										</div>
										<figure class="span3">
										 <?php the_post_thumbnail( '', array( 'class' => 'span2' ) ); ?>
										</figure>
									<?php } else { ?>
										<div class="no-post_thumbnail span9">
											<?php the_content(); ?>
										</div>
									<?php } ?>
								</div>
							</div>
							<footer class="entry-caption span9">

							</footer>
		        </article><?php endwhile; // end of the loop. ?>
					</div>
					<div id="aside">
						<aside class="span2">
							<?php
			        $paginas = new WP_Query(array('post_type' => 'page', 'category_name' => 'trabalhos', 'order' => 'ASC', 'orderby' => 'menu_order'));
			        while ($paginas->have_posts()) : $paginas->the_post();
				      ?>
				     <a href="<?php  the_permalink(); ?>" class="" >
					     <article id="page-<?php the_ID(); ?>" class="page span1">
								<img src="<?php echo(types_render_field("icon", array("alt" => "Icone", "title" => "", "proportional" => "true","url" => "true"))); ?>" class="span1" >
			          <h4><?php the_title(); ?></h4>
								</article>
				     </a>
				      <?php endwhile; /* End loop */ ?>
						</aside>
					</div>

				</div>
			</div>
		</div>

		<!--  Página de Perfil  -->
		    <div id="projetos">
			     <div class="container">
		        <div class="row">
			        <header class="entry-title span12">
								<h2>Simulares</h2>
							</header>
			        <?php
			          $category = get_the_category();
								$trabalhos = new WP_Query(array('post_type' => 'trabalho','category_name' => $category[0]->cat_name));
				        while ($trabalhos->have_posts()) : $trabalhos->the_post();
					    ?>
						    <a class="span3" href="<?php  the_permalink(); ?>" title="<?php  the_title(); ?>" >
							    <article id="trabalho-<?php the_ID(); ?>" >
								      <?php the_post_thumbnail( '', array( 'class' => 'span3' ) ); ?>
									    <h3><?php  the_title(); ?></h3>
									    <p><?php excerpt( '30' );?></p>
						      </article>
						    </a>
					    <?php endwhile; /* End loop */ ?>
			      </div>
		      </div>
		    </div>
	</section>
<?php get_footer(); ?>