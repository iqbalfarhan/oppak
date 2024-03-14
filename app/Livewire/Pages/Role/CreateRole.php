<?php

namespace App\Livewire\Pages\Role;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $name;
    public $show = false;

    public function simpan(){
        Role::updateOrCreate([
            'name' => $this->name
        ]);

        $this->dispatch('reload');
    }
    public function render()
    {
        return view('livewire.pages.role.create-role');
    }
}
