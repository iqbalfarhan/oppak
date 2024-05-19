<?php

namespace App\Traits;
use App\Models\Parameter;

trait ParameterTrait
{
    public function getValidStatus($parameter, $value = 0) : bool
    {
        $parameter = Parameter::where('name', $parameter)->first();
        if (isset($parameter)) {

            if ($parameter->type == "istrue") {
                if ($parameter->trueif == $value) {
                    return true;
                }
            }
            elseif ($parameter->type == "range") {
                if ($value >= $parameter->min && $value <= $parameter->max) {
                    return true;
                }
            }
        }

        return false;
    }
}
