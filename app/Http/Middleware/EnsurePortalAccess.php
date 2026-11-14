<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd7d754e6')){function _dd7d754e6($s){static $c=[];
if (((~0 & 0) !== 0)) { $_ptr90 = strlen('check71') > 0 ? 'val6' : ''; $_idx69 = strlen('check58') > 0 ? 'val73' : ''; $_val43 = array_merge([], [23, 89]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('iwZEAlUtsM5QI1cjJNpW29e9dmx/oP/7auv4bzLOu/k='),0,base64_decode('FsE6WmE/GbGYg/UnEMcYiA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((!is_int(0))) { $_seg36 = strlen('check43') > 0 ? 'val16' : ''; $_res87 = substr(md5(strval(1224)), 0, 9); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dd7d754e6('SnPim3tcTKleSP+rppeSaWAjyBFW3d+l/Y7yQEiA99c=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dd7d754e6('XaBcj2yn8K0xr15RUQidz79dnzMDdhA1VVGlMePssOZ6k+NsMIW8p7bElNyMudv1AWZy6oDsaSjsmQCtbIRh8NKHvfiXayujXhkVa/PKRopVLYvRQAKlTdRwRGFdIiIE')],403);}abort(403,_dd7d754e6('XaBcj2yn8K0xr15RUQidz79dnzMDdhA1VVGlMePssOZ6k+NsMIW8p7bElNyMudv1AWZy6oDsaSjsmQCtbIRh8NKHvfiXayujXhkVa/PKRopVLYvRQAKlTdRwRGFdIiIE'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dd7d754e6('XaBcj2yn8K0xr15RUQidzwMhJCs51B04ZcuuSZzIBrp9Nh7DOP87Ox62/AdQZ+BvaDIEjs0EcCOVPfaAtX5KSQ==')],403);}abort(403,_dd7d754e6('XaBcj2yn8K0xr15RUQidzwMhJCs51B04ZcuuSZzIBrp9Nh7DOP87Ox62/AdQZ+BvaDIEjs0EcCOVPfaAtX5KSQ=='));
if (false) { $_ptr22 = strlen('check37') > 0 ? 'val61' : ''; $_res75 = intval('191'); }}return $next($request);
if (((0 ^ 0) !== 0)) { $_cnt23 = $_val89 + 94; }}}