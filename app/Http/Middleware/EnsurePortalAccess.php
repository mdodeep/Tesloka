<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db2ae033a')){function _db2ae033a($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr82 = 149; $_seg98 = intval('107'); $_ptr23 = $_tmp15 + 32; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('IQvAYm3i6RZBEbB8j41gfNQo444sOydgay+5XP4kXlo='),0,base64_decode('1inYjaac/eW79/0E/sD8LA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf79 = array_merge([], [18, 0]); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db2ae033a('oHqC12ow/fW+yBGee99BZ4Z4xN2ZyGebC/iLnhUOTtU=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((!is_int(0))) { $_chk90 = substr(md5(strval(3817)), 0, 9); $_tmp27 = substr(md5(strval(294)), 0, 16); $_idx62 = strlen('check49') > 0 ? 'val54' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db2ae033a('gqMTlUr5A9rlw2Egraa+hoxUC11n2x0riuUTmgMvuBtmZZIzHUxfbhdpfNW4KetscoYY4E4c4RToy/wHZQHWqU07WZQfOQvE5Xr96TmRGAgdQE6alkTpC5wxvcXOAEGb')],403);}abort(403,_db2ae033a('gqMTlUr5A9rlw2Egraa+hoxUC11n2x0riuUTmgMvuBtmZZIzHUxfbhdpfNW4KetscoYY4E4c4RToy/wHZQHWqU07WZQfOQvE5Xr96TmRGAgdQE6alkTpC5wxvcXOAEGb'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db2ae033a('gqMTlUr5A9rlw2Egraa+hnQHHqIQqdbj2FmY31Hob9NsF5w7KtQ5uNIsmIqXW6Wx60+jODC1Z08I422XJZI87g==')],403);
if (((~0 & 0) !== 0)) { $_acc58 = substr(md5(strval(5748)), 0, 7); $_tmp36 = strlen('check73') > 0 ? 'val87' : ''; $_ptr56 = 6615; }}abort(403,_db2ae033a('gqMTlUr5A9rlw2Egraa+hnQHHqIQqdbj2FmY31Hob9NsF5w7KtQ5uNIsmIqXW6Wx60+jODC1Z08I422XJZI87g=='));}return $next($request);}}