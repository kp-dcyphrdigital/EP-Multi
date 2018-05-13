<?php namespace SYG;

use SYG\EntriesReportFormatterInterface;

class EntriesReportHTMLFormatter implements EntriesReportFormatterInterface {
	public function output($input) {
		return $input->paginate(15);
	}
}