<?php
/**
 * Plugin Name:     Kiwimattic Block Patterns
 * Plugin URI:      PLUGIN SITE HERE
 * Description:     PLUGIN DESCRIPTION HERE
 * Author:          YOUR NAME HERE
 * Author URI:      YOUR SITE HERE
 * Text Domain:     kiwimattic-block-patterns
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Kiwimattic_Block_Patterns
 */


defined( 'ABSPATH' ) || exit;

require_once __DIR__ . '/php/class-kiwimattic-block-patterns.php';

new KiwimatticBlockPatterns();
