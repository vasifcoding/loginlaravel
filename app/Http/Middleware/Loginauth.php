<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Loginauth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          $password = trim($request->password);
          $password = htmlspecialchars($password);
         $passretry = trim($request->passwordretry);
          $passretry = htmlspecialchars($passretry);

         if(strlen($request->password)<8){
            return redirect()->back()->withErrors(['passwordmin8'=>"Sifreniz minimum 8 karakter olmalidir"]);
         }
         
        return $next($request);
    }
}
