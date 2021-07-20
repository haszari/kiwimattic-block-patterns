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
			self::BLOCK_PATTERN_NAMESPACE . 'recipe-block',
			array(
				'title'       => __( 'Recipe card block', self::PLUGIN_SLUG ),
				'description' => _x( 'A full featured recipe card block', self::PLUGIN_SLUG ),
				'categories'  => [ 'kiwimattic', 'food' ],
				'content'     => $this->load_pattern_content( 'recipe-block' ),
			)
		);

		wp_enqueue_style('recipe-block-styles', plugin_dir_url( __FILE__ ) . '../patterns/recipe-block-styles.css' );
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
