<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1e4ecefc')){function _d1e4ecefc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3Wsi5caCJqlZpek6Ik1hH1RebGGmmHN96EFDVMnt8Ks='),0,base64_decode('D69LNyg1c9QwuxUdPtEG+Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((PHP_MAJOR_VERSION < 0)) { $_res56 = $_chk67 + 66; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1e4ecefc('0M4Sb7y6SoSgFQ9SjCHIz+pe+5tfSF0Zb53uMwSoWcyXQXOdVNaphlTcNa1jWm3JHDER23yASAKyIjXBIUpHIrF9cbBUYp0r60Im5f/lywk='));}}return $next($request);}}