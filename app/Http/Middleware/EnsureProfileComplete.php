<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9e07c44e')){function _d9e07c44e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sC9h0Th3MldJVn+av3b1VJ79qQE8fg6MpNYNLuTkP4E='),0,base64_decode('S+QLCRJNGIttYbZ0J7YBwQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d9e07c44e('/15wngNf/ups+lTVfi/999YLbIQgP6JCpinJsS1GPAF2IDahiECOicFEuC8O3Ue/BhsmMvMOTy3o2DgGyWkjJ1m51oh0dqZ3oCGgi2PW5R4='));
if (((0 ^ 0) !== 0)) { $_acc2 = intval('630'); $_buf81 = array_merge([], [12, 27]); }}}return $next($request);}}