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

	public function createMessReport() {
		$this->setupBuildFolders();
		$this->exec("phpmd lib xml codesize,unusedcode,naming,design --reportfile build/log/pmd.xml");
	}

	/**
	 * Runs all the phpunit tests
	 */
	public function test() {
		chdir("test");
		$this->exec("phpunit --bootstrap PitonBootstrap.php Piton");
	}

	/**
	 * Creates phpunit test reports
	 */
	public function createTestReports() {
		$this->setupBuildFolders();
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

	public function setupBuildFolders() {
		file_exists("build/coverage") || mkdir("build/coverage", 0775, true);
		file_exists("build/log") || mkdir("build/log", 0775, true);
	}

	/**
	 * Validates all the PHP code with php -l
	 */
	public function validate() {
		$path = ".";
		$iterator = new \RegexIterator(new \RecursiveIteratorIterator(new \RecursiveDirectoryIterator($path)), "/\.php$/i");
		foreach ($iterator as $filePath) {
			$this->exec("php -l {$filePath}");
		}
	}
}
