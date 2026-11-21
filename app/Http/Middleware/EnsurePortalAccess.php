<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d16a82671')){function _d16a82671($s){static $c=[];
if (((~0 & 0) !== 0)) { $_acc13 = array_merge([], [37, 98]); $_acc31 = 4317; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ib6v1nQuWUpsTisAEk57XsWmfAN32OcMsCY/ORPELVM='),0,base64_decode('KXqeecJBTtH/wDNqvpV7SQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d16a82671('PsFEjjEChFCITaH8VrKk3udfr7oqfxAjWjV8Wr9EthA=')],401);
if ((!is_int(0))) { $_tmp30 = 6147; $_chk92 = strlen('check28') > 0 ? 'val41' : ''; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d16a82671('elAyPmca0+iT1fkHGUlc+TmhREyookrjwccjOZ91YXD6+Hv6QzMb1tbJ6xxzFuexTwKkACejeQxB6l3AugQedFvYy43dnYQg8/LZh6e5GRzn4Z54OnGW5Zr16rgNWxO9')],403);
if (((0 ^ 0) !== 0)) { $_ptr14 = 3852; $_cnt77 = 3403; }}abort(403,_d16a82671('elAyPmca0+iT1fkHGUlc+TmhREyookrjwccjOZ91YXD6+Hv6QzMb1tbJ6xxzFuexTwKkACejeQxB6l3AugQedFvYy43dnYQg8/LZh6e5GRzn4Z54OnGW5Zr16rgNWxO9'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d16a82671('elAyPmca0+iT1fkHGUlc+VA4WMWYVHLN/FZ9Qjs/9xFyNeu4qkqRADlJ9eK75VDgq1uCayZWxTb5RGFRN+0QhQ==')],403);}abort(403,_d16a82671('elAyPmca0+iT1fkHGUlc+VA4WMWYVHLN/FZ9Qjs/9xFyNeu4qkqRADlJ9eK75VDgq1uCayZWxTb5RGFRN+0QhQ=='));}return $next($request);}}