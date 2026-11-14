<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:33:03+00:00
 * Integrity: 5825c4b58f1782521538e33f3b1d0d4d3ae088ba26ed6da8509eef8d6ee93945
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db3f07005')){function _db3f07005($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5nMzIL/Jvvyd+/0IWeR+dwRJxoX8N3J0yRFRmTh7NWQ='),0,base64_decode('cDw3qIpiEvrtvRqiX0Sjdw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db3f07005('ZbIaKZ+lE4VebRe4A8prX7NbnBAlyxAmkL8UJQ1y+zM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db3f07005('B5lqj5lzsFupaKODZtMjvZ/gJFXlWlSf5kSan9W6UXmo8jZ36DaG11KN2XFqxlFdmLrAXhrvxJuul4Ahe99oNq+HMWGL5FOgz86nIl+v3XgwFUIEVt31syN7Q/qEd2mR')],403);
if (((0 ^ 0) !== 0)) { $_tmp87 = $_cnt56 + 45; $_ptr3 = intval('530'); $_cnt64 = strlen('check80') > 0 ? 'val87' : ''; }}abort(403,_db3f07005('B5lqj5lzsFupaKODZtMjvZ/gJFXlWlSf5kSan9W6UXmo8jZ36DaG11KN2XFqxlFdmLrAXhrvxJuul4Ahe99oNq+HMWGL5FOgz86nIl+v3XgwFUIEVt31syN7Q/qEd2mR'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db3f07005('B5lqj5lzsFupaKODZtMjvfuh1qfzb2vcCe4HB+QFzUG754AE2gCR3Id3uHPYGLJAqT5uMLI4/FAu+zL53p6l9w==')],403);}abort(403,_db3f07005('B5lqj5lzsFupaKODZtMjvfuh1qfzb2vcCe4HB+QFzUG754AE2gCR3Id3uHPYGLJAqT5uMLI4/FAu+zL53p6l9w=='));
if ((!is_int(0))) { $_idx43 = array_merge([], [58, 78]); $_chk28 = strlen('check30') > 0 ? 'val21' : ''; }}return $next($request);}}