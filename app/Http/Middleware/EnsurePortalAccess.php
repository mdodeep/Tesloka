<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8c7f4177')){function _d8c7f4177($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eCoEJ7UFo2KphBQTPX6orVYTgKvhv855biDZwDWLaDI='),0,base64_decode('PBWFfYBP8cY0E/bA9W5u6A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8c7f4177('rJmWg9hnvbPeR8v/H+z7ErPZQXEPvHQlFPI50UuvKBo=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_chk19 = strlen('check8') > 0 ? 'val63' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res71 = 8034; $_idx64 = strlen('check65') > 0 ? 'val86' : ''; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8c7f4177('ryfvs+CpcV2nV4AK/IU0SdPJwOXxtSjPu7dNqCPQlDiBYWT1FpBZy+Py5Wa9drsqp1tLKBdC4Ay3K3qrcq0unyR11LYyNB9m7vs6jUoCZPTmRnAhGAxoJLo3kO25TSHN')],403);
if ((!is_int(0))) { $_tmp4 = array_merge([], [75, 30]); $_idx68 = substr(md5(strval(2880)), 0, 15); $_cnt58 = 2334; }}abort(403,_d8c7f4177('ryfvs+CpcV2nV4AK/IU0SdPJwOXxtSjPu7dNqCPQlDiBYWT1FpBZy+Py5Wa9drsqp1tLKBdC4Ay3K3qrcq0unyR11LYyNB9m7vs6jUoCZPTmRnAhGAxoJLo3kO25TSHN'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8c7f4177('ryfvs+CpcV2nV4AK/IU0Seid3tpqGcDeVSZcf++xDYZhi0EYwJQblqCPKU8RtMPipu/TU3taVyi+xCW8m+a5Dg==')],403);}abort(403,_d8c7f4177('ryfvs+CpcV2nV4AK/IU0Seid3tpqGcDeVSZcf++xDYZhi0EYwJQblqCPKU8RtMPipu/TU3taVyi+xCW8m+a5Dg=='));}return $next($request);}}