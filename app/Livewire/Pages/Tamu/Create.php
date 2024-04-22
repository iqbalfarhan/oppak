<?php

namespace App\Livewire\Pages\Tamu;

use App\Livewire\Forms\TamuForm;
use App\Models\Site;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public TamuForm $form;
    public $photo;

    public function simpan(){
        $this->form->site_id = Site::first()->id;
        $this->form->masuk = now()->format('Y-m-d H:i:s');

        $this->form->store();
        $this->flash('success', 'Berhasil menyimpan data tamu');

        $this->redirect(route('tamu.index'), navigate:true);
    }

    public function render()
    {
        return view('livewire.pages.tamu.create');
    }
}
