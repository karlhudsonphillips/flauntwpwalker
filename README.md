FlauntWPWalker
=================

A custom walker class extension which allows the use of Todd Motto's Flaunt.js responsive menu in a WordPress theme. The class has been added to the custom.php file included.



Instructions
---------------

* Add class from custom.php into your theme, either in the functions.php file, or reference the custom.php file from your functions file.

* When referencing the menu in your theme, use the following format (as an example):

```
	<?php wp_nav_menu( array( 
		'theme_location' => 'main-menu',
		'container' => false,
		'menu_class' => 'nav-list',
		'echo' => true,		
		'fallback_cb' => 'wp_page_menu',
		'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
		'depth' => 10,
		'walker' => new flaunt_walker
	) ); ?>

```

References
-------------

**Walker_Nav_Menu Class**: https://developer.wordpress.org/reference/classes/walker_nav_menu/

**Todd Motto's Article**: http://toddmotto.com/flaunt-js-for-stylish-responsive-navigations-with-nested-click-to-reveal/