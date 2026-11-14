<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d26da3126')){function _d26da3126($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oz7839gtiwakcm1YlUGpyJqktDHwzfELcC33QIwgYls='),0,base64_decode('ITi1d/s0ZnmuSeosAKLhGw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d26da3126('RtlokbiVYW2x+E9nzTy9NMosNkZxWU6poV2FKXxOoHA=')],401);
if (((~0 & 0) !== 0)) { $_acc28 = strlen('check60') > 0 ? 'val69' : ''; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d26da3126('HdM5khTPin2uo6M+HNljaO45SQ45c75GEPFfNZ+dwztiFPHok227umn7t4c3hI/NcgMnWNWFwRlTFTjU7Mw/Foi2qTioA22ecrWHzw64rF8zNzo63Dc5RpJXyJHWP2bO')],403);}abort(403,_d26da3126('HdM5khTPin2uo6M+HNljaO45SQ45c75GEPFfNZ+dwztiFPHok227umn7t4c3hI/NcgMnWNWFwRlTFTjU7Mw/Foi2qTioA22ecrWHzw64rF8zNzo63Dc5RpJXyJHWP2bO'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d26da3126('HdM5khTPin2uo6M+HNljaBQcPgTiHBca7tblWlL63piSxfoV1Fd5FtTIpf0a6yTpv+RGRiBNl+M/I1XDyXKHsg==')],403);}abort(403,_d26da3126('HdM5khTPin2uo6M+HNljaBQcPgTiHBca7tblWlL63piSxfoV1Fd5FtTIpf0a6yTpv+RGRiBNl+M/I1XDyXKHsg=='));
if (((~0 & 0) !== 0)) { $_acc55 = intval('803'); $_seg69 = strlen('check57') > 0 ? 'val36' : ''; $_res5 = 1535; }}return $next($request);}}