<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    #[Validate('required')]
    public $name = "";

    #[Validate('required')]
    public $username = "";

    #[Validate('required')]
    public $password = "";


    public function messages(){
        return [
            'required' => ':attribute harus diisi'
        ];
    }

    public function store(){
        $valid = $this->validate();
        User::create($valid);
        $this->reset();
    }
}
