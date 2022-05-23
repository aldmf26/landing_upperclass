<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HowController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'How To Order',
        ];
        return view('how.how',$data);
    }
}
