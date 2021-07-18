<?php



defined( 'ABSPATH' ) || exit;

/**
 * KiwimatticBlockPatterns main class. Registers our block patterns.
 *
 * @class   KiwimatticBlockPatterns
 */
final class KiwimatticBlockPatterns {
	/**
	 * Constructor.
	 */
	function __construct() {
		add_action( 'init', array( $this, 'register_block_patterns' ) );
	}

	/**
	 * Register some block patterns.
	 */
	public function register_block_patterns() {
		// Coming soon!
	}
}
