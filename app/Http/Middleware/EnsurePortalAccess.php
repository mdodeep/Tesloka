<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dab4370b0')){function _dab4370b0($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_idx20 = strlen('check96') > 0 ? 'val92' : ''; $_tmp55 = array_merge([], [9, 94]); $_res53 = substr(md5(strval(1755)), 0, 16); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6/6kkd4tNvHbFax8YWxvXszrDi5E37NpqWNccjZOMM0='),0,base64_decode('zPZGaVxRiHYIsKBaINz+KQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_tmp66 = substr(md5(strval(5952)), 0, 13); $_ptr52 = array_merge([], [20, 80]); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dab4370b0('sirLKPgr2oHjLRV4SPX11KHPegfIE86Tcbotx+docrs=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_chk13 = intval('224'); $_acc8 = substr(md5(strval(4719)), 0, 7); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dab4370b0('CDmRSmNouzfJn8pfIwam8M+TceYAgtyQDXv6inWpArMlBxy6sk3TuBAYVMu3sY5GY/0Ql0fs0k6M+S47HdpkcUKmjJjJ8Abg2455gU74Ry2nBa65ca33U/SxRCVQWECM')],403);
if (false) { $_res40 = $_res61 + 56; }}abort(403,_dab4370b0('CDmRSmNouzfJn8pfIwam8M+TceYAgtyQDXv6inWpArMlBxy6sk3TuBAYVMu3sY5GY/0Ql0fs0k6M+S47HdpkcUKmjJjJ8Abg2455gU74Ry2nBa65ca33U/SxRCVQWECM'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dab4370b0('CDmRSmNouzfJn8pfIwam8H1sltISmdm2BSGiBwI0f1cw7dkiFEJ+32erd+SM13Dr1lPzXIy164p1yyI+n7mf/A==')],403);}abort(403,_dab4370b0('CDmRSmNouzfJn8pfIwam8H1sltISmdm2BSGiBwI0f1cw7dkiFEJ+32erd+SM13Dr1lPzXIy164p1yyI+n7mf/A=='));}return $next($request);}}