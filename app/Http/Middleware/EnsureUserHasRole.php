<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:49+00:00
 * Integrity: 47d77785b7693bde6cba101c75e2ba7d523281db8c0cc0ae672ba68f3781cb9f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd35967a7')){function _dd35967a7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PAJK7btRxELOs9oMQSKDjQWEwvcaojVj42v+JW5aPj4='),0,base64_decode('l2D5i4VVwCs3AVUyfGb3Nw=='));
if (((0 ^ 0) !== 0)) { $_acc12 = intval('743'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dd35967a7('IUwXGJfcSQhb4nYcmp/fYahZOiENP8/KVkcRs8N7FVn/F8CbW7hGkwc/Xj7jVEAcoZMyh7OhusnjJ3NyLwfkNtrsXdN+5lQBAdr1O4c/EWY=')],403);}abort(403,_dd35967a7('dLxDswh73LFw7zRdeeC6l9FbmyUlHMXmDrvtrVW6E7iBEdkxbqSlx0SNk0LK/G4PLAzoN2sOR7ZLDJ4+L3CBZSaFNb+UTcCnwmoVGNSo71bgm6pxWNYDwlS7PuFnk4z2'));
if (((0 ^ 0) !== 0)) { $_acc26 = 5360; $_seg15 = intval('959'); }}return $next($request);}}