<?php
namespace Piton\Manipulate;

/**
 * Use the given IReplacer to replace on the contents of a file searching a line at a time
 *
 * @author Paul Serby <paul.serby@clock.co.uk>
 * @copyright Clock Limited 2011
 * @license http://opensource.org/licenses/bsd-license.php New BSD License
 */
class FileContentReplacer implements IFileContentReplacer {

	/**
	 *
	 * @var IReplacer
	 */
	protected $replacer;

	public function __construct(IReplacer $replacer) {
		$this->replacer = $replacer;
	}

	public function replace(array $replacements, $filename) {

		if (!file_exists($filename)) {
			throw Exception("File not found '{$filename}'");
		}

		$content = file_get_contents($filename);
		$content = $this->replacer->replace($replacements, $content);
		file_put_contents($filename, $content);
	}
}
