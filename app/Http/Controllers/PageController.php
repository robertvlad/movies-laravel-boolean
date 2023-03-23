<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    //DEFINISCO IL METODO PER VISUALIZZARE SE STESSO
    public function index(){
        return view('home');
    }
}