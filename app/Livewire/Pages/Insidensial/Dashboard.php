<?php

namespace App\Livewire\Pages\Insidensial;

use App\Models\Insidensial;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data = Insidensial::select(DB::raw('YEAR(created_at) as year'), DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as total'))
            ->groupBy(DB::raw('YEAR(created_at)'), DB::raw('MONTH(created_at)'))
            ->orderBy('year', 'desc')
            ->orderBy('month', 'desc')
            ->limit(5)
            ->get();

        $result = [];

        foreach ($data as $item) {
            $key = date('F Y', strtotime($item->year . '-' . str_pad($item->month, 2, '0', STR_PAD_LEFT)));
            $result[$key] = $item->total;
        }

        return view('livewire.pages.insidensial.dashboard', [
            'datas' => $result
        ]);
    }


}
