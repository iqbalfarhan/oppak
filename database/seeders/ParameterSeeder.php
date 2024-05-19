<?php

namespace Database\Seeders;

use App\Models\Parameter;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $datas = [
            [
                "name" => "suhu",
                "satuan" => "celcius",
                "label" => "antara 0 ~ 25",
                "type" => "range",
                "min" => 10,
                "max" => 25,
                "trueif" => null,
                "options" => null,
            ],
            [
                "name" => "kebersihan",
                "satuan" => null,
                "label" => "kebersihan",
                "type" => "istrue",
                "min" => 0,
                "max" => null,
                "trueif" => "bersih",
                "options" => [
                    "bersih",
                    "tidak bersih"
                ],
            ],
            [
                "name" => "kekencangan",
                "satuan" => null,
                "label" => "kekencangan",
                "type" => "istrue",
                "min" => 0,
                "max" => null,
                "trueif" => "kencang",
                "options" => [
                    "kencang",
                    "tidak kencang"
                ],
            ],
            [
                "name" => "380",
                "satuan" => "Volt",
                "label" => "380 ± 10 %",
                "type" => "range",
                "min" => 342,
                "max" => 418,
                "trueif" => null,
                "options" => null,
            ],
            [
                "name" => "220",
                "satuan" => "Volt",
                "label" => "220 ± 10 %",
                "type" => "range",
                "min" => 198,
                "max" => 242,
                "trueif" => null,
                "options" => null,
            ],
            [
                "name" => "arus",
                "satuan" => "Ampere",
                "label" => "arus",
                "type" => "range",
                "min" => 0,
                "max" => 1000,
                "trueif" => null,
                "options" => null,
            ],
            [
                "name" => "tegangan_bs",
                "satuan" => "Volt",
                "label" => "antara 12.5  ~ 14.00",
                "type" => "range",
                "min" => 12.5,
                "max" => 14,
                "trueif" => null,
                "options" => null,
            ],
            [
                "name" => "bjcell",
                "satuan" => "",
                "label" => "antara 1.20 ~ 1.25",
                "type" => "range",
                "min" => 1.2,
                "max" => 1.25,
                "trueif" => null,
                "options" => [
                    "1.19"
                ],
            ],
            [
                "name" => "tegangan_bank",
                "satuan" => "Volt",
                "label" => "51,8 v",
                "type" => "istrue",
                "min" => 0,
                "max" => null,
                "trueif" => "51.8",
                "options" => [
                    "51.8"
                ],
            ],
            [
                "name" => "bjpilot",
                "satuan" => null,
                "label" => "1.19",
                "type" => "istrue",
                "min" => 0,
                "max" => null,
                "trueif" => "1.19",
                "options" => [
                    "1.19"
                ],
            ],
            [
                "name" => "tangki_bbm",
                "satuan" => "cm",
                "label" => "lebih dari 20 cm",
                "type" => "range",
                "min" => 20,
                "max" => 1000,
                "trueif" => null,
                "options" => [
                    "1.19"
                ],
            ],
            [
                "name" => "elektrolit",
                "satuan" => null,
                "label" => "elektrolit",
                "type" => "istrue",
                "min" => 0,
                "max" => null,
                "trueif" => "normal",
                "options" => [
                    "diatas maksimal",
                    "normal",
                    "dibawah minimal"
                ],
            ]
        ];

        foreach ($datas as $data) {
            Parameter::create($data);
        }
    }
}
