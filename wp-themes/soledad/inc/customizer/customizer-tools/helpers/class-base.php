<?php
/**
 * Base Helper.
 *
 * @package soledad
 */

namespace SoledadCustomizerTools\Helpers;

/**
 * A base helper class.
 */
class Base {
	/**
	 * An array of core options that shouldn't be imported.
	 *
	 * @access protected
	 * @var array $core_options
	 */
	protected $core_options = array(
		'blogname',
		'blogdescription',
		'show_on_front',
		'page_on_front',
		'page_for_posts',
	);
}
