<?php

namespace App\Livewire\Pages\Role;

use Illuminate\Support\Facades\Route;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $no = 1;

    public function render()
    {
        $routeNames = collect(Route::getRoutes())->map(function ($route) {
            return $route->getName();
        })->filter()->toArray();

        // dd($routeNames);

        return view('livewire.pages.role.index', [
            'roles' => Role::get()
        ]);
    }
}
