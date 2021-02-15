<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function contact($name = '')
    {
        return "<h1>Salam $name</h1>"; // contact amine
    }
    public function calcul($name, int $year)
    {
        $age = date('Y') - $year;
        return "$name : $age";
    }
}
