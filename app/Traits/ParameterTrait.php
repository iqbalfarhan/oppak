<?php

namespace App\Traits;

trait ParameterTrait
{
    public $types = [
        "suhu" => [
            "satuan" => "celcius",
            "label" => "dibawah 25 celcius",
            "type" => "between",
            "min" => 0,
            "max" => 25,
        ],
        "kebersihan" => [
            "satuan" => null,
            "label" => "kebersihan",
            "type" => "bool",
            "trueif" => true,
        ],
        "kekencangan" => [
            "satuan" => null,
            "label" => "kekencangan",
            "type" => "bool",
            "trueif" => true,
        ],
        "380" => [
            "satuan" => null,
            "label" => "380 ± 10 %",
            "type" => "between",
            "min" => 342,
            "max" => 418,
        ],
        "220" => [
            "satuan" => null,
            "label" => "220 ± 10 %",
            "type" => "between",
            "min" => 198,
            "max" => 242,
        ],
        "arus" => [
            "satuan" => "ampere",
            "label" => "12,5 sd 14,00 volt",
            "type" => "between",
            "min" => 0,
            "max" => 1000,
        ],
        "tegangan_bs" => [
            "satuan" => "volt",
            "label" => "12,5 sd 14,00 volt",
            "type" => "between",
            "min" => 12.5,
            "max" => 14,
        ],
        "bjcell" => [
            "satuan" => null,
            "label" => "1.20 - 1.25",
            "type" => "between",
            "min" => 1.2,
            "max" => 1.25,
        ],
        "tegangan_bank" => [
            "satuan" => "volt",
            "label" => "51,8 v",
            "type" => "between",
            "min" => 51.8,
            "max" => 51.8,
        ],
        "bjpilot" => [
            "satuan" => null,
            "label" => "1.19",
            "type" => "between",
            "min" => 1.19,
            "max" => 1.19,
        ],
        "tangki_bbm" => [
            "satuan" => "cm",
            "label" => "> 20 cm",
            "type" => "between",
            "min" => 20,
            "max" => 10000,
        ],
        "elektrolit" => [
            "satuan" => null,
            "label" => null,
            "type" => "bool",
            "trueif" => "normal",
        ],
    ];

    public function getValidStatus($parameter, $value = 0) : bool
    {
        if (isset($this->types[$parameter])) {
            $param = $this->types[$parameter];

            if ($param['type'] == "bool") {
                if ($this->types[$parameter]['trueif'] == $value) {
                    return true;
                }
            }
            elseif ($param['type'] == "between") {
                if ($value >= $param['min'] && $value <= $param['max']) {
                    return true;
                }
            }
        }

        return false;
    }
}
