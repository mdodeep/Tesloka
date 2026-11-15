<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da70ca229')){function _da70ca229($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EVlbowHhFDDEeTxFZCM43EtXTb+f4ST/QOgkxkZg9TA='),0,base64_decode('idv5wSLURBvZGT121ENBXg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da70ca229('xF5HABSZQ2BzGQmQxjPtjeRdIrbPrqLPmsj99vV8/Qo=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da70ca229('cZu57+TTXe+WtaUxNqy+d8ZvU+q4AAitqpcU6kj43OsLgRpSivPZsVr51ANFLRfuqY3TYf4sxJYLas5IBz4F8x4gs27666x3BGxAzn0BG/RXD/cSec9KY7e8PTiYBQ7Z')],403);}abort(403,_da70ca229('cZu57+TTXe+WtaUxNqy+d8ZvU+q4AAitqpcU6kj43OsLgRpSivPZsVr51ANFLRfuqY3TYf4sxJYLas5IBz4F8x4gs27666x3BGxAzn0BG/RXD/cSec9KY7e8PTiYBQ7Z'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da70ca229('cZu57+TTXe+WtaUxNqy+d7eaDg9QNaaeTRhljr4YDdoz80HDniwfFHB4NUKYGP5Xs39M7jRMnTW6RxRrUxMc0g==')],403);
if (false) { $_res58 = strlen('check5') > 0 ? 'val54' : ''; }}abort(403,_da70ca229('cZu57+TTXe+WtaUxNqy+d7eaDg9QNaaeTRhljr4YDdoz80HDniwfFHB4NUKYGP5Xs39M7jRMnTW6RxRrUxMc0g=='));}return $next($request);}}