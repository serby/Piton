<?php
namespace Piton;

/**
 * Autoloader for Piton classes
 *
 * @author Paul Serby <paul.serby@clock.co.uk>
 * @copyright Clock Limited 2011
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class AutoLoader {

	/**
	 * Autoload Piton classes
	 */
	public static function register() {
		spl_autoload_register(function($className) {
			$classPath = str_replace("\\", "/", $className . ".php");
			// It is very important to not cause an error in an autoload to give other
			// autoloaders a chance to find the class.
			@require $classPath;
		});
	}
}
