<?php	/* Arquivo: Projetos */ get_header(); ?>
<div role="main">
  <section id="archive">
    <!--  Arquivo: Projetos  -->
    <div id="projetos">
      <div class="container">
        <div class="row">
          <?php
	          $projetos = new WP_Query(array('post_type' => 'page', 'name' => 'projetos'));
		        while ($projetos->have_posts()) : $projetos->the_post();
	        ?>
	          <article id="page-<?php the_ID(); ?>" class="span12">
	            <div class="row">
	              <header class="span12">
	                <div class="row">
			              <img src="<?php echo(types_render_field("icon", array("alt" => "Icone", "title" => "", "proportional" => "true","url" => "true"))); ?>" class="span1" >
	                  <h1 class="span11">
	                    <?php the_title(); ?>
	                  </h1>
			              <?php the_category(); ?>
	                </div>
	              </header>
	              <div class="article">
	                <?php if (has_post_thumbnail()) { ?>
	                <div class="span9 entry-content">
	                  <!-- The content or the description of the event-->
	                  <?php the_content(); ?>
	                </div>
	                <!-- .entry-content -->
	                <figure class="span3">
	                  <?php the_post_thumbnail( '', array( 'class' => 'span2' ) ); ?>
	                </figure>
	                <?php } else { ?>
	                <div class="span12 entry-content">
	                  <?php the_content(); ?>
	                </div>
	                <!-- .entry-content -->
	                <?php } ?>
	              </div>
	              <footer class="span8"> </footer>
	            </div>
	          </article>
		      <?php  endwhile; wp_reset_query();  ?>
          <aside id="page-<?php the_ID(); ?>" class="span12">
            <div class="row">
              <?php
	            global $post;
	            $args = array('orderby' => 'name', 'order' => 'ASC', 'child_of' => '35', 'hide_empty' => 0,);
	            $categories = get_categories($args);
	            /*= Loop de categorias  =*/
	              foreach ($categories as $category) {
		          ?>
		            <article id="category-<?php echo $category->name; ?>">
				          <a href="<?php echo get_category_link( $category->term_id ); ?>" title="<?php echo $category->name;
					          ?>">
						        <h4><i class="icon-<?php echo $category->name; ?>"></i></h4>
					          <?php
		                $projetos = new WP_Query(array('post_type'=>'projeto','posts_per_page'=>'1','category__in'=>$category->term_id ));
										while ($projetos->have_posts()) : $projetos->the_post();
											the_post_thumbnail();
										endwhile; /*End loop*/
										?>
						        <h4 class="bg-strong"> <?php echo $category->name; ?> </h4>
				          </a>
								</article>
		          <?php
								}/*= Loop de categorias  =*/
	            ?>
            </div>
          </aside>
        </div>
      </div>
    </div>

  </section>
</div>
<?php get_footer(); ?>
