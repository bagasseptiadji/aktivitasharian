<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
Use Illuminate\View\View;

class LaporanController extends Controller
{    
    public function index(): View
    {
    $laporan = Laporan::latest()->paginate(5);
 
    return view('laporan.index', compact('laporan'));
    }
}
