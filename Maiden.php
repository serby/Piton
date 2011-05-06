<?php
namespace Maiden;

/**
 * Build for the Maiden tool itself. This is only really used to install and uninstall.
 */
class MaidenProject extends MaidenDefault {

	/**
	 * Looks for messy code using PHPMD
	 */
	public function checkForMess() {
		$this->exec("phpmd lib text codesize,unusedcode,naming,design");
	}

	/**
	 * Create mess report
	 */
	public function createMessReport() {
		$this->exec("phpmd lib xml codesize,unusedcode,naming,design --reportfile build/log/pmd.xml");
	}

	/**
	 * Runs all the phpunit tests
	 */
	public function test() {
		$this->clean();
		chdir("test");
		$this->exec("phpunit --log-junit ../build/log/phpunit.xml --coverage-clover ../build/coverage/coverage.xml --bootstrap PitonBootstrap.php Piton");
	}

	/**
	 * Runs all the phpunit tests
	 */
	public function clean() {
		$this->exec("rm -rf build");
		mkdir("build/coverage", 0775, true);
		mkdir("build/log", 0775, true);
	}

}
