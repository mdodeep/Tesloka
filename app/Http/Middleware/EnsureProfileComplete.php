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
if(!function_exists(__NAMESPACE__.'\_de97e0d3f')){function _de97e0d3f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('n37etQz/eJ52joRCbxSxb8AmW0yRjuYbokeuEhWVNyk='),0,base64_decode('F3MEkE4211R2Ok/HFye3KQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_de97e0d3f('826S6r4Rv02PAzuyJa+Y2ZGMPtNFMvqCYUNnl9rSY72njDqyL0CTIn3TAJILM8OnbmlxFZB386ZrDX3kL7deM8vJ8/W9w/zjLVJJfMKi85Q='));}}return $next($request);}}