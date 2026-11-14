<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:26:08+00:00
 * Integrity: 36c9a2f4caea85b0d9be3587e3b699cbbb3fd8478edd5758bd9423d7d268d032
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d80b9d4bf')){function _d80b9d4bf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sPia9T6/++im9PuK8I50ZZrtoOL/OgpjQ3i5Vp+yBWU='),0,base64_decode('DOdTVoZvs73E535Eq3Dh5A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d80b9d4bf('u7sGjAxavVmnJ/IDmGszuVYt6RjmdIyY5dgvQWyX21wzNLXc4b5kMISf5R+YqULtCwxFjdATnpMmRjOiYJlW5PvGnnWMwCjY1T3/wvQEpi4='));}}return $next($request);}}