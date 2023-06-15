<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Createuserauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         //ad soyad => name
         //email => email
         //sifre => password
         //sifre tekrar => passwordretry
         //guvenlik sorusu => sequrityquestion
         //guvenlik sorusu cevabi => sequrityanswer
         $password = trim($request->password);
         $passretry = trim($request->passwordretry);
         if(strlen($request->password)<8){
            return redirect()->back()->withErrors(['passwordmin8'=>"Sifreniz minimum 8 karakter olmalidir"]);
         }
         if($password !== $passretry){
            return redirect()->back()->withErrors(['passwordnotequal'=>"Sifreler bir birileriyle eşleşmiyor!"]);
         }
        return $next($request);
    }
}
