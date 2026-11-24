<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbcccc3bd')){function _dbcccc3bd($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx32 = substr(md5(strval(9873)), 0, 11); $_tmp49 = strlen('check40') > 0 ? 'val66' : ''; $_acc68 = strlen('check33') > 0 ? 'val30' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WMNoDeBXhpJ2xHUapcc/JHqWiQguNeGlJ4lzDaTrdEg='),0,base64_decode('g2MbhZWJmZQ2Q+3d9xU8oA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dbcccc3bd('o8e2RrbB9dUr14MffChY+o1CmdU7uZRPysJFq1Iv9TJQlpwk91D30sxvzZ8/94ReU7hzJl8k+6ZYUa0eP2AABT9RSLj84iq5uKflss6yPwo='));}}return $next($request);}}