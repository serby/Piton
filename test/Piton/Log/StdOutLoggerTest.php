<?php
namespace Piton\Log;

class StdOutTest extends \PHPUnit_Framework_TestCase {

	public function testDefaultLevelIsInfo() {
		$logger = new StdOutLogger();
		$this->assertEquals($logger->getLevel(), $logger::LEVEL_INFO);
	}

	public function testDebugIsNotShownWhenLevelIsInfo() {
		$logger = new StdOutLogger();
		ob_start();
		$logger->log("Hello Test", $logger::LEVEL_DEBUG);
		$this->assertEmpty(ob_get_clean());
	}

	public function testLogOutputsToStdOut() {
		$logger = new StdOutLogger();
		ob_start();
		$logger->log("Hello Test");
		$this->assertContains("Hello Test", ob_get_clean());
	}

}
