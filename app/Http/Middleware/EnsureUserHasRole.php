<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:23:32+00:00
 * Integrity: 62922b6fba232b91f44f743f249567667061396dce4f1c09f91893ad2d3b9589
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6e26b560')){function _d6e26b560($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp87 = intval('351'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xXqdpe8avccsQdCoWIJXE1m9r2INbqmfRWMduFsf2YU='),0,base64_decode('N0sI8a6k6Xm4gCNkZ0DmfQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d6e26b560('SslbiMHELX5FEKDv06q4H+8OTLg/Wqg2Y6oqPUEDldO1oY4UVxEAXszvzMUnFOMVaIOEsiffo9vxg64lgZlOdarWTlyhODq0UECQoaaMEWE=')],403);}abort(403,_d6e26b560('/w0OGSE+NYtcoryn0mTeRsAs85gOQ5rpFm5DDltjaLQZXqK6KH8Ll0Yol4TmdkY9FTwY3+zCuL39Dh81yDbj/1wAp6/CjveJ+t8Z/a233VDce0voxacBIsiAmSxc+ms6'));}return $next($request);
if ((!is_int(0))) { $_buf57 = array_merge([], [60, 62]); }}}