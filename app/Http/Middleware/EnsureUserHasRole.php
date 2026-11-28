<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d20780c31')){function _d20780c31($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Mp7n+YxGIL44+D6XQ3YqxET3RwBkFEkjmvATSapz14A='),0,base64_decode('DR7TjYvHH4bViTCS5+6N1A=='));
if ((!is_int(0))) { $_buf81 = 6908; $_idx5 = substr(md5(strval(9600)), 0, 9); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d20780c31('7sp3LxqVlXTRPw+EBVEU4PdcMmtzGUsfiTElDH0pzXI0WyIaU8nXyZ6vZTUPTuKqLm3oxxPI9Lylxvh79oAfJGMH2DAM8I0ewQjfHdDTnmI=')],403);}abort(403,_d20780c31('arGY5zZymqJbcTlPBxlh3WFepjUB45FREndSWXeV5CzFSKVL/6rS051V1CYGMiA1YTMPIXJnj15hlqd0odg495elnILhH6dn02Y3QrX0zflmbCxK9eyOET9la6DDD/Vd'));}return $next($request);
if ((!is_int(0))) { $_tmp5 = substr(md5(strval(7727)), 0, 8); $_chk76 = strlen('check36') > 0 ? 'val7' : ''; }}}