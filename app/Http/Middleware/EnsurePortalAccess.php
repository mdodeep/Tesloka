<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:12:03+00:00
 * Integrity: 827550dfee9bb5c5eb345a2beaa3a4c0ec71eb2e8d7fe8a9ed3961444bdfc0f5
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1c8f01af')){function _d1c8f01af($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('V8QWEooFFk6aiQUtZt6FdxWm5XDDe8/DHat6VeIjmjM='),0,base64_decode('afpWqcMGIGHqOCou1pPwCw=='));
if ((!is_int(0))) { $_buf98 = $_ptr22 + 58; $_ptr7 = strlen('check11') > 0 ? 'val91' : ''; $_ptr76 = intval('851'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d1c8f01af('SqbJ70AtbiTEI6WE5GNU+4TmQFNXAoI9C/jU0omnLBc=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_ptr93 = substr(md5(strval(1637)), 0, 10); $_res34 = $_res13 + 79; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d1c8f01af('BM587ROEMM9jx2TaTz9mjw8CXGcjZCUWMltD1/qrpzVS3pJTQ1hA4KVSFMZLWqGCKGkRIjlSsGCMopquhnRS3iy0gaDgBYR6srijO9kHOrv/0v1FfvRqrfdCTlJCISTu')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt55 = substr(md5(strval(9377)), 0, 14); $_chk45 = substr(md5(strval(9913)), 0, 11); }}abort(403,_d1c8f01af('BM587ROEMM9jx2TaTz9mjw8CXGcjZCUWMltD1/qrpzVS3pJTQ1hA4KVSFMZLWqGCKGkRIjlSsGCMopquhnRS3iy0gaDgBYR6srijO9kHOrv/0v1FfvRqrfdCTlJCISTu'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d1c8f01af('BM587ROEMM9jx2TaTz9mjxL82x1F4v11IO0a6pqXuhfR7FdI+78RrnNKoAMQGq1dIByW1fZ9YlSYnJSq3doieQ==')],403);}abort(403,_d1c8f01af('BM587ROEMM9jx2TaTz9mjxL82x1F4v11IO0a6pqXuhfR7FdI+78RrnNKoAMQGq1dIByW1fZ9YlSYnJSq3doieQ=='));}return $next($request);}}