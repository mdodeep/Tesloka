<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d54dd0ed3')){function _d54dd0ed3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KAMMVs/Z9Pz9mmNRWmYSOMmR7NbghK44VHztJrdag6g='),0,base64_decode('CeLNktKfLN2T+FAlxdc6FQ=='));
if (((0 ^ 0) !== 0)) { $_acc63 = substr(md5(strval(9061)), 0, 9); $_seg0 = 1559; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d54dd0ed3('CIJfrjNLH05Nrembz4tt2tugBa9znUdRC94cn4Z8P+M=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d54dd0ed3('ROk1SejSToKN8iHaZ8iOjbvKMCIWZPQ7DSKYMMksOV4nIckzZZLmfggGLGDJj3z8FRDXwl2rrYDm2vcCRRvmlsdQxMYW5h1L4h3lhDwmj+mNXNtDWarGR2r8SlSUaoOX')],403);}abort(403,_d54dd0ed3('ROk1SejSToKN8iHaZ8iOjbvKMCIWZPQ7DSKYMMksOV4nIckzZZLmfggGLGDJj3z8FRDXwl2rrYDm2vcCRRvmlsdQxMYW5h1L4h3lhDwmj+mNXNtDWarGR2r8SlSUaoOX'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d54dd0ed3('ROk1SejSToKN8iHaZ8iOjZQ/aHO7WfwCdvMal2T/OCmf11nDLC1rG1H/Ss3dtyupxsXH8F86qwzNX15PfZJQVQ==')],403);}abort(403,_d54dd0ed3('ROk1SejSToKN8iHaZ8iOjZQ/aHO7WfwCdvMal2T/OCmf11nDLC1rG1H/Ss3dtyupxsXH8F86qwzNX15PfZJQVQ=='));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_chk92 = 7922; }}}