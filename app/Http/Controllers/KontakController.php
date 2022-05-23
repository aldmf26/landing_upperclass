<?php

namespace App\Http\Controllers;

use App\Mail\MailSend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class KontakController extends Controller
{
   public function index()
   {
       $data = [
           'title' => 'Contact',
       ];
       return view('kontak.kontak',$data);
   } 

   public function kirim(Request $r)
   {
       
       $data = [
           'penerima' => 'untasuper26@gmail.com',
           'email' => $r->email,
           'msg' => $r->msg,
       ];
       Mail::send('mail.view', $data, function($pesan) use ($data){
           $pesan
                 ->from($data['email'])
                 ->to($data['penerima'])
                 ->subject('Upperclass Message');
       });
       
       return redirect()->route('kontak')->with('sukses', 'Pesan Dikirim');
   }
}
