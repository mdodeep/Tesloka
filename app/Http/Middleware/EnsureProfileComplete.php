<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7559deb5')){function _d7559deb5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xuUwLSCgyYhQHcG5K0Oz0xCCO4G9TLWJS5qhEmblxwc='),0,base64_decode('ICdhVCsTsmIrnMnrCPOBXQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7559deb5('se690LuPkmo4zVm7V9pNEKPFiad3oWiwbBVMznSU+vJCtUJKLpmZYBsy8zcOG3f/OE+52bWE7x0OpQGZLJoxjHLcHyBaBfcFuiDSNKt8lzc='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk66 = strlen('check80') > 0 ? 'val0' : ''; }}}return $next($request);}}