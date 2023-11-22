<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function guest(){
        return view('beranda',[
            'barangs' => Barang::all()
        ]);
    }

    public function index(){
        return view('content',[
            'barangs' =>Barang::all()
        ]);
    }
}
