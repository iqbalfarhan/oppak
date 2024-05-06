<?php

namespace App\Livewire\Pages\User;

use App\Imports\UserImport;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class Import extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show = false;
    public $file;

    #[On('importUser')]
    public function importUser(){
        $this->show = true;
    }

    public function import()
    {
        $this->validate([
            'file' => 'required'
        ]);

        Excel::import(new UserImport, $this->file);
        $this->dispatch('reload');

        $this->closeModal();
        $this->alert('success', 'Import user berhasil');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->photo = false;
    }

    public function render()
    {
        return view('livewire.pages.user.import', [
            'roles' => Role::pluck(('name'))->toArray(),
        ]);
    }
}
