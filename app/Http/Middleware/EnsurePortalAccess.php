<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de882cd0d')){function _de882cd0d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('++5Xh5kr6OAGYg8e0Yvgn0oS5wwmFD15qf9HqR5/7RM='),0,base64_decode('Gfa6BnJ9wC4z6MWaBJ/WcQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_res30 = intval('615'); $_buf53 = 9783; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_de882cd0d('NqjrTHuiFcpoB4IKvnvERly+4r1E2WM7MZ2Mmzjgnyk=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_de882cd0d('oypku8I85TVLyMLJ6i0B/oBMU0tkOv3ZVNGo4k/vM9wAqB7xA1PF+skXfD8pywWyEP8Is1IdVXHWTFsb3OCBs2bUWGsh45znNfAuXlktUZNPKa7SO+dK+Po3EZQblZXu')],403);}abort(403,_de882cd0d('oypku8I85TVLyMLJ6i0B/oBMU0tkOv3ZVNGo4k/vM9wAqB7xA1PF+skXfD8pywWyEP8Is1IdVXHWTFsb3OCBs2bUWGsh45znNfAuXlktUZNPKa7SO+dK+Po3EZQblZXu'));
if ((!is_int(0))) { $_seg80 = array_merge([], [20, 31]); $_val95 = array_merge([], [7, 96]); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_de882cd0d('oypku8I85TVLyMLJ6i0B/s45/WaR9z9pMvfpXoFAJv2IwYCeM9KyLWybAuiVwEvrsCKMQRSFBwRbIhcrnxiVdQ==')],403);}abort(403,_de882cd0d('oypku8I85TVLyMLJ6i0B/s45/WaR9z9pMvfpXoFAJv2IwYCeM9KyLWybAuiVwEvrsCKMQRSFBwRbIhcrnxiVdQ=='));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc56 = array_merge([], [7, 74]); $_val70 = strlen('check15') > 0 ? 'val89' : ''; $_cnt25 = intval('309'); }}}