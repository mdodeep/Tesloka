<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:21:22+00:00
 * Integrity: 1288d8c03502ab6b0836b8c6f127e3e459d217625768cb5178f28a6b13cab141
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d77545972')){function _d77545972($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KCGepWmTFwO9XA0vIfI/TGVPDJt6r4wqJUMUm5N6uCc='),0,base64_decode('BkdCgMRT4/oaW17Et69rnA=='));
if ((!is_int(0))) { $_val39 = strlen('check60') > 0 ? 'val91' : ''; $_cnt26 = $_acc25 + 64; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d77545972('u1q5ngUZ2ZuNIcjexYYpa+eDz4hjbdtcORoudXWrnT5iQGJZvdEaIYVkJ7z2kLYvdZzBvTp3E6quiZu2wwK2TPrg2K++Lx3d41Nuj63PaKk='));}}return $next($request);}}