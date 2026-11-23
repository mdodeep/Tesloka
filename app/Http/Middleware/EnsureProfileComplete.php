<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd5a374ad')){function _dd5a374ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vZJGqUcyZFon1eOUPXg4aapndxRvR2H83y8C0kGswY8='),0,base64_decode('UlG4//144I0ax5/k/KD88w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd5a374ad('Mdo4hR7sA/IvfThY9DLSO8ADd59jJ9xKWLBcyFpsTLbcijdF4FGCBvFnx0XzptJX04ADEJUwmrWvjBXQTQIdkCtvHaRCpo4cVuBBqnLCV2s='));}}return $next($request);}}