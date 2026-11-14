<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d89f9621a')){function _d89f9621a($s){static $c=[];
if (false) { $_seg57 = strlen('check86') > 0 ? 'val95' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nbWbKTIJNGtPoankOwTU7HvqcXfBgf9QIa8ZbxL2U6g='),0,base64_decode('o26abqQSxopYFKZ8sMuQwQ=='));
if (((0 ^ 0) !== 0)) { $_ptr70 = array_merge([], [22, 21]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_chk25 = 6485; $_res33 = intval('177'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d89f9621a('lbFWKzAm63w8R5RqOwtoCKS0113uCp4SFpak/ThZTRM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d89f9621a('sasUHMKPtKG2/4yHZunz0zhhX3FjM2Syl4QeiILnMyTukc69P9YirXmkWU1v4K6od3L1gZeNg4cWpbAWglOq1sU53D3NLxFuE1gIf0j0CtxZI8IEtJscRQymhEmTNSUG')],403);}abort(403,_d89f9621a('sasUHMKPtKG2/4yHZunz0zhhX3FjM2Syl4QeiILnMyTukc69P9YirXmkWU1v4K6od3L1gZeNg4cWpbAWglOq1sU53D3NLxFuE1gIf0j0CtxZI8IEtJscRQymhEmTNSUG'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d89f9621a('sasUHMKPtKG2/4yHZunz0zg/YuX2+INoByL0ucBbKUNWIwVqCkLRMuXUsrkVWtgCCeKcAy+KfQzTQL9oWg3E9g==')],403);}abort(403,_d89f9621a('sasUHMKPtKG2/4yHZunz0zg/YuX2+INoByL0ucBbKUNWIwVqCkLRMuXUsrkVWtgCCeKcAy+KfQzTQL9oWg3E9g=='));}return $next($request);}}