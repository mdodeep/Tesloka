<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db9d7ef2b')){function _db9d7ef2b($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_seg80 = array_merge([], [45, 33]); $_buf12 = intval('339'); $_acc26 = substr(md5(strval(8486)), 0, 8); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JQhdtRcQodX4d2kyMRFjHgkG5mQxnmXYTGYPKwcbAyw='),0,base64_decode('2+MSpXI6Ug61MEWtKjR4dw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db9d7ef2b('sBJJXZcILaoR42wFZJpjpoV4swwquXS+yteLkHQhp70=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((0 ^ 0) !== 0)) { $_ptr12 = $_cnt11 + 34; $_idx74 = $_tmp69 + 44; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db9d7ef2b('8Xka4zblDgIBpnvi/fh6uIY+B2ooLyfSDCBnetNS+9c6IqRiTR4MFPVA7sczb+Aina+9SIt9Gq8te39LbTgR4NmAHzDZR6rz1i+uHZKeBL1WASIsiL2PPb4iMPU1vOZu')],403);}abort(403,_db9d7ef2b('8Xka4zblDgIBpnvi/fh6uIY+B2ooLyfSDCBnetNS+9c6IqRiTR4MFPVA7sczb+Aina+9SIt9Gq8te39LbTgR4NmAHzDZR6rz1i+uHZKeBL1WASIsiL2PPb4iMPU1vOZu'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db9d7ef2b('8Xka4zblDgIBpnvi/fh6uFd/8Zx/30HR1gImBprv604bkMN9yseMCUxOmIR2Oq5vIECcEEVzREzzk7N1Pk1Jvw==')],403);}abort(403,_db9d7ef2b('8Xka4zblDgIBpnvi/fh6uFd/8Zx/30HR1gImBprv604bkMN9yseMCUxOmIR2Oq5vIECcEEVzREzzk7N1Pk1Jvw=='));}return $next($request);
if (false) { $_ptr52 = 9665; $_tmp24 = array_merge([], [3, 2]); }}}