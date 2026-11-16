<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:50:57+00:00
 * Integrity: 5cf67b61e0674535d9f6749ad9e5aaf61ba8ad764de9e4f520e54a95d11dbfd3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0893dbfb')){function _d0893dbfb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lXxtzEpNIqxDxltMMjC6ZzYVbF0p4obUbdRj7w/1bII='),0,base64_decode('O23V5JrFvk+v84R4yTbXJQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d0893dbfb('wKmxxr63LFTDuhmw37fCyKBE56ZM8dtWYu3InE0JDmQ=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_ptr7 = substr(md5(strval(6601)), 0, 10); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d0893dbfb('TgRadcwL1N/DekzQaIqBWnnJ6brKgJaHeoDthXC1pishzfvVoSyh2/27T8sFtu2eSvTjYab8dKTQhb3/cxTwQ6tMui1TvfmMMFf1znNMJ2NIxr75P+ielrvb7ElZTUFR')],403);}abort(403,_d0893dbfb('TgRadcwL1N/DekzQaIqBWnnJ6brKgJaHeoDthXC1pishzfvVoSyh2/27T8sFtu2eSvTjYab8dKTQhb3/cxTwQ6tMui1TvfmMMFf1znNMJ2NIxr75P+ielrvb7ElZTUFR'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg65 = array_merge([], [63, 68]); $_tmp33 = substr(md5(strval(3240)), 0, 11); $_tmp45 = strlen('check28') > 0 ? 'val63' : ''; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d0893dbfb('TgRadcwL1N/DekzQaIqBWvWhKfNDCJz8DKtkSE0giEPWCBQ4ArmHNX4V2VfnL5jHjFnS60AqHM7JlYT+tEUX8A==')],403);}abort(403,_d0893dbfb('TgRadcwL1N/DekzQaIqBWvWhKfNDCJz8DKtkSE0giEPWCBQ4ArmHNX4V2VfnL5jHjFnS60AqHM7JlYT+tEUX8A=='));}return $next($request);}}