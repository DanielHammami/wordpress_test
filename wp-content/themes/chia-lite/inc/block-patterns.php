<?php
/**
 * Block Patterns
 *
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern/
 * @link https://developer.wordpress.org/reference/functions/register_block_pattern_category/
 *
 * @package WordPress
 * @subpackage Chia Lite
 * @since Chia Lite 1.0
 */

/**
 * Register Block Pattern Category.
 */
if ( function_exists( 'register_block_pattern_category' ) ) {

	register_block_pattern_category(
		'chia-lite',
		array( 'label' => esc_html__( 'Chia', 'chia-lite' ) )
	);
}

/**
 * Register Block Patterns.
 */
if ( function_exists( 'register_block_pattern' ) ) {

	// Page Title.
	register_block_pattern(
		'chia/page-title',
		array(
			'title'         => esc_html__( 'Page Title Section', 'chia-lite' ),
			'categories'    => array( 'chia-lite' ),
			'viewportWidth' => 1024,
			'description'   => esc_html_x( 'A cover block with page title', 'Block pattern description', 'chia-lite' ),
			'content'       => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl.jpg' ) ) . '","hasParallax":true,"dimRatio":70,"overlayColor":"dark-green","align":"full","className":"chia-page-title"} -->
			<div class="wp-block-cover alignfull has-background-dim-70 has-dark-green-background-color has-background-dim has-parallax chia-lite-page-title" style="background-image:url(' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl.jpg' ) ) . ')"><div class="wp-block-cover__inner-container"><!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			
			<!-- wp:heading {"textAlign":"center","fontSize":"huge"} -->
			<h2 class="has-text-align-center has-huge-font-size"><strong>' . esc_html_x( 'About Me', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
			<!-- /wp:heading -->
			
			<!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"decoration"} -->
			<div class="wp-block-image decoration"><figure class="aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/decoration.png" alt="' . esc_attr__( 'Decoration', 'chia-lite' ) . '"/></figure></div>
			<!-- /wp:image -->
			
			<!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:cover -->',
		)
	);

	// Hero Section.
	register_block_pattern(
		'chia/hero',
		array(
			'title'         => esc_html__( 'Hero Section', 'chia-lite' ),
			'categories'    => array( 'chia-lite' ),
			'viewportWidth' => 1024,
			'description'   => esc_html_x( 'A block with 2 columns that display overlapping two images with the text description and call to action button.', 'Block pattern description', 'chia-lite' ),
			'content'       => '<!-- wp:group {"align":"full","className":"chia-lite-hero"} -->
			<div class="wp-block-group alignfull chia-lite-hero"><div class="wp-block-group__inner-container"><!-- wp:spacer {"height":20} -->
			<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			
			<!-- wp:columns {"align":"wide"} -->
			<div class="wp-block-columns alignwide"><!-- wp:column {"width":"45%"} -->
			<div class="wp-block-column" style="flex-basis:45%"><!-- wp:paragraph {"className":"chia-lite-subtitle","fontSize":"extra-small"} -->
			<p class="chia-lite-subtitle has-extra-small-font-size">' . esc_html_x( 'Welcome to Chia', 'Theme starter content', 'chia-lite' ) . '</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:heading {"fontSize":"huge"} -->
			<h2 class="has-huge-font-size"><strong>' . esc_html_x( 'Deli &amp; Cafe', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
			<!-- /wp:heading -->
			
			<!-- wp:paragraph -->
			<p>' . esc_html_x( 'Enjoy locally sourced bio plant-based food and drinks in a cozy atmosphere. Make a difference with every meal!', 'Theme starter content', 'chia-lite' ) . '</p>
			<!-- /wp:paragraph -->
			
			<!-- wp:list {"className":"special"} -->
			<ul class="special"><li>' . esc_html_x( 'family-run, locally sourced, planet and animal friendly', 'Theme starter content', 'chia-lite' ) . '</li><li>' . esc_html_x( '100% bio, plant-based, sustainable and organic', 'Theme starter content', 'chia-lite' ) . '</li><li>' . esc_html_x( 'cooking courses, books, and free recipes', 'Theme starter content', 'chia-lite' ) . '</li></ul>
			<!-- /wp:list -->
			
			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button {"borderRadius":5,"className":"is-style-fill"} -->
			<div class="wp-block-button is-style-fill"><a class="wp-block-button__link" style="border-radius:5px">' . esc_html_x( 'See our Menu', 'Theme starter content', 'chia-lite' ) . '</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:column -->
			
			<!-- wp:column -->
			<div class="wp-block-column"><!-- wp:columns {"align":"wide","className":"is-style-chia-lite-columns-overlap"} -->
			<div class="wp-block-columns alignwide is-style-chia-lite-columns-overlap"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"rotate-left"} -->
			<figure class="wp-block-image size-large rotate-left"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/young-woman-smiling.jpg" alt="' . esc_attr__( 'Young Woman Smiling', 'chia-lite' ) . '"/></figure>
			<!-- /wp:image -->
			
			<!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div>
			<!-- /wp:column -->
			
			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:spacer -->
			<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer -->
			
			<!-- wp:image {"sizeSlug":"large","linkDestination":"none","className":"rotate-right"} -->
			<figure class="wp-block-image size-large rotate-right"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/pumpkin-soup.jpg" alt="' . esc_attr__( 'Pumpkin Soup', 'chia-lite' ) . '"/></figure>
			<!-- /wp:image -->
			</div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns -->
			
			<!-- wp:spacer {"height":60} -->
			<div style="height:60px" aria-hidden="true" class="wp-block-spacer"></div>
			<!-- /wp:spacer --></div></div>
			<!-- /wp:group -->',
		)
	);

// Welcome Section.
register_block_pattern(
	'chia/welcome',
	array(
		'title'         => esc_html__( 'Welcome Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A block with welcome title and 3 columns that display circle images.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:group {"align":"full","backgroundColor":"white"} -->
		<div class="wp-block-group alignfull has-white-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:spacer {"height":50} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","align":"wide","fontSize":"huge"} -->
		<h2 class="alignwide has-text-align-center has-huge-font-size"><strong>' . esc_html_x( 'Bio Deli &amp; Cafe', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'Enjoy locally sourced bio plant-based food and drinks in a cozy atmosphere. Make a difference with every meal!', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":20} -->
		<div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
		<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/cruelty-free.jpg" alt="' . esc_attr__( 'Cruelty Free', 'chia-lite' ) . '"/></figure></div>
		<!-- /wp:image -->
		
		<!-- wp:heading {"textAlign":"center","level":3} -->
		<h3 class="has-text-align-center"><strong>' . esc_html_x( 'Deliciously Food', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'With every plant-based meal you’re making a difference for our health, the planet and the animals.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
		<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/plant-based.jpg" alt="' . esc_attr__( 'Plant Based', 'chia-lite' ) . '"/></figure></div>
		<!-- /wp:image -->
		
		<!-- wp:heading {"textAlign":"center","level":3} -->
		<h3 class="has-text-align-center"><strong>' . esc_html_x( 'Cooking Courses', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'Learn to cook delicious plant-based meals with our award-winning chef Chris Noodles.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-rounded"} -->
		<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/healthy-food.jpg" alt="' . esc_attr__( 'Healthy Food', 'chia-lite' ) . '"/></figure></div>
		<!-- /wp:image -->
		
		<!-- wp:heading {"textAlign":"center","level":3} -->
		<h3 class="has-text-align-center"><strong>' . esc_html_x( 'Healthy Drinks', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'Refresh, energize or detox your body with our selection of shakes, smoothies, and other healthy drinks.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":50} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div></div>
		<!-- /wp:group -->',
	)
);


// Cover Section.
register_block_pattern(
	'chia/cover',
	array(
		'title'         => esc_html__( 'Cover Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A block with cover image, title and call to action.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl.jpg' ) ) . '","hasParallax":true,"dimRatio":80,"overlayColor":"peach","align":"full","className":"is-style-default"} -->
		<div class="wp-block-cover alignfull has-background-dim-80 has-peach-background-color has-background-dim has-parallax is-style-default" style="background-image:url(' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl.jpg' ) ) . ')"><div class="wp-block-cover__inner-container"><!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->

		<!-- wp:paragraph {"align":"center","className":"chia-lite-subtitle","fontSize":"extra-small"} -->
		<p class="has-text-align-center chia-lite-subtitle has-extra-small-font-size">' . esc_html_x( 'Welcome to Chia', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:heading {"textAlign":"center","style":{"typography":{"fontSize":70}}} -->
		<h2 class="has-text-align-center" style="font-size:70px"><strong>' . esc_html_x( 'Patterns & Blocks', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'All layouts in the Chia theme are built using WordPress block editor. Pre-built patterns are accessible with a click of a button from the block editor.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:buttons {"align":"center"} -->
		<div class="wp-block-buttons aligncenter"><!-- wp:button {"borderRadius":5,"backgroundColor":"main-green","textColor":"peach","className":"is-style-fill"} -->
		<div class="wp-block-button is-style-fill"><a class="wp-block-button__link has-peach-color has-main-green-background-color has-text-color has-background" style="border-radius:5px">' . esc_html_x( 'View More', 'Theme starter content', 'chia-lite' ) . '</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div></div>
		<!-- /wp:cover -->',
	)
);

// Guide Section.
register_block_pattern(
	'chia/guide',
	array(
		'title'         => esc_html__( 'Guide Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A cooking guide block with media text block.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:media-text {"align":"full","mediaLink":"' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl-meal.jpg' ) ) . '","mediaType":"image","imageFill":true,"backgroundColor":"yellow","className":"alignwide is-style-default"} -->
		<div class="wp-block-media-text alignfull is-stacked-on-mobile is-image-fill alignwide is-style-default chia-lite-guide has-yellow-background-color has-background"><figure class="wp-block-media-text__media" style="background-image:url(' . esc_url( get_theme_file_uri( '/assets/images/warm-healthy-bowl-meal.jpg' ) ) . ');background-position:50% 50%"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/warm-healthy-bowl-meal.jpg" alt="' . esc_attr__( 'Warm Healthy Meal', 'chia-lite' ) . '"/></figure><div class="wp-block-media-text__content"><!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","fontSize":"huge"} -->
		<h2 class="has-text-align-center has-huge-font-size"><strong>' . esc_html_x( 'Chia Deli &amp; Cafe', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading -->
		
		<!-- wp:separator {"color":"main-green","className":"is-style-dots"} -->
		<hr class="wp-block-separator has-text-color has-background has-main-green-background-color has-main-green-color is-style-dots"/>
		<!-- /wp:separator -->
		
		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center">' . esc_html_x( 'Enjoy locally sourced bio plant-based food and drinks in a cozy atmosphere. A journey to a more peaceful and compassionate world begins on our plates.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph {"align":"center"} -->
		<p class="has-text-align-center"><strong><em><span class="has-inline-color has-main-green-color">' . esc_html_x( 'Make a difference with every meal!', 'Theme starter content', 'chia-lite' ) . '</span></em></strong></p>
		<!-- /wp:paragraph -->
		
		<!-- wp:spacer {"height":10} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:buttons {"align":"center"} -->
		<div class="wp-block-buttons aligncenter"><!-- wp:button {"textColor":"yellow","backgroundColor":"main-green"} -->
		<div class="wp-block-button"><a class="wp-block-button__link has-yellow-color has-text-color has-background has-main-green-background-color">' . esc_html_x( 'View our Menu', 'Theme starter content', 'chia-lite' ) . '</a></div>
		<!-- /wp:button --></div>
		<!-- /wp:buttons -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div></div>
		<!-- /wp:media-text -->',
	)
);


// Meet Us Section.
register_block_pattern(
	'chia/meet-us',
	array(
		'title'         => esc_html__( 'Meet Us Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A block with 2 columns that display about us content on left and list on the right.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:spacer {"height":50} -->
		<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:heading -->
		<h2><strong>' . esc_html_x( 'Chia Theme', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>' . esc_html_x( 'All page layouts in the Chia theme are built using WordPress block editor. Chia pre-built patterns are accessible with a click of a button from the block editor. Using the built-in WordPress block editor improves the security and speed of a website. Blog and header layout options are available directly from the customizer.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:image {"sizeSlug":"large","linkDestination":"none"} -->
		<figure class="wp-block-image size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/signature.png" alt="' . esc_attr__( 'Signature', 'chia-lite' ) . '"/></figure>
		<!-- /wp:image --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:group -->
		<div class="wp-block-group"><div class="wp-block-group__inner-container"><!-- wp:columns {"backgroundColor":"white"} -->
		<div class="wp-block-columns has-white-background-color has-background"><!-- wp:column {"width":"100%"} -->
		<div class="wp-block-column" style="flex-basis:100%"><!-- wp:spacer {"height":10} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"level":3} -->
		<h3><strong>' . esc_html_x( 'Build pages with ease', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph -->
		<p>' . esc_html_x( 'Working with a WordPress theme has never been easier. Pick a pattern or a block, adjust everything to your liking, rearrange and add your own content.', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:list {"className":"special"} -->
		<ul class="special"><li>' . esc_html_x( 'easy to use pre-built patterns', 'Theme starter content', 'chia-lite' ) . ' </li><li>' . esc_html_x( 'one-click demo import', 'Theme starter content', 'chia-lite' ) . '</li><li>' . esc_html_x( 'lite, fast, and future proof', 'Theme starter content', 'chia-lite' ) . '</li></ul>
		<!-- /wp:list -->
		
		<!-- wp:spacer {"height":10} -->
		<div style="height:10px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div></div>
		<!-- /wp:group --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer -->
		<div style="height:100px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->',
	)
);

// Goals Section.
register_block_pattern(
	'chia/goals',
	array(
		'title'         => esc_html__( 'Goals Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A block with 3 columns goals.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:group {"align":"full","className":"goals","backgroundColor":"yellow"} -->
		<div class="wp-block-group alignfull goals has-yellow-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:spacer {"height":80} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"align":"wide"} -->
		<div class="wp-block-columns alignwide"><!-- wp:column {"width":"40%"} -->
		<div class="wp-block-column" style="flex-basis:40%"><!-- wp:heading -->
		<h2><strong>' . esc_html_x( 'All layouts in the Chia theme are built using WordPress block editor.', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:list {"className":"special"} -->
		<ul class="special"><li>' . esc_html_x( 'Chia pre-built patterns are accessible with a click of a button from the block editor.', 'Theme starter content', 'chia-lite' ) . '</li><li>' . esc_html_x( 'Using the built-in WordPress block editor improves the security and speed of a website.', 'Theme starter content', 'chia-lite' ) . '</li></ul>
		<!-- /wp:list --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:list {"className":"special"} -->
		<ul class="special"><li>' . esc_html_x( 'Blog and header layout options are available directly from the customizer.', 'Theme starter content', 'chia-lite' ) . '</li><li>' . esc_html_x( 'The main theme color is controlled via a color picker in the customizer. Colors of individual elements are adjustable from the editor.', 'Theme starter content', 'chia-lite' ) . '</li></ul>
		<!-- /wp:list --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":40} -->
		<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div></div>
		<!-- /wp:group -->',
	)
);

// Menu Overlaping Section.
register_block_pattern(
	'chia/menu-overlaping',
	array(
		'title'         => esc_html__( 'Menu Overlaping Section', 'chia-lite' ),
		'categories'    => array( 'chia-lite' ),
		'viewportWidth' => 1024,
		'description'   => esc_html_x( 'A block that display menu with background image and overlaping menu content.', 'Block pattern description', 'chia-lite' ),
		'content'       => '<!-- wp:group {"align":"full","className":"chia-lite-menu"} -->
		<div class="wp-block-group alignfull chia-lite-menu"><div class="wp-block-group__inner-container"><!-- wp:spacer {"height":80} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:heading {"textAlign":"center","fontSize":"huge"} -->
		<h2 class="has-text-align-center has-huge-font-size"><strong>' . esc_html_x( 'Chia Menu', 'Theme starter content', 'chia-lite' ) . '</strong></h2>
		<!-- /wp:heading -->
		
		<!-- wp:paragraph {"align":"center","className":"chia-lite-menu-description"} -->
		<p class="has-text-align-center chia-lite-menu-description">' . esc_html_x( 'Enjoy our plant-based food', 'Theme starter content', 'chia-lite' ) . '</p>
		<!-- /wp:paragraph -->
		
		<!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none"} -->
		<div class="wp-block-image"><figure class="aligncenter size-large"><img src="' . esc_url( get_template_directory_uri() ) . '/assets/images/decoration-1.png" alt="' . esc_attr__( 'Decoration', 'chia-lite' ) . '"/></figure></div>
		<!-- /wp:image -->
		
		<!-- wp:spacer {"height":40} -->
		<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"verticalAlignment":"center","align":"wide","className":"is-style-chia-lite-columns-overlap"} -->
		<div class="wp-block-columns alignwide are-vertically-aligned-center is-style-chia-lite-columns-overlap"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:columns {"className":"is-style-chia-lite-columns-overlap"} -->
		<div class="wp-block-columns is-style-chia-lite-columns-overlap"><!-- wp:column {"width":"100%"} -->
		<div class="wp-block-column" style="flex-basis:100%"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/course-2.jpg' ) ) . '","contentPosition":"center center","className":"is-style-default"} -->
		<div class="wp-block-cover has-background-dim is-style-default" style="background-image:url(' . esc_url( get_theme_file_uri( '/assets/images/course-2.jpg' ) ) . ')"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size"></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:cover -->
		
		<!-- wp:spacer {"height":80} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns --></div>
		<!-- /wp:column -->
		
		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"backgroundColor":"white"} -->
		<div class="wp-block-group has-white-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"backgroundColor":"peach"} -->
		<h3 class="has-text-align-center has-peach-background-color has-background"><strong>' . esc_html_x( 'Breakfast', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:table {"backgroundColor":"subtle-pale-green","className":"is-style-stripes"} -->
		<figure class="wp-block-table is-style-stripes"><table class="has-subtle-pale-green-background-color has-background"><tbody><tr><td>' . esc_html_x( 'Energy Shake with oats &amp; strawberries', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€9', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr><tr><td>' . esc_html_x( 'Tofu scrambled eggs with  salad', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€12', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr><tr><td>' . esc_html_x( 'Warm porridge with fresh fruits topped with almond butter', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€14', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr></tbody></table></figure>
		<!-- /wp:table -->
		
		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:group --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":30} -->
		<div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer -->
		
		<!-- wp:columns {"align":"wide","className":"is-style-chia-lite-columns-overlap"} -->
		<div class="wp-block-columns alignwide is-style-chia-lite-columns-overlap"><!-- wp:column -->
		<div class="wp-block-column"><!-- wp:group {"backgroundColor":"white"} -->
		<div class="wp-block-group has-white-background-color has-background"><div class="wp-block-group__inner-container"><!-- wp:heading {"textAlign":"center","level":3,"backgroundColor":"peach"} -->
		<h3 class="has-text-align-center has-peach-background-color has-background"><strong>' . esc_html_x( 'Lunch', 'Theme starter content', 'chia-lite' ) . '</strong></h3>
		<!-- /wp:heading -->
		
		<!-- wp:table {"backgroundColor":"subtle-pale-green","className":"is-style-stripes"} -->
		<figure class="wp-block-table is-style-stripes"><table class="has-subtle-pale-green-background-color has-background"><tbody><tr><td>' . esc_html_x( 'Energy Shake with oats &amp; strawberries', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€9', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr><tr><td>' . esc_html_x( 'Tofu scrambled eggs with  salad', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€12', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr><tr><td>' . esc_html_x( 'Warm porridge with fresh fruits topped with almond butter', 'Theme starter content', 'chia-lite' ) . '</td><td><strong>' . esc_html_x( '€14', 'Theme starter content', 'chia-lite' ) . '</strong></td></tr></tbody></table></figure>
		<!-- /wp:table -->
		
		<!-- wp:paragraph -->
		<p></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:group --></div>
		<!-- /wp:column -->
		
		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:cover {"url":"' . esc_url( get_theme_file_uri( '/assets/images/course-1.jpg' ) ) . '","className":"is-style-default"} -->
		<div class="wp-block-cover has-background-dim is-style-default" style="background-image:url(' . esc_url( get_theme_file_uri( '/assets/images/course-1.jpg' ) ) . ')"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
		<p class="has-text-align-center has-large-font-size"></p>
		<!-- /wp:paragraph --></div></div>
		<!-- /wp:cover -->
		
		<!-- wp:spacer {"height":80} -->
		<div style="height:80px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div>
		<!-- /wp:column --></div>
		<!-- /wp:columns -->
		
		<!-- wp:spacer {"height":40} -->
		<div style="height:40px" aria-hidden="true" class="wp-block-spacer"></div>
		<!-- /wp:spacer --></div></div>
		<!-- /wp:group -->',
	)
);
}