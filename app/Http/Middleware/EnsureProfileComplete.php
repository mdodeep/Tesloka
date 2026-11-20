<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7c354136')){function _d7c354136($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ye81ia9kmIioVvzBqD0HRBF9LV32Szqfm9bawTdo7nE='),0,base64_decode('S3kUI21Pm/EflSFAxMXLnQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d7c354136('7E2EkoSFqYxd81pBSn6JxGX2IiB1mWs2MnYbQjwU1Tvk0VKm/jCrMfJ2La/tWPfYIo+SNAwwo2yXDlBiUlyvS9sPoY8m65GAq6Vszvr3mPk='));}}return $next($request);}}