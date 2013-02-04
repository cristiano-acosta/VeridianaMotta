<?php get_header(); ?>
<div role="main">
  <section id="home"> 
		<div id="pages-projetos">
      <div class="container">
        <div class="row">
		      <!--  Paginas da Categoria Projetos!  -->
	          <?php
			        $paginas = new WP_Query(array('post_type' => 'page', 'category_name' => 'projetos', 'order' => 'ASC', 'orderby' => 'menu_order'));
			        while ($paginas->have_posts()) : $paginas->the_post();
			      ?>
	          <article id="page-<?php the_ID(); ?>" class="page span4">
	            <figure><?php echo(types_render_field("icon", array("alt" => "Icone", "title" => "", "proportional" => "true"))); ?></figure>
	            <a href="<?php  the_permalink(); ?>" >
	            <h1>
	              <?php the_title(); ?>
	            </h1>
	            </a>
	            <p>
	              <?php the_excerpt(); ?>
	            </p>
	          </article>
	          <?php endwhile; /* End loop */ ?>
		      <!-- Fin Paginas da Categoria Projetos!  -->
        </div>
      </div>
    </div>
    <!--  Perfil e Principais Projetos  -->
    <div id="perfil-home">
      <div class="container">
        <div class="row">
          <?php
		        $perfil = new WP_Query(array('post_type' => 'page', 'name' => 'perfil'));
		        while ($perfil->have_posts()) : $perfil->the_post();
		      ?>
          <article id="page-<?php the_ID(); ?>" class="page span6">
            <h2>
              <?php the_title(); ?>
            </h2>
            <p>
              <?php the_excerpt(); ?>
            </p>
          </article>
          <?php endwhile; /* End loop */ ?>
          <!-- Galeria de Projetos  -->
          <div id="projetos-home" class="slider-wrapper span6">
            <h2>Projetos Recentes</h2>
            <ul class="slideshow">
              <?php
		            $projetos = new WP_Query(array('post_type' => 'projeto'));
		            while ($projetos->have_posts()) : $projetos->the_post();
		          ?>
              <li>
                <?php // the_post_thumbnail( '', array( 'class' => '' ) ); ?>
                <?php the_post_thumbnail(); ?>
                <a href="<?php  the_permalink(); ?>" title="<?php  the_title(); ?>" >
                <h3>
                  <?php  the_title(); ?>
                </h3>
                </a> </li>
              <?php endwhile; /* End loop */ ?>
            </ul>
            <div class="ancor">
		            <a href="#" class="prev"> << </a> <a href="#" class="toggle"> || </a> <a href="#" class="next"> >> </a>
            </div>
          </div>
        </div>
      </div>
     </div>
		<!--  Fim Perfil e Principais Projetos  -->
  </section>
</div>
<?php get_footer(); ?>
