<?php

namespace App\Livewire\Pages\Role;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $no = 1;

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.role.index', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }
}
