<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db2150e82')){function _db2150e82($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JjlyezFXlk5zPX9G3HJS+qUkRGljJXbXsS5YGDwLz5k='),0,base64_decode('Bm97b0zs3Xx3wYoNzB+myg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_db2150e82('697yGkCL7A00Tgj0zHIWzq4JKwk7uIlOI71wYyQawbpKs2Ki93TCEsdUeWxbJD66tacpuBAgS6KJb7rLust4shD90cwlxfCMIqEeVrLkpyk='));}}return $next($request);}}