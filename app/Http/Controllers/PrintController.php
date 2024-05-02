<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function laporan(Request $request){
        $request->validate([
            'tanggal' => [
                'required',
                'required',
            ]
        ]);

        $tanggal = $request->tanggal;
        $laporan = Laporan::whereBetween('tanggal', $tanggal)->where('done', 1)->get();

        return view('print.laporan', [
            'datas' => $laporan,
        ]);
    }
}
