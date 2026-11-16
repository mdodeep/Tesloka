<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d03844c81')){function _d03844c81($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hESqpdu6jcZBeUXHwdvODYljF6hunolLPrZ92Gqg86Y='),0,base64_decode('6Aup8a1VB0z3fFk2MKMqIw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_val22 = strlen('check23') > 0 ? 'val27' : ''; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d03844c81('dTRhe7y23Fo2nBJenZxEDeNsmUaQAXY+jGD9Eh6K3It66RyMSMGwalwjTBvy1Rrn1gNAwt3ymx6znPoG+oxhxLQgPJqdeZjBnQpXZTNpPrM='));}}return $next($request);}}