<?php get_header(); ?>

<section id="single"> 
  <!--  Post e Post Projetos  -->
  <div id="post">
    <div class="container">
      <div class="row">
        <header class="span12">
          <div class="row"> </div>
        </header>
        <?php while (have_posts()) : the_post(); ?>
        <article id="single-<?php the_ID(); ?>" class="span12">
          <div class="row">
            <div class="entry-title">
              <h1 class="span12" >
                <?php the_title(); ?>
              </h1>
            </div>
            <?php if (has_post_thumbnail()) { ?>
            <div class="span8 entry-content"> 
              <!-- The content or the description of the event-->
              <?php the_content(); ?>
            </div>
            <!-- .entry-content -->
            <figure class="span3">
              <?php
								$categories = get_the_category($post->ID);
									foreach($categories as $category) {
										if($category->term_id !== '35'){

							?>
	              <a href="<?php echo get_category_link($category->term_id); ?>">
		              <h4><i class="icon-<?php echo $category->slug; ?>"></i></h4>
		              <figure>
		                <?php the_post_thumbnail( '', array( 'class' => 'span3' ) ); ?>
		              </figure>
		              <h3><?php echo $category->name; ?></h3>
	              </a>
              <?php
									}
								}
							?>
            </figure>
            <?php } else { ?>
            <div class="span12 entry-content">
              <?php the_content(); ?>
            </div>
            <!-- .entry-content -->
            <?php } ?>
          </div>
        </article>
        <?php  endwhile;  ?>
        <footer class="span12">
          <?php post_pagination();?>
        </footer>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
