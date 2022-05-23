<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfirmController extends Controller
{
    public function index(Request $r)
    {
        $data = [
            'title' => 'Confirm Payment',
        ];
        return view('confirm.confirm',$data);
    }
}
