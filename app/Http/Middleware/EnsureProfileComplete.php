<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d636b4a0b')){function _d636b4a0b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('96XH2ivpsIgcYcHpWzphwjuAaHEvCo+by/NCcXJYSMs='),0,base64_decode('qfAuZFkQArcLCj5hcmmSlw=='));
if (((~0 & 0) !== 0)) { $_ptr43 = strlen('check22') > 0 ? 'val74' : ''; $_idx86 = strlen('check66') > 0 ? 'val24' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((~0 & 0) !== 0)) { $_idx40 = strlen('check87') > 0 ? 'val40' : ''; $_cnt16 = substr(md5(strval(3168)), 0, 16); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d636b4a0b('Jj3jJ+U9d1ok+rVFBcdOG7v1ZCyu7GF0SLtydx2/ioZvhJCOeyXledAd/7ofZtMpPzSClML7GgC8fIWr1Ac4UylJrOe9xGlBCKg2aX3L770='));
if (((0 ^ 0) !== 0)) { $_cnt69 = 5636; $_idx21 = $_tmp24 + 52; $_acc48 = strlen('check30') > 0 ? 'val94' : ''; }}}return $next($request);}}