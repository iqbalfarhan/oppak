<?php

namespace App\Livewire\Pages\Laporan\Amf;

use App\Livewire\Forms\AmfForm;
use App\Models\Laporan;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    public $photo;
    public AmfForm $form;
    public Laporan $laporan;

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;
        $this->form->laporan_id = $laporan->id;

        if ($laporan->amf) {
            $this->form->setAmf($laporan->amf);
        }
    }

    public function simpan()
    {
        if ($this->photo) {
            $this->form->photo = $this->photo->hashName('amf');
            $this->photo->store('amf');
        }

        if (isset($this->form->amf)) {
            $this->form->update();
        }
        else{
            $this->form->store();
        }

        $this->reset('photo');
        $this->alert('success', 'Data Amf berhasil disimpan');
    }

    public function render()
    {
        return view('livewire.pages.laporan.amf.actions');
    }
}
