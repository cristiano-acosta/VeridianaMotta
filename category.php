<?php get_header(); ?>
<div role="main">
  <section id="category">
		<div class="container">
			<div class="row">
				<?php
					$category_slug = get_category (get_query_var('cat'));
					if ( is_category( array( 'projetos','comercial','corporativo', 'design', 'efemero', 'residencial' ) ) ) {
				?>
				<div id="categoria-projetos">
					<header class="span12">
						<div class="row">
							<img src="<?php echo get_template_directory_uri();  ?>/img/ico.projetos.png" class="span1" >
							<h1 class="span11">Projetos realizados na area <?php printf( __( '%s' ), '' . single_cat_title( '',false ) . '' ); ?></h1>
							<p><?php echo category_description( get_category_by_slug( $post_type->name )->term_id ); ?></p>
						</div>
					</header>

					<!-- /*= Categoria do Projeto =*/ -->
					<article id="projetos-da-categoria" class="span12">
						<div class="row">
							<?php
								$projetos = new WP_Query(array('post_type'=>'projeto','category__in'=>get_query_var('cat') ));
								while ($projetos->have_posts()) : $projetos->the_post();
							?>
							<article id="projeto-categoria-<?php echo $category_slug->slug; ?>" class="span2">
								<a href="<?php the_permalink(); ?>" title="<?php the_title();  ?>">
									<h4><i class="icon-<?php echo $category_slug->slug; ?>"></i></h4>
					      	<?php the_post_thumbnail( '', array( 'class' => '' ) ); ?>
									<h4 class="bg-strong"><?php the_title(); ?></h4>
									<p><?php excerpt('5'); ?></p>
								</a>
							</article>
							<?php  endwhile;  ?>
						</div>
					</article>
					<!-- /*= Categoria do Projeto =*/ -->
				</div>
				<?php } else {  //	var_dump($category_slug); ?>
				<div id="<?php echo $category_slug->slug; ?>">
					<header class="span12">
						<div class="row">
							<img src="<?php bloginfo( 'template_url' ); ?>/img/ico.blog.png" class="span1" >
							<h1 class="span11">Artigos do <?php printf( __( '%s' ), '' . single_cat_title( '', false ) . '' ); ?> da Arquiteta</h1>
						</div>
					</header>
					<div class="span9" id="artigos_container">
						<?php while (have_posts()) : the_post(); ?>
						<article id="categoria-<?php echo $category_slug->slug; ?>">
							<div class="row-fluid">
								<div class="data span1">
									<div class="circle">
										<p class="Dia"><?php the_time('j'); ?></p>

										<p class="Mes"><?php the_time('F'); ?></p>
									</div>
								</div>
								<div class="summary span11">
									<h3>
										<a href="<?php the_permalink(); ?>" title="<?php the_title();  ?>"><?php the_title(); ?></a>
									</h3>
									<?php
									if (has_post_thumbnail()) {
										?>
										<div class="conteudo-figura">
											<figure>
												<?php the_post_thumbnail(); ?>
											</figure>
											<div class="resumo ">
												<?php the_excerpt(); ?>
											</div>
										</div>
										<?php } else { ?>
										<div class="resumo ">
											<?php the_excerpt(); ?>
										</div>
										<?php }  ?>
									<div class="autor">
										<p><?php the_author(); ?></p>
									</div>
								</div>
							</div>
						</article>
						<?php endwhile; wp_reset_query();  ?>
					</div>
					<aside id="projetos-rescentes" class="offset1 span2" >
						<div class="row-fluid">
							<h4 style="color: #484639; margin-bottom: 20px;">  Projetos Rescentes  </h4>
							<?php $projetos_rescentes =  new WP_Query( array('post_type' => 'projeto', 'posts_per_page' => 3, 'orderby' => 'date', 'order' => 'ASC'  ) ); while ($projetos_rescentes->have_posts()) : $projetos_rescentes->the_post();  ?>
							<article id="projeto-categoria-" class="span12">
								<a href="<?php the_permalink(); ?>" title="<?php the_title();  ?>">
									<h4><i class="icon-<?php echo $category_slug->slug; ?>"></i></h4>
									<?php the_post_thumbnail('', array('class' => '')); ?>
									<h4 class="bg-strong"><?php the_title(); ?></h4>
									<p><?php excerpt('5'); ?></p>
								</a>
							</article>
							<?php endwhile;  ?>
						</div>
					</aside>
				</div>
				<?php } ?>
			</div>
		</div>
  </section>
</div>
<?php get_footer(); ?>
