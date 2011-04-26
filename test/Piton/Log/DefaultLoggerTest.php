<?php
namespace Piton\Log;

class DefaultLoggerTest extends \PHPUnit_Framework_TestCase {

	public function testDefaultLevelIsInfo() {
		$logger = new DefaultLogger();
		$this->assertEquals($logger->getLevel(), $logger::LEVEL_INFO);
	}

	public function testDebugIsNotShownWhenLevelIsInfo() {
		$logger = new DefaultLogger();
		ob_start();
		$logger->log("Hello Test", $logger::LEVEL_DEBUG);
		$this->assertEmpty(ob_get_clean());
	}

	public function testLogOutputsToStdOut() {
		$logger = new DefaultLogger();
		ob_start();
		$logger->log("Hello Test");
		$this->assertContains("Hello Test", ob_get_clean());
	}

}
