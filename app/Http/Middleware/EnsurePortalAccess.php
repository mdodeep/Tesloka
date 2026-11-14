<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:24:07+00:00
 * Integrity: 3f389135bae9bc9d8687dd0a86e767fd91c57a5c6dc1ad9f62845c658358687c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc4b7d887')){function _dc4b7d887($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HQsooKhV423QbUtHJz+DXmHc1/vwvFmOE22wXuDpdmg='),0,base64_decode('9QpD+EkNaPJBnF2SGxVtcg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dc4b7d887('dsNdhQI46WdsfK/isBkGZH6tbmzTunBMno3A3DlJtkQ=')],401);
if (false) { $_val81 = 4222; $_res96 = substr(md5(strval(1255)), 0, 4); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dc4b7d887('5PMNUWQ/pkaZboObzXmpgm0e12+EzLfEJMi+7yy6tnluh/AvJPr676/ZbHdOfmz1r02kuHoSb3UPwpxbkvb5AXmOVrJCivn6kHXQ5OCIiBSq7KrXwbjXX56S8ZX0hExW')],403);}abort(403,_dc4b7d887('5PMNUWQ/pkaZboObzXmpgm0e12+EzLfEJMi+7yy6tnluh/AvJPr676/ZbHdOfmz1r02kuHoSb3UPwpxbkvb5AXmOVrJCivn6kHXQ5OCIiBSq7KrXwbjXX56S8ZX0hExW'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dc4b7d887('5PMNUWQ/pkaZboObzXmpguE9ecGOBTotTasro1dJMfs4Ja+kK1ycO8NrCr2VZLNzV/fr1/c/z84zzbeMRro7Pw==')],403);}abort(403,_dc4b7d887('5PMNUWQ/pkaZboObzXmpguE9ecGOBTotTasro1dJMfs4Ja+kK1ycO8NrCr2VZLNzV/fr1/c/z84zzbeMRro7Pw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg71 = substr(md5(strval(5009)), 0, 5); $_chk39 = intval('235'); }}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res41 = intval('601'); }}}