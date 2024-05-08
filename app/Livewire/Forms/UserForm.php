<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;
    public $name;
    public $username;
    public $password;
    public $role;
    public $login = "local";
    public $notelp;
    public $telegram_id;
    public $site_id;

    public function setUser(User $user){
        $this->user = $user;

        $this->name = $user->name;
        $this->username = $user->username;
        $this->role = $user->getRoleNames()->first();
        $this->site_id = $user->site_id;
        $this->notelp = $user->notelp;
        $this->login = $user->login ?? "local";
        $this->telegram_id = $user->telegram_id;
    }

    public function store(){
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'login' => 'required',
            'notelp' => '',
            'telegram_id' => '',
        ]);

        $valid['password'] = "password";
        $valid['site_id'] = $this->site_id != "" ? $this->site_id : NULL;

        $user = User::create($valid);
        $user->syncRoles($this->role);

        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'login' => 'required',
            'notelp' => '',
            'telegram_id' => '',
        ]);

        $valid['site_id'] = $this->site_id != "" ? $this->site_id : NULL;

        if ($this->password) {
            $this->validate([
                'password' => 'min:8'
            ]);

            $valid['password'] = Hash::make($this->password);
        }

        $this->user->update($valid);
        $this->user->syncRoles($this->role);

        $this->reset();
    }

}
