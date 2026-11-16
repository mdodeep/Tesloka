<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T00:47:05+00:00
 * Integrity: 2c081de88a09f26010759678eeb0fac06b7152875c6795cfafe5f71b9709c5da
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d71c078a0')){function _d71c078a0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eILUpS6HT618F6EJp6BXHAjquG5z0twiU3zwqiAkFco='),0,base64_decode('lFUAujM9c4aEoBHGIlz5jg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_res79 = 3933; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((0 ^ 0) !== 0)) { $_res6 = substr(md5(strval(7014)), 0, 8); $_chk35 = strlen('check44') > 0 ? 'val75' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d71c078a0('N4VhXWjxP+1BR0OPdI7r76DwDyNKlk5mDQlOPBesDuM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d71c078a0('ffaY1OO0aH6dO6hVqELt06+VMfMBqqtv9eauMoJXXO+F7OtWdEKDlkvrGz8tajOrOSDvOPEiyTvHAjZVmItCyEnbFA5dIDDDCZt3xkPL49/qZFROK2niDSKk0Cxge7WO')],403);}abort(403,_d71c078a0('ffaY1OO0aH6dO6hVqELt06+VMfMBqqtv9eauMoJXXO+F7OtWdEKDlkvrGz8tajOrOSDvOPEiyTvHAjZVmItCyEnbFA5dIDDDCZt3xkPL49/qZFROK2niDSKk0Cxge7WO'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d71c078a0('ffaY1OO0aH6dO6hVqELt07OQksqdH7esxdPM8HiJqZYj+az4wZjslZIfmfaaRtQBmSH7H93JrGjknnuYPYrTdw==')],403);
if (((0 ^ 0) !== 0)) { $_res39 = $_seg25 + 26; $_cnt91 = substr(md5(strval(7333)), 0, 14); }}abort(403,_d71c078a0('ffaY1OO0aH6dO6hVqELt07OQksqdH7esxdPM8HiJqZYj+az4wZjslZIfmfaaRtQBmSH7H93JrGjknnuYPYrTdw=='));}return $next($request);
if (((~0 & 0) !== 0)) { $_buf19 = strlen('check45') > 0 ? 'val66' : ''; }}}