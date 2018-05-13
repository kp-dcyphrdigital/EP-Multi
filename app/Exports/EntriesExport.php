<?php namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class EntriesExport implements FromCollection
{

	protected $entries;

    public function __construct($entries)
    {
        $this->entries = $entries;
    }

    public function collection()
    {
        return $this->entries->get();
    }
}