<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T01:23:55+00:00
 * Integrity: 03dd73e209ae763b7e45b9127ad9ba4052ed9339cd9eeca7000dee536483c9e0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d12803569')){function _d12803569($s){static $c=[];
if ((!is_int(0))) { $_ptr68 = substr(md5(strval(5373)), 0, 13); $_ptr88 = intval('454'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mPKB09qXCJAJa4TZE1a5cypHJDbmkYpGxZNQRa7KUGM='),0,base64_decode('G8W69agD1i6H1JpVNH8EzQ=='));
if (((~0 & 0) !== 0)) { $_ptr51 = $_cnt59 + 91; $_idx0 = substr(md5(strval(9651)), 0, 13); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if ((PHP_MAJOR_VERSION < 0)) { $_chk55 = strlen('check79') > 0 ? 'val82' : ''; $_chk22 = strlen('check90') > 0 ? 'val44' : ''; $_idx62 = strlen('check80') > 0 ? 'val86' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d12803569('k71HUvWH1jXc7MpRle6fA0l2ijULbWtrRUvOYDlkK80=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_buf40 = strlen('check94') > 0 ? 'val15' : ''; $_res13 = intval('768'); $_seg41 = substr(md5(strval(7611)), 0, 11); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d12803569('SFzZQIxoOng/MPfcQLm/kHupQK8Mz5jKCcnUxJKZMg4aDIFG/zDXQjMjyz6aCstQ+I236MhvrpY82IIgRSyFGcucbV9ol6ZfXokNavf2XMtdwJ589mK1MLMeOQeAMkna')],403);}abort(403,_d12803569('SFzZQIxoOng/MPfcQLm/kHupQK8Mz5jKCcnUxJKZMg4aDIFG/zDXQjMjyz6aCstQ+I236MhvrpY82IIgRSyFGcucbV9ol6ZfXokNavf2XMtdwJ589mK1MLMeOQeAMkna'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d12803569('SFzZQIxoOng/MPfcQLm/kGrUU22LTwjW6rtqF4SbAFb347wO6RVGl+7ZleCvOgj+At+3lPW4nJTQ/XjW8+NutA==')],403);}abort(403,_d12803569('SFzZQIxoOng/MPfcQLm/kGrUU22LTwjW6rtqF4SbAFb347wO6RVGl+7ZleCvOgj+At+3lPW4nJTQ/XjW8+NutA=='));}return $next($request);}}