<!DOCTYPE html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!-- Consider specifying the language of your content by adding the `lang` attribute to <html> -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?> > <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

	<title><?php
		if ( is_category() ) {
			echo 'Categoria &quot;';
			single_cat_title();
			echo '&quot; | ';
			bloginfo( 'name' );
		} elseif ( is_tag() ) {
			echo 'Tags &quot;';
			single_tag_title();
			echo '&quot; | ';
			bloginfo( 'name' );
		} elseif ( is_archive() ) {
			wp_title( '' );
			echo ' Arquivos | ';
			bloginfo( 'name' );
		} elseif ( is_search() ) {
			echo 'Busca por &quot;' . wp_specialchars( $s ) . '&quot; | ';
			bloginfo( 'name' );
		} elseif ( is_home() ) {
			bloginfo( 'name' );
			echo ' | ';
			bloginfo( 'description' );
		} elseif ( is_404() ) {
			echo 'Error 404 Nada Entrado | ';
			bloginfo( 'name' );
		} elseif ( is_single() ) {
			wp_title( '' );
			echo '&quot; | ';
			bloginfo( 'name' );
		} else {
			echo wp_title( '' );
			echo ' | ';
			bloginfo( 'name' );
		}
		?></title>
	<meta name="description" content="<?php wp_title( '' ); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta name="author" content="EZ Comunicação" />
	<!-- Mobile viewport optimized: h5bp.com/viewport -->
	<meta name="viewport" content="width=device-width; initial-scale=1" />
	<!-- Wordpress metatags -->
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	 <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->
		<link href="<?php bloginfo( 'template_url' ); ?>/favicon.ico" rel="shortcut icon" />

	<!-- .CSS stylesheets -->
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/bootstrap-responsive.css" />
  <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/responsiveslides.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/nivo-slider.css" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

	<!-- More ideas for your <head> here: h5bp.com/d/head-Tips -->

  <!-- All JavaScript at the bottom, except this Modernizr build. Modernizr enables HTML5 elements & feature detects for optimal performance. Create your own custom Modernizr build: www.modernizr.com/download/ -->

	<script src="<?php bloginfo( 'template_url' ); ?>/js/modernizr-2.5.3.min.js"></script>
	<script src="<?php bloginfo( 'template_url' ); ?>/js/jquery-1.7.2.js"></script>

     <!-- This is used by many Wordpress features and for plugins to work proporly -->
	<?php wp_head(); ?>
</head>
<body>
	<header id="header">
	    <div class="container">
		    <div class="row">
	        <div id="brand" class="span3">
	          <a class="brand" href="<?php bloginfo( 'url' ); ?>/"><img src="<?php bloginfo( 'template_url' ); ?>/img/logo.png"  /></a>
	        </div>
					<div id="nav-bar" class="offset1 span7">
	          <?php
							$args = array(
								'container'  => false,
								'menu_class' => 'nav nav-pills',
								'walker'     => new Bootstrap_Walker_Nav_Menu
							);
							wp_nav_menu( $args );
						?>
	        </div>
	      </div>
			</div>
			<?php get_template_part( 'loop', 'slides' ); ?>
	</header>
