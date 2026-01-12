<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Mobil;

class DetailController extends Controller
{
    /**
     * Show car detail
     */
    public function show($id)
    {
        $mobil = Mobil::findOrFail($id);
        
        // Get similar cars (same type, exclude current)
        $similarMobils = Mobil::where('tipe', $mobil->tipe)
            ->where('id_mobil', '!=', $id)
            ->available()
            ->take(3)
            ->get();

        // WhatsApp number (can be configured)
        $whatsappNumber = '6281234567890';
        $whatsappMessage = urlencode("Halo, saya tertarik dengan {$mobil->nama_mobil}. Apakah masih tersedia?");
        $whatsappLink = "https://wa.me/{$whatsappNumber}?text={$whatsappMessage}";

        return view('frontend.detail', compact('mobil', 'similarMobils', 'whatsappLink'));
    }
}
