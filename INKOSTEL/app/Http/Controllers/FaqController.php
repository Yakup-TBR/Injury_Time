<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        // Mengambil semua data dari tabel 'faq'
        $faqs = Faq::all();

        // Mengirim data FAQ ke view 'faq'
        return view('faq', compact('faqs'));
    }
}
