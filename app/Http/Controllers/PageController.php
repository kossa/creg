<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function contact($name = '')
    {
        return view('contact'); // contact amine
    }
    public function calcul($name, int $year)
    {
        $age = date('Y') - $year;
        return "$name : $age";
    }

    public function postContact()
    {
        // return new Contact();
        \Mail::to('hadjikouceyla@gmail.com')->send(new Contact());

        return back()->withSuccess('Thank you for you message');
    }

    public function graph()
    {
        $labels = ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'];
        $data = [12, 19, 3, 5, 2, 3];

        return view('graph', compact('labels', 'data'));
    }
}
