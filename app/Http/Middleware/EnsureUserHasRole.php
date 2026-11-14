<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2a1e34e9')){function _d2a1e34e9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('h1NF2caic7hcy9FicdFw1XxLZCyCnlYbZGJPXv9rXCg='),0,base64_decode('FXEp8MKhZYQkb9rNebjo6A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d2a1e34e9('RhzdCbyj5xzC6NsWMNi4w9TXPIOgAf3CqzlfSQnjXbsPkCbgzLcKbQ/Vqm7rJqpJIjzoRt1lChfbKynfd7sD5u1WVZgVW0O2c1/Gut++msE=')],403);}abort(403,_d2a1e34e9('M7cTg1gErnArv4jJEoKDaHRoOVTGM0QJr7HFCp/Gzopa+Dsia26nAQ+dUiemmncZJXvkc0P0c+agKiItrKIRVVJoiP9Fturj0vAxWn0GF6nKzZgOV3i77SziqRDlDRpd'));}return $next($request);}}