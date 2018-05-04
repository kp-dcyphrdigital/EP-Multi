<?php namespace SYG;

use SYG\EntriesReportFormatterInterface;

class EntriesReportHTMLFormatter implements EntriesReportFormatterInterface {
	public function output($input) {
		return $input . " as HTML Formatted Output";
	}
}