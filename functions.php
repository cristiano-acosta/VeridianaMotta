<?php
	/* =============================================================================
		Created by Cristiano Acosta. Date: 16/07/12.  Time: 11:35
		Function Theme Template EZ Comunicação
		 ========================================================================== */
	/*== custom menu support ==*/
	add_theme_support('menus');
	if (function_exists('register_nav_menus')) {
	    register_nav_menus(
	        array(
	            'header-menu' => 'Header Menu'
	        )
	    );
	}
	/*== custom menu support home page defaut ==*/
	function home_page_menu_args( $args ) {
		$args['show_home'] = true;
		return $args;
	}
	add_filter( 'wp_page_menu_args', 'home_page_menu_args' );

	/*==  Twitter Botstraps CSS Drowpdown menu  ==*/
	class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
		/**
		 * @see Walker::start_el()
		 * @since 3.0.0
		 *
		 * @param string $output Passed by reference. Used to append additional content.
		 * @param object $item Menu item data object.
		 * @param int $depth Depth of menu item. Used for padding.
		 * @param int $current_page Menu item ID.
		 * @param object $args
		 */
		function start_lvl(&$output, $depth) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"dropdown-menu\">\n";
		}
		function start_el(&$output, $item, $depth, $args) {
			global $wp_query;
			$indent = ($depth) ? str_repeat("\t", $depth) : '';
			$class_names = $value = '';
			$classes = empty($item->classes) ? array() : (array)$item->classes;
			$classes[] = ($args->has_children) ? 'dropdown' : '';
			$classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
			$classes[] = 'menu-item-' . $item->ID;
			$class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
			$class_names = ' class="' . esc_attr($class_names) . '"';
			$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
			$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';
			$output .= $indent . '<li' . $id . $value . $class_names . '>';
			$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
			$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
			$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
			$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';
			$attributes .= ($args->has_children) ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';
			// new addition for active class on the a tag
			if (in_array('current-menu-item', $classes)) {
				$attributes .= ' class="active"';
			}
			$item_output = $args->before;
			$item_output .= '<a' . $attributes . '>';
			$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
			//$item_output .= '</a>';
			$item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
			$item_output .= $args->after;
			$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
		}
		function display_element($element, &$children_elements, $max_depth, $depth = 0, $args, &$output) {
			if (!$element)
				return;
			$id_field = $this->db_fields['id'];
			//display this element
			if (is_array($args[0]))
				$args[0]['has_children'] = !empty($children_elements[$element->$id_field]);
			else if (is_object($args[0]))
				$args[0]->has_children = !empty($children_elements[$element->$id_field]);
			$cb_args = array_merge(array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'start_el'), $cb_args);
			$id = $element->$id_field;
			// descend only when the depth is right and there are childrens for this element
			if (($max_depth == 0 || $max_depth > $depth + 1) && isset($children_elements[$id])) {
				foreach ($children_elements[$id] as $child) {
					if (!isset($newlevel)) {
						$newlevel = true;
						//start the child delimiter
						$cb_args = array_merge(array(&$output, $depth), $args);
						call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
					}
					$this->display_element($child, $children_elements, $max_depth, $depth + 1, $args, $output);
				}
				unset($children_elements[$id]);
			}
			if (isset($newlevel) && $newlevel) {
				//end the child delimiter
				$cb_args = array_merge(array(&$output, $depth), $args);
				call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
			}
			//end this element
			$cb_args = array_merge(array(&$output, $element, $depth), $args);
			call_user_func_array(array(&$this, 'end_el'), $cb_args);
		}
	}

	/*==  enables wigitized sidebars ==*/
	if (function_exists('register_sidebar'))
	// Sidebar Widget Location: the sidebar
    register_sidebar(array('name' => 'Sidebar',
        'before_widget' => '<div class="widget-area widget-sidebar"><ul>',
        'after_widget' => '</ul></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    // Header Widget Location: right after the navigation
	register_sidebar(array('name' => 'Header',
		'before_widget' => '<div class="widget-area widget-header"><ul>',
		'after_widget' => '</ul></div>',
		'before_title' => '<h4>',
		'after_title' => '</h4>',
	));
	// Footer Widget Location: at the top of the footer, above the copyright
	register_sidebar(array('name' => 'Footer',
		'before_widget' => '<div class="widget-area widget-footer">',
    'after_widget' => '</div>',
    'before_title' => '<h4>',
    'after_title' => '</h4>',
	));
	// The Alert WidgetLocation: displayed on the top of the home page, right after the header, right before the loop, within the content area
	register_sidebar(array('name' => 'Alert',
	    'before_widget' => '<div class="widget-area widget-alert"><ul>',
	    'after_widget' => '</ul></div>',
	    'before_title' => '<h4>',
	    'after_title' => '</h4>',
	));

  /*==  post thumbnail support ==*/
	add_theme_support('post-thumbnails');
	// removes inline width and height attributes from images
	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
	add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
	function remove_thumbnail_dimensions( $html ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}

	/*== Exibe post thumbnail support no admin  ==*/
	function ST4_get_featured_image($post_ID) {
		$post_thumbnail_id = get_post_thumbnail_id($post_ID);
		if ($post_thumbnail_id) {
			$post_thumbnail_img = wp_get_attachment_image_src($post_thumbnail_id, 'featured_preview');
			return $post_thumbnail_img[0];
		}
	}

	function posts_columns($defaults) {
		$defaults['the_post_thumbs'] = __('Imagem');
		return $defaults;
	}

	function posts_custom_columns($column_name, $id) {
		if ($column_name === 'the_post_thumbs') {
			//echo the_post_thumbnail();
			$post_featured_image = ST4_get_featured_image($post_ID);
			if ($post_featured_image) {
				echo '<img style="width: 40%;" src="' . $post_featured_image . '" />';
			}
		}
	}

	add_filter('manage_posts_columns', 'posts_columns');
	add_filter('manage_page_columns', 'posts_columns');
	add_filter('manage_custom_post', 'posts_columns');
	add_action('manage_posts_custom_column', 'posts_custom_columns', 10, 2);
	add_action('manage_pages_custom_column', 'posts_custom_columns', 10, 2);
	add_action('manage_custom_post_column', 'posts_custom_columns', 10, 2);

/*== removes detailed login error information for security ==*/
	//add_filter('login_errors', create_function('$a', "return null;"));
	add_filter('login_errors','login_error_message');
	function login_error_message($error){
	//check if that's the error you are looking for
    $pos = strpos($error, 'incorrect');
    if ($pos === false) {
        //its the right error so you can overwrite it
        $error = "Senha Incorreta!";
    }
    return $error;
	}

	/*== removes the WordPress version from your header for security ==*/
	function wb_remove_version() {
		return '<!--built on the Whiteboard Framework-->';
	}
	add_filter('the_generator', 'wb_remove_version');

	/*== Removes Trackbacks from the comment cout ==*/
	add_filter('get_comments_number', 'comment_count', 0);
	function comment_count($count){
		if (!is_admin()) {
			global $id;
			$comments_by_type = &separate_comments(get_comments('status=approve&post_id=' . $id));
			return count($comments_by_type['comment']);
		} else {
			return $count;
		}
	}
	/*== Resumo para Paginas ==*/
	add_post_type_support('page', 'excerpt');
	/*==  Add category metabox to page =  pagina com categorias! ==*/
	add_action('admin_init', 'reg_tax');
	function reg_tax() {
		register_taxonomy_for_object_type('category', 'page');
		add_post_type_support('page', 'category');
	}

	/*==  Paginação ==*/
	function post_pagination($pages = '', $range = 2) {
		$showitems = ($range * 2) + 1;
		global $paged;
		if (empty($paged)) $paged = 1;
		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}
		if (1 != $pages) {
			echo "<div class='pagination'>";
			if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "' class='active current'>&laquo;</a>";
			if ($paged > 6 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>1</a> <a class='active current'>...</a>";
			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					echo ($paged == $i) ? "<a class='active current'>" . $i . "</a>" : "<a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a>";
				}
			}
			if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages) echo "<a class='active current'>...</a> <a href='" . get_pagenum_link($pages) . "'>$pages</a>";
			if ($paged < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged + 1) . "' class='active current'>&raquo;</a>";
			echo "</div>\n";
		}
	}
	/*==  Resumos! ==*/
	function link_resumos_automaticos($more) {
       global $post;
	return '<a href="'. get_permalink($post->ID) . '">Leia mais +</a>';
	}
	add_filter('excerpt_more', 'link_resumos_automaticos');
	// Changes the behaviour of manual excerpts to include read more link (note css class)
	function all_excerpts_get_more_link($post_excerpt) {
		return $post_excerpt . '<a href="'. get_permalink($post->ID) . '" class="read-more">' . ' Leia mais +' . '</a>';
	}
	add_filter('wp_trim_excerpt', 'all_excerpts_get_more_link');
	// Limite do excerpt
	function excerpt($num) {
	$limit   = $num + 1;
	$excerpt = explode( ' ', get_the_excerpt(), $limit );
	array_pop( $excerpt );
	$excerpt = implode( " ", $excerpt ) . "...";
	echo $excerpt;
	}
?>
