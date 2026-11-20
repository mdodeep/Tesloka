<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d621ff0b7')){function _d621ff0b7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NiyFQXz538dnLhqWfej402GTTwXkfyqOd74htfjnTmY='),0,base64_decode('ijqToMbThdvjBvTiWacAqg=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg16 = array_merge([], [58, 32]); $_tmp90 = strlen('check54') > 0 ? 'val10' : ''; $_res97 = strlen('check73') > 0 ? 'val56' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d621ff0b7('zRpW3B4ZmtKvWJB+qP4b0ZdqvgmOdrapivSuPrP6YMLhWRQO73iTXz412aj7fuVxtEmy92E7KhJVQYUhFmvUPLbiWKxJIU04XiZ0rbdHU/o=')],403);}abort(403,_d621ff0b7('U70OcG2YCkj4pOUp9Qgs1ydev4nxV/wXVzafCYdf3CWZzTbuldhv2gykNBsLbj2wyBj6FK9AzeIUaGwH/pe4GOb90dhV7l9EURSWOwKOQCkafwilKFoMPghQYy1r5mmb'));}return $next($request);}}