<?php

namespace App\Livewire\Pages\Tamu;

use App\Livewire\Forms\TamuForm;
use App\Models\Site;
use App\Models\Tamu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    public TamuForm $form;
    public $photo;
    public $show = false;

    #[On('createTamu')]
    public function createTamu()
    {
        $this->show = true;
    }

    #[On('editTamu')]
    public function editTamu(Tamu $tamu)
    {
        $this->form->setTamu($tamu);
        $this->show = true;
    }

    public function closeModal(){
        $this->show = false;
        $this->form->reset();
    }

    public function simpan(){
        if (isset($this->form->tamu)) {
            $this->form->update();
            $this->dispatch('reload');
            $this->show = false;
        }
        else{
            if (auth()->user()->site) {
                $this->form->site_id = auth()->user()->site->id;
            }
            else{
                $this->alert('error', 'Penginput belum memilih lokasi kerja');
            }

            $this->form->masuk = now()->format('Y-m-d H:i:s');

            $this->form->validate();
            $tamu = Tamu::create($this->form->all());
            $this->flash('success', 'Berhasil menyimpan data tamu');
            $this->redirect(route('tamu.show', $tamu), navigate:true);
        }

    }

    public function render()
    {
        return view('livewire.pages.tamu.create');
    }
}
