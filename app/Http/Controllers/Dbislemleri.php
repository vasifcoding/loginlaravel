<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use \App\Models\Bilgiler;
class Dbislemleri extends Controller
{
  public function User(Request $request){

    $dosyaismi = rand(0,1000).'.'.$request->resim->getClientOriginalName(); //dosyanin ismini almak icin kullaniliyor
    // $dosyauzantisi = $request->resim->getClientOriginalExtension(); //dosyanin uzantisini almak icin kullaniliyor cikti : png ,jpeg ,jpg
    $resimyukle = $request->resim->move(public_path('images'),$dosyaismi);


    $securityquestion = $request->securityquestion;
    $securityanswer = trim($request->securityanswer);
    if($securityquestion=='1'){
        $securityquestion = 'Annenizin Kizlik Soyadi Nedir?';
    }
    elseif ($securityquestion=='2') {
        $securityquestion = 'Evcil Hayvaninizin ismi nedir?';
    }

    elseif ($securityquestion=='3') {
        $securityquestion = 'Okudugunuz ilkokul ismi nedir?';
    }
   

    Bilgiler::create([
        'adsoyad'=>htmlspecialchars($request->name),
        'email'=>htmlspecialchars($request->email),
        'sifre'=>htmlspecialchars($request->password),
        'securityquestion'=>htmlspecialchars($securityquestion),
        'securityanswer'=>htmlspecialchars($securityanswer),
        'resimurl' => $dosyaismi,
    ]);
  $user = Bilgiler::where('email',$request->email)->where('sifre',$request->password)->first();
    return view('home',['user'=>$user]);

  }
  public function forgetindex()
{
 return view('forgetpass');
}

public function forgetpass(Request $request)

 {  $securityquestion = $request->securityquestion;
    if($securityquestion=='1'){
        $securityquestion = 'Annenizin Kizlik Soyadi Nedir?';
    }
    elseif ($securityquestion=='2') {
        $securityquestion = 'Evcil Hayvaninizin ismi nedir?';
    }

    elseif ($securityquestion=='3') {
        $securityquestion = 'Okudugunuz ilkokul ismi nedir?';
    }
 $email = $request->email;
  
   $securityanswer = $request->securityanswer;
    
 $dogrula =  Bilgiler::where('email',$email)->where('securityanswer',$securityanswer)->where('securityquestion',$securityquestion)->first();
 if($dogrula){
 
 Bilgiler::where('email',$email)->where('securityquestion',$securityquestion)->where('securityanswer',$securityanswer)->update([
'sifre'=>$request->password,]);
return redirect()->route('index');

}
else{
return redirect()->route('forgetpass')->withErrors(['login'=>'Hatali giris']);
}
 }
}
