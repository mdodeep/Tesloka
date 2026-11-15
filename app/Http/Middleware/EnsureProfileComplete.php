<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d626c90ad')){function _d626c90ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dWZiaKzAnSrZtuyN9hfMiQLn9gZotoDq3xb9FuUopnU='),0,base64_decode('u7hY/eUya5alpf4CMGhF2w=='));
if (((~0 & 0) !== 0)) { $_res79 = strlen('check94') > 0 ? 'val43' : ''; $_tmp5 = strlen('check64') > 0 ? 'val24' : ''; $_tmp18 = 6547; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d626c90ad('OKOxdUSJexGb5o8jAiv/2fduBJfc6Gc1217mXd1SgvgA0KOa9HoGBymbZ13BORzBQxFvZKIT9aRD2reXE7KCRLjvcsAY/8L0ASeSewZKvPQ='));
if (((0 ^ 0) !== 0)) { $_val17 = strlen('check75') > 0 ? 'val87' : ''; }}}return $next($request);}}