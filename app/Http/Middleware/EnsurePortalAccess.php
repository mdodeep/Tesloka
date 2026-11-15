<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8f102cf7')){function _d8f102cf7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('I2GxIJ/F/H7a+Xk3uYv85+IyEoIlQ1fInPRSLAMbLlc='),0,base64_decode('sEzwgizpEMCF3dklWtEPbQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d8f102cf7('QhKtyv3irZpzKthhzvTgEHpI4jef5ab0s69MT5b0ZX0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_res32 = intval('152'); $_res17 = array_merge([], [61, 90]); $_val51 = intval('330'); }}$_v7e58=Auth::guard($_vefbd)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_buf31 = intval('22'); $_acc91 = 1217; $_acc26 = array_merge([], [22, 92]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d8f102cf7('ajE+Kue2qI7xK+Qr3ROWqykRqkFVhR1jsEHdQ2hHdlFrwyJADAXpB98hBNNDiAxl83Cogguj/5USviIBfIhnKmCp+7HDrUNr4bCKZ5lnUB1Drl5QbF9Hm3i3P6ZFl80a')],403);}abort(403,_d8f102cf7('ajE+Kue2qI7xK+Qr3ROWqykRqkFVhR1jsEHdQ2hHdlFrwyJADAXpB98hBNNDiAxl83Cogguj/5USviIBfIhnKmCp+7HDrUNr4bCKZ5lnUB1Drl5QbF9Hm3i3P6ZFl80a'));
if (false) { $_ptr31 = 28; $_res0 = 5727; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d8f102cf7('ajE+Kue2qI7xK+Qr3ROWq3f6g8rKKX6AZGp0z2WJ72dkhFS7BB29tLNAkzzsP/pWGPIz5OLZMhBmuGjlTrH0mg==')],403);}abort(403,_d8f102cf7('ajE+Kue2qI7xK+Qr3ROWq3f6g8rKKX6AZGp0z2WJ72dkhFS7BB29tLNAkzzsP/pWGPIz5OLZMhBmuGjlTrH0mg=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf65 = $_ptr79 + 54; $_idx64 = $_seg51 + 66; }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_val16 = array_merge([], [99, 78]); $_seg77 = strlen('check34') > 0 ? 'val12' : ''; $_chk16 = strlen('check70') > 0 ? 'val55' : ''; }}}