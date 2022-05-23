<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'About'
        ];
        return view('about.about',$data);
    }
}
