<?php



defined( 'ABSPATH' ) || exit;

/**
 * KiwimatticBlockPatterns main class. Registers our block patterns.
 *
 * @class   KiwimatticBlockPatterns
 */
final class KiwimatticBlockPatterns {

	/**
	 * Prefix for registering out patterns.
	 */
	const BLOCK_PATTERN_NAMESPACE = 'kiwimattic/';

	/**
	 * Plugin slug.
	 */
	const PLUGIN_SLUG = 'kiwimattic-block-patterns';

	/**
	 * Path prefix for pattern templates.
	 */
	const BLOCK_PATTERN_PATH = KIWIMATTIC_BLOCK_PATTERNS__PLUGIN_DIR . 'patterns/';

	/**
	 * Constructor.
	 */
	function __construct() {
		add_action( 'init', array( $this, 'init' ) );
	}

	/**
	 * Initialise our category and patterns.
	 */
	public function init() {
		$this->register_categories();
		$this->register_block_patterns();
	}

	/**
	 * Register some block patterns.
	 */
	private function register_categories() {
		register_block_pattern_category(
			'kiwimattic',
			array( 'label' => __( 'Kiwimattic', self::PLUGIN_SLUG ) )
		);
	}

	/**
	 * Register some block patterns.
	 */
	private function register_block_patterns() {
		register_block_pattern(
			self::BLOCK_PATTERN_NAMESPACE . 'unsplash-call-to-action',
			array(
				'title'       => __( 'Unsplash call-to-action', self::PLUGIN_SLUG ),
				'description' => _x( 'A wide call-to-action with a random image, enticing copy and a button', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic', 'buttons' ],
				'content'     => $this->load_pattern_content( 'unsplash-call-to-action' ),
			)
		);
		register_block_pattern(
			self::BLOCK_PATTERN_NAMESPACE . 'sketchionary-cv',
			array(
				'title'       => __( 'Unsplash call-to-action', self::PLUGIN_SLUG ),
				'description' => _x( 'Sketchionary is a great meetup activity to participate in no matter your skill level', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic', 'buttons' ],
				'content'     => $this->load_pattern_content( 'sketchionary-cv' ),
			)
		);
		self::BLOCK_PATTERN_NAMESPACE . 'wc-products-pattern',
			array(
				'title'       => __( 'WC Products Layout', self::PLUGIN_SLUG ),
				'description' => _x( 'Awesome product layout with lots of nice features', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic' ],
				'content'     => $this->load_pattern_content( 'wc-products-pattern' ),
			)
		);
		register_block_pattern(
			self::BLOCK_PATTERN_NAMESPACE . 'get-to-know',
			array(
				'title'       => __( 'Get to know an A8C', self::PLUGIN_SLUG ),
				'description' => _x( 'A template for an A8C introduction', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic', 'buttons' ],
				'content'     => $this->load_pattern_content( 'get-to-know' ),
			)
		);   
		register_block_pattern(
			self::BLOCK_PATTERN_NAMESPACE . 'recipe',
			array(
				'title'       => __( 'Recipe', self::PLUGIN_SLUG ),
				'description' => _x( 'A delicious recipe, hopefully for a cake', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic', 'buttons', 'recipe', 'cake' ],
				'content'     => $this->load_pattern_content( 'recipe' ),
			)
		);
	}

	/**
	 * Helper function for loading a block pattern from a PHP file.
	 *
	 * This makes it easier to wrangle our pattern source:
	 * - No need to escape the markup in a string literal.
	 * - Can see the full markup and use indentation and comments for complex layouts.
	 * - Can use PHP logic if needed, for example:
	 *   - Generate placeholder content - select an image or product from the site.
	 *   - Use site config, e.g. site name, colours or logo.
	 *
	 * @param string $pattern_slug Pattern slug / base file name.
	 */
	private function load_pattern_content( string $pattern_slug ) {
		ob_start();
		include self::BLOCK_PATTERN_PATH . $pattern_slug . '.php';
		return ob_get_clean();
	}
}
