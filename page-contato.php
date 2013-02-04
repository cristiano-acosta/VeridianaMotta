<?php /* Template name: contato */ get_header(); ?>
<div role="main">
  <section id="page"> 
    <!--  Páginas de Template name: contato  -->
    <div id="contato">
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

	                <div class="span7 entry-content">
	                  <!-- The content or the description of the event-->
	                  <?php the_content(); ?>

	                </div>
	                <!-- .entry-content -->
	                <div class="contact-form offset1 span3">
	                  <?php echo do_shortcode( '[contact-form-7 id="4" title="Contato"]' ) ?>

	                </div>

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
