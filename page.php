<?php
	get_header();
?>

<div role="main">
  <section id="page"> 
    <!--  Páginas  -->
    <div id="pages">
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
        </div>
      </div>
    </div>
    <?php  endwhile;  ?>
  </section>
</div>
<?php get_footer(); ?>
