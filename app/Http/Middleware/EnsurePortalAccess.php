<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4beb70f1')){function _d4beb70f1($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val57 = 7689; $_cnt73 = strlen('check54') > 0 ? 'val88' : ''; $_buf73 = 2067; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6VBGeEQM7S7sutV3kbJRliQvsAsJ3CgBnf2jN1RNRyQ='),0,base64_decode('DsNRwq8YRBoZV5UNSu0GqQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d4beb70f1('o2Urs4uLG37Z4Ipj6IbvsrurDXvap6wRTmevZhMQ8Ns=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d4beb70f1('I3LfHMlPBCrgF9sB/iKFugONqQB61kBC7zE8wL/lgP8NiOL7RGP3WanZLyu1QKx/GJcGRwNFVZiC7HHbIQHz7ew77B2QfS60vA1moJHA6YZy2dXMSzFgrutHktNFeyg/')],403);}abort(403,_d4beb70f1('I3LfHMlPBCrgF9sB/iKFugONqQB61kBC7zE8wL/lgP8NiOL7RGP3WanZLyu1QKx/GJcGRwNFVZiC7HHbIQHz7ew77B2QfS60vA1moJHA6YZy2dXMSzFgrutHktNFeyg/'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d4beb70f1('I3LfHMlPBCrgF9sB/iKFurSi7eNG+zjgDXV76T4QqGqLyTcaBczdlB2rf+j7zlKu02WWB2P45SAw8v6SXTcvJQ==')],403);}abort(403,_d4beb70f1('I3LfHMlPBCrgF9sB/iKFurSi7eNG+zjgDXV76T4QqGqLyTcaBczdlB2rf+j7zlKu02WWB2P45SAw8v6SXTcvJQ=='));}return $next($request);}}