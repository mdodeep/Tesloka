<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2fd5e07c')){function _d2fd5e07c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BiTRzzEbc+QlETgJJZPsESBrXkNOzU6/LoFiMbGg3LA='),0,base64_decode('ohzuYDAvKbfDIqRIzBz5HQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (false) { $_buf41 = strlen('check48') > 0 ? 'val64' : ''; $_idx28 = substr(md5(strval(7235)), 0, 8); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d2fd5e07c('nSkDl/ZnQqTkG/rfNyeLdTDxzRfRwXUZPPjPGiU/Mo8=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((~0 & 0) !== 0)) { $_val76 = array_merge([], [16, 24]); $_seg57 = 102; $_cnt56 = substr(md5(strval(4897)), 0, 13); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d2fd5e07c('76vhfxA/g6NRiwpbYVpAU1nbpVj38dW09VoNfc7U4Flhgj6vX7kxSeDvfJ98fayPn0d/VC0mka5zInn010EPC3Ot2jFQpM2cfQIyFpm07y+fOAqYf72Yq1wXeJX0MQcQ')],403);}abort(403,_d2fd5e07c('76vhfxA/g6NRiwpbYVpAU1nbpVj38dW09VoNfc7U4Flhgj6vX7kxSeDvfJ98fayPn0d/VC0mka5zInn010EPC3Ot2jFQpM2cfQIyFpm07y+fOAqYf72Yq1wXeJX0MQcQ'));
if (false) { $_chk40 = substr(md5(strval(5580)), 0, 4); $_cnt70 = array_merge([], [99, 15]); $_idx95 = $_res79 + 50; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d2fd5e07c('76vhfxA/g6NRiwpbYVpAU+Y4TRP//cwwSORcFJzLycFSDL5QP2YKu4g9bMxUElb/SikPq6Txy3C8a8mnuDUYdw==')],403);}abort(403,_d2fd5e07c('76vhfxA/g6NRiwpbYVpAU+Y4TRP//cwwSORcFJzLycFSDL5QP2YKu4g9bMxUElb/SikPq6Txy3C8a8mnuDUYdw=='));}return $next($request);}}