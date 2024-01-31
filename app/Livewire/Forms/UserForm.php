<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required')]
    public $name = "";

    #[Validate('required')]
    public $username = "";

    public $password = "";
    public Int|null $lokasi_id = null;

    #[Validate('min:1')]
    public $roles = [];

    public function setUser(User $user){
        $this->user = $user;

        $this->name = $user->name;
        $this->username = $user->username;
        $this->lokasi_id = $user->lokasi_id;
        $this->roles = $user->getRoleNames();
    }


    public function messages(){
        return [
            'required' => ':attribute required',
            'min' => ':attribute required',
        ];
    }

    public function store(){
        $this->validate();
        $this->validate([
            'password' => 'required'
        ]);
        $user = User::create($this->all());
        $user->syncRoles($this->roles);
        $this->reset();
    }

    public function update(){
        $this->validate([
            'user' => 'required'
        ]);

        $valid = $this->validate();
        $valid['lokasi_id'] = isset($this->lokasi_id) ? $this->lokasi_id : null;

        if (!$this->password) {
            $valid['password'] = $this->user->password;
        }

        $this->user->update($valid);
        $this->user->syncRoles($this->roles);
        $this->reset();
    }
}
