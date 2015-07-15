<?php

	class flaunt_walker extends Walker_Nav_Menu {

		// add class to sub menus
		function start_lvl( &$output, $depth) {
			// depth dependent class
			$indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' );
			$display_depth = ( $depth + 1);
			$classes = array(
				'nav-submenu'
				//'menu_depth-' . $display_depth
				);
			$class_names = implode( ' ', $classes );

			// build html
			$output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
		}

		// add main/sub classes to li's and links
		 function start_el( &$output, $item, $depth, $args ) {
		    global $wp_query;
		    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

		    // depth dependent classes
		    $depth_classes = array(
			  ( $depth == 0 ? 'nav-item' : 'nav-submenu-item' )
			  //( $depth >=2 ? 'nav-submenu-item' : '' )
			  //( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
			  //'menu-item-depth-' . $depth
		    );
		    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

		    // passed classes
		    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
		    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

		    // build html
		    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names . ' ' . $class_names . '">';

		    // link attributes
		    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
		    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

		    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
			  $args->before,
			  $attributes,
			  $args->link_before,
			  apply_filters( 'the_title', $item->title, $item->ID ),
			  $args->link_after,
			  $args->after
		    );

		    // build html
		    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}


	}

?>
