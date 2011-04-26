<?php
namespace Piton\Log;
/**
 * Basic logging to stdout
 *
 * @author Paul Serby <paul.serby@clock.co.uk>
 * @copyright Clock Limited 2011
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class StdOutLogger {

	const LEVEL_DEBUG = 1;
	const LEVEL_INFO = 2;
	const LEVEL_WARNING = 3;
	const LEVEL_ERROR = 4;

	/**
	 * The current output level
	 */
	protected $level;

	public function __construct($level = self::LEVEL_INFO) {
		$this->setLevel($level);
	}

	/**
	 * Log a message
	 *
	 * @param string $message The message to log.
	 * @param int $level - What level this message will be logged at
	 */
	public function log($message, $level = self::LEVEL_INFO) {
		if ($level >= $this->level) {
			echo date("Y-m-d H:i:s") . " " . $message . "\n";
		}
	}

	/**
	 * Defines the logging verbosity
	 *
	 * @param int $level
	 */
	public function setLevel($level) {
		$this->level = $level;
	}

	/**
	 * Gets the logging verbosity
	 */
	public function getLevel() {
		return $this->level;
	}
}
