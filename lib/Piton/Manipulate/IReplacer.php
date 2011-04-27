<?php
namespace Piton\Manipulate;

/**
 * Interface that all classes that wish to replace content must implement
 *
 * @author Paul Serby <paul.serby@clock.co.uk>
 * @copyright Clock Limited 2011
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
interface IReplacer {

	/**
	 * Replace any replacements values in $subject with the given values.
	 *
	 * @param array $replacements An associative array where key is the search string and value is the replacement string
	 * @param mixed $subject The replacement subject
	 * @return string $subject with the made replacements
	 */
	public function replace(array $replacements, $subject);
}
