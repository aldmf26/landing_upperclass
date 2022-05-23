<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Models\UserUpperclass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'title' => 'Login'
        ];
        return view('login.login', $data);
    }

    public function aksiLogin(Request $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($data)) {
            $request->session()->put('login', 1);
            return redirect()->route('userPage');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect email or password.');
        } 
    }

    public function userPage(Request $request)
    {
        $data = [
            'title' => 'User Page',
            'provinsi' => Province::pluck('title', 'province_id'),
            'city' => City::pluck('title', 'city_id'),
        ];
        return view('login.page',$data);
    }

    public function editUser(Request $request)
    {
        $data = [
            'first' => $request->first,
            'last' => $request->last,
            'alamat' => $request->alamat,
            'alamat2' => $request->alamat2,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'nohp' => $request->nohp,
        ];
        
        $res = UserUpperclass::where('id', $request->id_user)->update($data);

        return redirect()->route('userPage')->with('sukses', 'Details updated');
    }

    public function register(Request $request)
    {
        $data = [
            'title' => 'Register',
            'provinsi' => Province::pluck('title', 'province_id'),
            'provinsi_id' => $request->id_provinsi
        ];
     
        return view('login.register', $data);
    }

    public function aksiRegister(Request $request)
    {
        $validasi = $request->validate([
            'first' => 'required',
            'last' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'nohp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $data = [
            'name' => "$request->first $request->last",
            'first' => $request->first,
            'last' => $request->last,
            'alamat' => $request->alamat,
            'alamat2' => $request->alamat2,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'kodepos' => $request->kodepos,
            'nohp' => $request->nohp,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];
        UserUpperclass::create($data);
        return redirect()->route('login');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login');
        return redirect()->route('login');
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callback(Request $request)
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = UserUpperclass::where('email', $user_google->getEmail())->first();
            // dd($user_google);
            //jika user ada maka langsung di redirect ke halaman home
            //jika user tidak ada maka simpan ke database
            //$user_google menyimpan data google account seperti email, foto, dsb

            if ($user != null) {
                \auth()->login($user, true);
                return redirect()->route('home');
            } else {
                $create = UserUpperclass::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'password'          => 0,
                    'email_verified_at' => now()
                ]);


                \auth()->login($create, true);
                return redirect()->route('home');
            }
        } catch (\Exception $e) {
            return redirect()->route('login');
        }
    }

    public function orderHistory(Request $r)
    {
        $no_order = $r->no_order;
        $data = [
            'title' => 'Order History',
        ];
        return view('login.orderHistory',$data);
    }

}
