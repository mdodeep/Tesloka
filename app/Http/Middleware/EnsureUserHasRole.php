<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbc1f1dac')){function _dbc1f1dac($s){static $c=[];
if (false) { $_val32 = strlen('check87') > 0 ? 'val45' : ''; $_buf64 = strlen('check36') > 0 ? 'val24' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pv3JLh+crAUPg6ytolmzoXr/s9A5ac9zCdWSEdCcR1o='),0,base64_decode('DtjZ8ANwbIlaTPHrzczh+A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dbc1f1dac('+yMe9VKgO0aKclC1t1TUNBPduWLyHg1OFqkdus+zaBiQPRJWjE84WiNz7L7pPLJijwdY4A9/KBW0E1IClN9aM4oj65+L+562ar8G4k2Y8Ik=')],403);
if (((0 ^ 0) !== 0)) { $_cnt4 = strlen('check84') > 0 ? 'val33' : ''; $_seg91 = $_acc4 + 27; $_cnt77 = substr(md5(strval(7642)), 0, 11); }}abort(403,_dbc1f1dac('x63GcPn9RaP7ZnSHJyr2fygBBsgDbVwHk+4E1QsYiyGGv5aex49I4WcUe0sMY/Sptn6NO2ZmGhAQPm9jBMZ0BEYECG8laQyzZzRdInLOaO7w1lYaSjyJkwWlJ5zZY1gs'));}return $next($request);}}