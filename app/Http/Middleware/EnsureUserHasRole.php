<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T16:15:02+00:00
 * Integrity: 3fdd4e81275382375f811facecf8d5cef5cda7157404fa8661a4104594859a25
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d919bbbae')){function _d919bbbae($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('G2UFDLTmVN4ccJfEmKj0opdc5qzHkLrwwcH8JfNLCL0='),0,base64_decode('6S5SSN3oPO+Vv3CHPd/esw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res7 = 2841; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt34 = 7657; $_idx45 = array_merge([], [8, 57]); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d919bbbae('yo9AMF5AxyQuditLtMnz8d+ZJqywSF7McPT0J/BiBgvHFUXkrxJIjmNrkEmFvkgikHCeMgX4wRsZX5yrDvXJYos9fQkrpTJylL9MGWsVfUw=')],403);
if (false) { $_seg91 = intval('644'); $_chk96 = $_tmp29 + 1; $_cnt39 = $_seg83 + 30; }}abort(403,_d919bbbae('1ma3nmcvdmkHAJ8d544vi3k14KIN8+458MJ6kiSB1Se79Sou79iGlB+PAHOHy9f12ttO1Xode8zS1y1bSFzu4cNpeoK+Wlt9Mi85K1eNnbjwv5NwOdXtTAKOPJsvqN66'));}return $next($request);}}