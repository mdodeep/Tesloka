<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d21d46d42')){function _d21d46d42($s){static $c=[];
if ((!is_int(0))) { $_cnt40 = $_idx90 + 68; $_tmp79 = substr(md5(strval(8184)), 0, 13); $_chk34 = $_acc69 + 94; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0ihdt9/l1kH2hbq0LoGKGguud2vF22G95e7MiCTKLec='),0,base64_decode('5jtpJuujfXHW/L3dlE9T+A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((0 ^ 0) !== 0)) { $_tmp25 = array_merge([], [76, 99]); $_chk17 = $_buf4 + 4; $_acc37 = substr(md5(strval(654)), 0, 5); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d21d46d42('VCQWfinqAuFmAaLHLOUbg9LwZL4tKqQEN2+JTKCj34B7zdcmewpvyQuOyQcv7cECyXckEJqG3YyGe3uA9xUwFZBYrpsRas7XMnRGSJgz/rA=')],403);}abort(403,_d21d46d42('8c8oe1WyZ8YZByj9BYTAk8Uv6uhvzn7nLgGEm9gFMNZ0ZCVC63fnZydlbCh5+xCegW9H7ANJxPfad99GEWWmWd7vyaAcYXAZ6ZWn5mLuYJ+skpfcK9ATF6pJdx3dfSwu'));}return $next($request);}}