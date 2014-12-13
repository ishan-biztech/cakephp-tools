<?php
namespace Tools\TestSuite;

use Cake\Console\ConsoleOutput as CakeConsoleOutput;
use Tools\TestSuite\Traits\ToolsTestTrait;

/**
 * Use for testing as
 *
 *  use Tools\TestSuite\ConsoleOutput;
 *
 *  $stdOut = new ConsoleOutput();
 *  $stdErr = new ConsoleOutput();
 *  $io = new ConsoleIo($stdOut, $stdErr);
 *
 * @license MIT
 * @author Mark Scherer
 */
class ConsoleOutput extends CakeConsoleOutput {

	use ToolsTestTrait;

	/**
	 * Holds all output messages.
	 *
	 * @var array
	 */
	public $output = array();

	/**
	 * Overwrite _write to output the message to debug instead of CLI.
	 *
	 * @param string $message
	 * @return void
	 */
	protected function _write($message) {
		$this->debug($message);
		$this->output[] = $message;
	}

	/**
	 * Helper method to return the debug output as string.
	 *
	 * @return string
	 */
	public function output() {
		return implode('', $this->output);
	}

}
