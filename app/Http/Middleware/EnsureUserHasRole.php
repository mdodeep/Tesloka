<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d47f4f77e')){function _d47f4f77e($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res62 = $_ptr19 + 17; $_buf67 = array_merge([], [67, 98]); $_ptr4 = $_res76 + 48; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RELcnDSE6LrTcWvfDuWJ8K9yX5wQk010U2IDzRuucLM='),0,base64_decode('l4wiJoTnQNNNH8i76o5lFA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d47f4f77e('Ruo/0RfjJhJdKhp5CKc6IQjdVH3L2fcgz4PB5jy7rkh1BVhmNZtBoPzYVcx2jSRMOBBdiwcI/6xpcekzMBod+9vEbo38AhN/Hc+7ckAwcR4=')],403);}abort(403,_d47f4f77e('0jiqhTvca36lOuwM7SMfyLLtDanVrZW3iRyXe/qoIst5eATYl7mfYCCKpsdrCEZ6FBTJ/yCWITB5Y0EzPodmwZkulQphlwkqLLGFKqiXoclIrBo24D6p6vV3r3HEUWtH'));}return $next($request);}}