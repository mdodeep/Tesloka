<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db97e463d')){function _db97e463d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dWQgGbnX36L3vgpPAia7GvumRjHFNhupNnLd62J4KUA='),0,base64_decode('dYWiNU80ifB5eX0n/LcwNQ=='));
if ((!is_int(0))) { $_tmp92 = array_merge([], [23, 75]); $_tmp33 = substr(md5(strval(9976)), 0, 11); $_tmp57 = array_merge([], [39, 70]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db97e463d('6bURfmJRTxk/DOSNej/M2eIxRUfkOfLQVODcZAKN6xk=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db97e463d('kLvMfDnD/q6HMuutAV9MgvEVvKaFzN73QGuqs4cALCCu1ZbJO1r9uSO988IGL9E0spZXEujH+E8jlODc903Ssr7lew+DX8RZW/+uO1Mj01JWL7FIRpRXXrYCsONXB1C5')],403);}abort(403,_db97e463d('kLvMfDnD/q6HMuutAV9MgvEVvKaFzN73QGuqs4cALCCu1ZbJO1r9uSO988IGL9E0spZXEujH+E8jlODc903Ssr7lew+DX8RZW/+uO1Mj01JWL7FIRpRXXrYCsONXB1C5'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db97e463d('kLvMfDnD/q6HMuutAV9Mgls4kj3fJqG9HOWx+Y2tEEdNe13OxEVSZS1ncF2q3k5Os5lOFVar2sYm6Xg7eRA3Nw==')],403);}abort(403,_db97e463d('kLvMfDnD/q6HMuutAV9Mgls4kj3fJqG9HOWx+Y2tEEdNe13OxEVSZS1ncF2q3k5Os5lOFVar2sYm6Xg7eRA3Nw=='));}return $next($request);}}