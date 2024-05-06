<?php

namespace App\Livewire\Pages\Site;

use App\Imports\SiteImport;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class Import extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public $show = false;
    public $file;

    #[On('importSite')]
    public function importSite(){
        $this->show = true;
    }

    public function import()
    {
        $this->validate([
            'file' => 'required'
        ]);

        Excel::import(new SiteImport, $this->file);
        $this->dispatch('reload');

        $this->closeModal();
        $this->alert('success', 'Import site berhasil');
    }

    public function closeModal()
    {
        $this->show = false;
        $this->photo = false;
    }

    public function render()
    {
        return view('livewire.pages.site.import');
    }
}
