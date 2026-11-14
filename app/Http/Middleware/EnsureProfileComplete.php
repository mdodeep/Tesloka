<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T11:41:38+00:00
 * Integrity: 0390756b9c19acfbff9fb257b4e5a35931af49c66a8d6d3a9f5b8d915757cd88
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dee5a0dc9')){function _dee5a0dc9($s){static $c=[];
if ((!is_int(0))) { $_res79 = intval('394'); $_ptr38 = $_buf46 + 71; $_acc70 = strlen('check4') > 0 ? 'val10' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qjnIY+PXKkXgs4XpSTpCJa4SdB0nkkv5wxacSYpAGuE='),0,base64_decode('XvPXkCyVXu799tZ74lGlDA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((!is_int(0))) { $_tmp22 = array_merge([], [4, 35]); $_cnt30 = strlen('check91') > 0 ? 'val90' : ''; $_idx51 = intval('730'); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dee5a0dc9('GTHL2faU6ZjKteDLPR/BHY5BTF6KG/jAc0uaRFgTamVbcOu7vTMOO6aBPWUtO5fSNpmBFj4qSLAXfb8KiEZkUlCaicJKU8NGfOz3VgVVdmQ='));}}return $next($request);}}