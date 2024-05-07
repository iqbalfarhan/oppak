<?php

namespace App\Livewire\Pages\Laporan\Bbm;

use App\Models\Bbm;
use App\Models\Laporan;
use App\Traits\ImageManipulateTrait;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Actions extends Component
{
    use LivewireAlert;
    use WithFileUploads;
    use ImageManipulateTrait;

    public $photo;
    public $gambar;
    public $volume;
    public $satuan;

    public Laporan $laporan;

    public function simpan()
    {
        $valid = $this->validate([
            'volume' =>'required',
            'satuan' =>'required',
        ]);

        if ($this->photo) {
            $path = $this->manipulate($this->photo, $this->laporan->path);
            $valid['photo'] = $path;
        }

        Bbm::updateOrCreate([
            'laporan_id' => $this->laporan->id,
        ], $valid);

        $this->photo = null;

        $this->alert("success", "BBm berhasil disimpan");
        $this->mount($this->laporan);
    }

    public function mount(Laporan $laporan)
    {
        $this->laporan = $laporan;

        if ($laporan->bbm) {
            $this->volume = $laporan->bbm->volume;
            $this->satuan = $laporan->bbm->satuan;
            $this->gambar = $laporan->bbm->image;
        }
    }

    public function render()
    {
        return view('livewire.pages.laporan.bbm.actions');
    }
}
