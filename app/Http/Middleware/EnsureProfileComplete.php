<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T15:44:11+00:00
 * Integrity: edd074c8e740da8aa4cb5d5dde15c72b21ea211882671f62e8f210651ef543bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d13af57d5')){function _d13af57d5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SxEC9eZURKiqS+A+uCczBHCVANCiIsxV3f2itHcGW0g='),0,base64_decode('dabMcadOcIe3zP6XqEVNTg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d13af57d5('blAgMhv+SMdkdGHVePdElXp8D+JKNKeMDQOhKR7ATkMPR3A5Drr/a/0aIOTOYQRSzYOf0Gq5dQTtG1eZ/Oj/QFU/F7wcf8QYrDXLi530NkI='));}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr37 = 6517; $_ptr95 = strlen('check39') > 0 ? 'val35' : ''; $_idx26 = strlen('check63') > 0 ? 'val27' : ''; }}}