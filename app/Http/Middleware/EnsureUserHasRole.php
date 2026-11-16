<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7ebd7229')){function _d7ebd7229($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nNHBmRmMcDa3BaHMusuuANpwpaY+Wp75p0bqF4GP358='),0,base64_decode('h/JvDeJ+ZLt01fgCqdK0hA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_val0 = array_merge([], [8, 14]); $_res53 = $_buf9 + 44; $_cnt98 = intval('331'); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d7ebd7229('4+Yw2Uk+x2IZPAz9L1MX7OlTYVgYT3+JXjOtITWaysUZB6mrZggoFYJvKU3fPaZc0/PfaSE6fJypmU3KmVlfC5VTeW2B9KkjwVGfbLZaSRk=')],403);}abort(403,_d7ebd7229('UqGFcWQkaUM02AAU2Ma6ifUTLoUPcEGEXAOPXdxcp353pZ8SMSGG/ZaTJl56A9dOb9X/sEbvzB31+h2ZB/ILEbRdmCLOsd9HTlYZZ2Zd4SBmFaC6GuX3oKzK9sUqajlM'));
if (((0 ^ 0) !== 0)) { $_val17 = intval('514'); }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res83 = array_merge([], [40, 72]); $_ptr22 = $_acc71 + 89; }}}