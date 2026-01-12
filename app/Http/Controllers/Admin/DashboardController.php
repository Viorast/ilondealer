<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mobil;

class DashboardController extends Controller
{
    /**
     * Show admin dashboard with statistics
     */
    public function index()
    {
        $stats = [
            'total_mobil' => Mobil::count(),
            'tersedia' => Mobil::available()->count(),
            'stok_habis' => Mobil::outOfStock()->count(),
            'total_nilai' => Mobil::sum('harga'),
        ];

        $mobilTerbaru = Mobil::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'mobilTerbaru'));
    }
}
