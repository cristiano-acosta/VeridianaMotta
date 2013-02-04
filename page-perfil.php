<?php /* Template name: Perfil */ get_header(); ?>
<div role="main">
  <section id="page"> 
    <!--  Páginas de Template name: Perfil  -->
    <div id="perfil">
      <div class="container">
        <div class="row">
          <?php while (have_posts()) : the_post(); ?>
	          <article id="page-<?php the_ID(); ?>" class="span12">
	            <div class="row">
	              <header class="span12">
	                <div class="row"> <img src="<?php echo(types_render_field("icon", array("alt" => "Icone", "title" => "", "proportional" => "true","url" => "true"))); ?>" class="span1" >
	                  <h1 class="span11">
	                    <?php the_title(); ?>
	                  </h1>
	                </div>
	              </header>
	              <article id="page-<?php the_ID(); ?>">
	                <?php if (has_post_thumbnail()) { ?>
	                <div class="span7 entry-content">
	                  <!-- The content or the description of the event-->
	                  <?php the_content(); ?>
	                </div>
	                <!-- .entry-content -->
	                <figure class="offset1 span3">
	                  <?php the_post_thumbnail( '', array( 'class' => 'span2' ) ); ?>
			              <h4 class="span3">Veridiana Motta - Arquiteta</h4>
	                </figure>
	                <?php } else { ?>
	                <div class="span12 entry-content">
	                  <?php the_content(); ?>
	                </div>
	                <!-- .entry-content -->
	                <?php } ?>
	              </article>
	              <footer class="span12"> </footer>
	            </div>
	          </article>
	        <?php  endwhile;  ?>
        </div>
      </div>
    </div>
  </section>
</div>
<?php get_footer(); ?>
