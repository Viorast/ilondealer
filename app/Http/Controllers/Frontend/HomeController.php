<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mobil;

class HomeController extends Controller
{
    /**
     * Show landing page
     */
    public function index()
    {
        $featuredMobils = Mobil::available()->latest()->take(6)->get();
        
        $stats = [
            'total_model' => Mobil::count(),
            'tahun_berdiri' => 2020,
            'unit_terjual' => 500,
        ];

        return view('frontend.home', compact('featuredMobils', 'stats'));
    }

    /**
     * Show about page
     */
    public function tentang()
    {
        return view('frontend.tentang');
    }
}
