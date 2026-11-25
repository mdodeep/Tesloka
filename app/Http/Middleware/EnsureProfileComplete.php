<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd2407e34')){function _dd2407e34($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3wIGbITy6lqujNbXre9mVXCnuq2p2+tOY+J5ZCawam8='),0,base64_decode('aBcmthXuUiwb3tJ+ZUOMVA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd2407e34('vknYahA2aOInNm47cW666QThm4LVHzrtn2zj7Ptg3kCDqbuID2Qeh1R1zYo6hsoa74PuiraLUX+T2ql0oSoAYvm7ppaQxaZDcQgsgmnQxq8='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf60 = strlen('check66') > 0 ? 'val16' : ''; }}}return $next($request);}}