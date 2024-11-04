<?php

namespace App\Http\Controllers;
use App\Models\Saran;

use Illuminate\Http\Request;

class SaranController extends Controller
{
    //
    public function index(){
        return view('saran.index');

    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'saran' => 'required'
        ]);
        Saran::create([
            'nama' => $request->nama,
            'saran' => $request->saran
        ]);
        return redirect()->route('saran.index')->with('success', 'Terimakasih atas saran yang anda berikan');
    }
}
