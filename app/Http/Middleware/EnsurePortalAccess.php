<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db147f8b4')){function _db147f8b4($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6+rRgkfWGf161Ny7seAAhyZIFvJ/WlhN1zzhHtKzYxs='),0,base64_decode('EebYRUOvovFTm75X1wY3HQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_res99 = intval('270'); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db147f8b4('9eXNLtMUf368VlbFxnyBF5+2NEI5PHxiFZ5kTdN/6RE=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((0 ^ 0) !== 0)) { $_idx61 = 1424; $_tmp50 = $_res31 + 38; $_cnt26 = 6606; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db147f8b4('CZFtSZrBL3w2fhC2TlZsp43F/5+6NSbVjlP0Te54Pq33/hVDmiADZ8aYxIDu/rozJM0eyKhsiopGSzVDrUazNW+EDTRlj7AhHxQ3BgX+cFEdYgPi1CSl4yKI4eviw2JQ')],403);}abort(403,_db147f8b4('CZFtSZrBL3w2fhC2TlZsp43F/5+6NSbVjlP0Te54Pq33/hVDmiADZ8aYxIDu/rozJM0eyKhsiopGSzVDrUazNW+EDTRlj7AhHxQ3BgX+cFEdYgPi1CSl4yKI4eviw2JQ'));
if (((0 ^ 0) !== 0)) { $_ptr65 = substr(md5(strval(6716)), 0, 8); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db147f8b4('CZFtSZrBL3w2fhC2TlZspyuUf0R4BcOMqDQImhS0VAmm3CLSigZfpth+o76rVoE0pzNjJx+JTxUH+iJwlrFbwg==')],403);}abort(403,_db147f8b4('CZFtSZrBL3w2fhC2TlZspyuUf0R4BcOMqDQImhS0VAmm3CLSigZfpth+o76rVoE0pzNjJx+JTxUH+iJwlrFbwg=='));
if ((!is_int(0))) { $_ptr73 = $_idx64 + 16; }}return $next($request);}}