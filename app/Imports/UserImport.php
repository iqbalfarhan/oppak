<?php

namespace App\Imports;

use App\Models\Site;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UserImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $site = Site::where('name', $row['nama_site'])->first();

        $user = User::updateOrCreate([
            'name' => $row['name'],
            'username' => $row['username'],
        ],[
            'password' => $row['password'],
            'notelp' => (string)$row['notelp'],
            'telegram_id' => (string)$row['telegram_id'] ?? NULL,
            'site_id' => $site ? $site->id : NULL,
        ]);

        $user->assignRole($row['role'] ?? 'user');
        return;
    }

    public function headingRow(): int
    {
        return 1;
    }
}
