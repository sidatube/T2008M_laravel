<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LapModal;

class WebController extends Controller
{
    public function home(){
        return view('home');
    }
    public function aboutus(){
        $pr= new LapModal();
        $dssp=$pr->list();
        return view('about-us')->with('dssp',$dssp);
    }
}
