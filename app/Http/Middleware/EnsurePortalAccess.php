<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3f2c1004')){function _d3f2c1004($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt68 = substr(md5(strval(9091)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ZfYgBM2Q5nNRMP3g54zxUFgxHU6geummxb4pHjNWb+0='),0,base64_decode('FJHGdpcc+UWz3AE9h3urMw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d3f2c1004('vYPbtlJmwlLydg6r/mBl1H1IX/yMbFNtw5ikUFJza6Q=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d3f2c1004('fLZgL2kYSdGdZ67UpCpUS40jL7naPE5UYwX9/jZjAH2ihbNtqNMa8LUtdISAGKT/Jk875H2RzFPCh3xchB4p+Jf8xShIdTPL/yOGF9Q7I/6Ch/pSb206zF+1Mzx27nKx')],403);}abort(403,_d3f2c1004('fLZgL2kYSdGdZ67UpCpUS40jL7naPE5UYwX9/jZjAH2ihbNtqNMa8LUtdISAGKT/Jk875H2RzFPCh3xchB4p+Jf8xShIdTPL/yOGF9Q7I/6Ch/pSb206zF+1Mzx27nKx'));
if ((!is_int(0))) { $_tmp27 = substr(md5(strval(8369)), 0, 16); $_chk70 = substr(md5(strval(6958)), 0, 12); $_ptr87 = array_merge([], [97, 34]); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d3f2c1004('fLZgL2kYSdGdZ67UpCpUSycG6K3nqimPt7WBbSIgFTEfg2nIoCdmM7HwsoOoMH5PaunHb/9qPZFh8/Enb1eiLw==')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt7 = array_merge([], [8, 2]); $_res55 = substr(md5(strval(144)), 0, 16); }}abort(403,_d3f2c1004('fLZgL2kYSdGdZ67UpCpUSycG6K3nqimPt7WBbSIgFTEfg2nIoCdmM7HwsoOoMH5PaunHb/9qPZFh8/Enb1eiLw=='));}return $next($request);}}