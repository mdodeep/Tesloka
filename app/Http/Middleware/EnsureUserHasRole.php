<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d399d1009')){function _d399d1009($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('o8cQjfvfKm3lNGj+Ud6vLPmyxjJe8bL4wtEQk4xViqg='),0,base64_decode('Y/kC0jYig63n1bxLcXuR6g=='));
if (false) { $_seg72 = substr(md5(strval(5436)), 0, 10); $_idx65 = $_res26 + 76; $_ptr55 = $_chk6 + 56; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d399d1009('+mdkDoF9e4IMHhBaqh9Y7AJKiLhKnIL0nfT8NG3ubkPibKDSC1sh9t2NjGhr2gvMCDhpuj0ppnjSeaAicy0+HiTRcuNelUpYxjcolIY2noM=')],403);}abort(403,_d399d1009('ECAwTt92ycgIiRfYPsyIJihw0GtFqW+fWCDFxuhSDX9HSs1zxfNs004aOmXEIze8LBmwFC7bbognCBXwYlvFck9Rjx3z2s1HBHF16tq9GcLgjv4iM7VQTKCITgySD7sD'));}return $next($request);}}