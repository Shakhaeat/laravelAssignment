<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class ExportController implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return;
    }
}
