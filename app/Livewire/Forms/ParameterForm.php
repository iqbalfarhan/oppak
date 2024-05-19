<?php

namespace App\Livewire\Forms;

use App\Models\Parameter;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParameterForm extends Form
{
    public $name;
    public $satuan;
    public $label;
    public $type = 'range';
    public $min = 0;
    public $max;
    public $trueif;
    public $options;

    public ?Parameter $parameter;

    public function setParameter(Parameter $parameter)
    {
        $this->parameter = $parameter;

        $this->name = $parameter->name;
        $this->satuan = $parameter->satuan;
        $this->label = $parameter->label;
        $this->type = $parameter->type;
        if ($parameter->type == "istrue") {
            $this->options = implode(", ", $parameter->options ?? []);
        }
        else{
            $this->min = $parameter->min;
            $this->max = $parameter->max;
        }
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'satuan' => '',
            'label' => '',
            'type' => '',
            'min' => '',
            'max' => '',
            'trueif' => '',
            'options' => '',
        ]);

        Parameter::create($valid);
        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'satuan' => '',
            'label' => '',
            'type' => '',
            'min' => '',
            'max' => '',
            'trueif' => '',
            'options' => '',
        ]);

        $this->parameter->update($valid);
        $this->reset();
    }
}
