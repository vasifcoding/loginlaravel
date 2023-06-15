<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Bilgiler;
class Home extends Controller
{
    public function home(){
        return view("login");
    }
    public function register(){
        return view("register");
    }

     public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $dogrula = Bilgiler::where('email',$email)->where('sifre',$password)->first();

        $user = Bilgiler::where('email',$request->email)->whereRaw('BINARY sifre = BINARY ?', [$password])->first();
   
       if($dogrula && $user){
       return view('home',['user'=>$user]);
       }
       else{
        return redirect()->route('index')->withErrors(['login' => 'Giriş bilgileri hatalı.']);
       }
       }
     

     public function hosgeldin()
     {
        echo 'hosgeldin';
     }
}
