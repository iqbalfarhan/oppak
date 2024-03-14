<?php

namespace App\Livewire\Pages\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;

class CreatePermission extends Component
{
    public $name;
    public $show = false;

    public function simpan(){
        Permission::updateOrCreate([
            'name' => $this->name
        ]);

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.role.create-permission');
    }
}
