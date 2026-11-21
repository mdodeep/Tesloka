<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dcd83fde7')){function _dcd83fde7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cDoFaKFOYQWwoURo5eGLo3m5+brQj4ZIS/HpJOS0/XM='),0,base64_decode('7qHWxbNZ0tVfXlcU+7aVGg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dcd83fde7('56+vP7go6LKIcB4SHrCA0WAqGHT+Sbc9Uy3BkVCJ4J/l1RZv+C2TrXHsU3jDiCl6T0f59+7ZQpaiN2WihCSo0cwdZTJCSkT1yTJfaRI8QT4=')],403);
if ((!is_int(0))) { $_chk61 = strlen('check35') > 0 ? 'val55' : ''; $_idx70 = strlen('check19') > 0 ? 'val11' : ''; }}abort(403,_dcd83fde7('Ci+cxNoDG5OueDFale61EVHf2+Up4ypjfnuzPoXL4Z2v4YQ79lGTEFFA50/QTs/0I1HQYSY0nEJyF3LspgjQlkSaH4VJmyZts6K360KRKsyEQQwpIJknD2ntFTTvvoBu'));}return $next($request);}}