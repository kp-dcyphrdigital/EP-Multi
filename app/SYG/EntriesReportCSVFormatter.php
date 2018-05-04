<?php namespace SYG;

use SYG\EntriesReportFormatterInterface;

class EntriesReportCSVFormatter implements EntriesReportFormatterInterface {
	public function output($input) {
		return $input . " as CSV Formatted Output";
	}
}