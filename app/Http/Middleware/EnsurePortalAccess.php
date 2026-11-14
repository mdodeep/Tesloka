<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:00:09+00:00
 * Integrity: 62cc99f0674a100fbafa818261736a32373c8a2eee231e5285bfc54cf0a56681
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8897c306')){function _d8897c306($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp38 = array_merge([], [32, 22]); $_tmp33 = $_tmp92 + 4; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('keEZlgWT+MSyaoPIs3ccoHlr2zpYt71DlvEyUH7R0Fg='),0,base64_decode('3IDVwY/jxhZa68/e7xRDpQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_cnt13 = strlen('check54') > 0 ? 'val89' : ''; $_chk22 = strlen('check71') > 0 ? 'val55' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8897c306('tqbmrLcPCz/XUF2y/FqZ5ZDXCqC1NTspumJS/WjQDyw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_val81 = substr(md5(strval(3391)), 0, 5); $_buf7 = strlen('check58') > 0 ? 'val65' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8897c306('2hfJfpjHy3i3YJhubCdXFQVzpVifn2MaEEOAYoyTHD6TDyOc48XSkPHllG0UWodTP0qDSNtCBUSOIa6bW3YXk7ikfqTXJT1Be7kC+FwbA50/o+eGqs0H265nGrK9Lvb4')],403);}abort(403,_d8897c306('2hfJfpjHy3i3YJhubCdXFQVzpVifn2MaEEOAYoyTHD6TDyOc48XSkPHllG0UWodTP0qDSNtCBUSOIa6bW3YXk7ikfqTXJT1Be7kC+FwbA50/o+eGqs0H265nGrK9Lvb4'));
if ((!is_int(0))) { $_tmp24 = array_merge([], [43, 75]); $_cnt42 = strlen('check54') > 0 ? 'val62' : ''; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8897c306('2hfJfpjHy3i3YJhubCdXFWtw9j7EFRlk5CXRt8J+7NdeEmUDpREeKFseR4ZSKGnesXgazRM1UjqX8+MXNdhwnA==')],403);}abort(403,_d8897c306('2hfJfpjHy3i3YJhubCdXFWtw9j7EFRlk5CXRt8J+7NdeEmUDpREeKFseR4ZSKGnesXgazRM1UjqX8+MXNdhwnA=='));}return $next($request);}}