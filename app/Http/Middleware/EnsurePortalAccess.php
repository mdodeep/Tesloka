<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dee89cd40')){function _dee89cd40($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YiN8DbgIfeVRV4fD8m2PyD9YfHvwOOsvnJ1PGu1yt2A='),0,base64_decode('Xi07TES+Aq9GLhO93LbBbg=='));
if ((!is_int(0))) { $_acc38 = $_val99 + 98; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dee89cd40('ieMtISfn/REx/j6ZJrfrV5yFZsTh3/nJfyXwzzZ/+vc=')],401);
if (((0 ^ 0) !== 0)) { $_idx75 = substr(md5(strval(3764)), 0, 13); $_tmp79 = strlen('check86') > 0 ? 'val67' : ''; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dee89cd40('zM9uBXNUl5fniKyNZ9NUxVWhrm7cZ/rnxhDlcOZ5w8cMurr79gQTZu7L+VEJY5EojInLc7/Obkkg9K09oiLWEK9dTfIp+/KwZ9Wt8cnzUXTABuFTvLLhJFLRIcf0FD6i')],403);}abort(403,_dee89cd40('zM9uBXNUl5fniKyNZ9NUxVWhrm7cZ/rnxhDlcOZ5w8cMurr79gQTZu7L+VEJY5EojInLc7/Obkkg9K09oiLWEK9dTfIp+/KwZ9Wt8cnzUXTABuFTvLLhJFLRIcf0FD6i'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dee89cd40('zM9uBXNUl5fniKyNZ9NUxRuJ+HIcgT8d0t9ljiCeUh+csDvqk6Mfb30MQFxeCCGs5wDUSXbwo5O6b1MkYNFJag==')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc98 = array_merge([], [59, 88]); $_seg71 = 4100; $_val68 = strlen('check71') > 0 ? 'val4' : ''; }}abort(403,_dee89cd40('zM9uBXNUl5fniKyNZ9NUxRuJ+HIcgT8d0t9ljiCeUh+csDvqk6Mfb30MQFxeCCGs5wDUSXbwo5O6b1MkYNFJag=='));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt17 = array_merge([], [43, 37]); }}return $next($request);}}