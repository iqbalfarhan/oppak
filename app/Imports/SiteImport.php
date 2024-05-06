<?php

namespace App\Imports;


use App\Models\Site;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SiteImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return Site::updateOrCreate([
            'witel' => $row['witel'],
            'name' => $row['name'],
        ],[
            'listrik' => $row['listrik'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
}
