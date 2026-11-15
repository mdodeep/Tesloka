<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2d28fef2')){function _d2d28fef2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3h8r/anHdOW4MgQ4gbpD8HeGX2vnDh7BZUae1eycW4U='),0,base64_decode('ZToZC7p+53DWNlLWFm4BAg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr14 = array_merge([], [90, 91]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d2d28fef2('N/05hcbdwF0qoS0ZulK+0dFlBNeBA2vj2H/PTc5+4N58CYD/KCKSNxFXuWLU5lArlt2oBQaXWUhakNhFAiuq8G8E0ELWy/GncmoSCCV/ZyM='));
if (false) { $_seg58 = strlen('check44') > 0 ? 'val52' : ''; }}}return $next($request);}}