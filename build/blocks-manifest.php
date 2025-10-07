<?php
// This file is generated. Do not modify it manually.
return array(
	'hamburger-menu-overlay' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'imsmoking-theme/hamburger-menu-overlay',
		'version' => '0.1.0',
		'title' => 'Hamburger Menu Overlay',
		'category' => 'design',
		'icon' => 'menu',
		'description' => 'A responsive hamburger menu with overlay functionality',
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			)
		),
		'attributes' => array(
			'menu' => array(
				'type' => 'string',
				'default' => ''
			),
			'menuItems' => array(
				'type' => 'array',
				'default' => array(
					
				)
			)
		),
		'textdomain' => 'hamburger-menu-overlay',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'live-search' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'live-search/live-search',
		'version' => '0.1.0',
		'title' => 'Live Search',
		'category' => 'design',
		'icon' => array(
			'src' => 'search'
		),
		'description' => 'A live search block that displays results instantly as users type.',
		'keywords' => array(
			'search',
			'ajax',
			'live',
			'filter'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true
			),
			'shadow' => true
		),
		'textdomain' => 'live-search',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	),
	'products-endless-scroll' => array(
		'$schema' => 'https://schemas.wp.org/trunk/block.json',
		'apiVersion' => 3,
		'name' => 'product-endless/show',
		'version' => '0.1.0',
		'title' => 'Product Endless Show',
		'category' => 'design',
		'icon' => array(
			'src' => 'cart'
		),
		'description' => 'Displays WooCommerce products with endless scroll (infinite loading).',
		'keywords' => array(
			'products',
			'woocommerce',
			'infinite',
			'endless',
			'ajax'
		),
		'example' => array(
			
		),
		'supports' => array(
			'html' => false,
			'align' => array(
				'wide',
				'full'
			),
			'spacing' => array(
				'margin' => true,
				'padding' => true
			),
			'color' => array(
				'text' => true,
				'background' => true,
				'gradients' => true
			),
			'typography' => array(
				'fontSize' => true,
				'lineHeight' => true,
				'__experimentalFontFamily' => true
			),
			'shadow' => true
		),
		'textdomain' => 'product-endless-show',
		'editorScript' => 'file:./index.js',
		'editorStyle' => 'file:./index.css',
		'style' => 'file:./style-index.css',
		'render' => 'file:./render.php',
		'viewScript' => 'file:./view.js'
	)
);
