<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d11aa840b')){function _d11aa840b($s){static $c=[];
if (((~0 & 0) !== 0)) { $_buf4 = intval('467'); $_buf86 = array_merge([], [11, 63]); $_val5 = substr(md5(strval(9729)), 0, 11); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dV6idnBlrwScNo5eogDSFoN128IkaaFVtwc83q7hDQM='),0,base64_decode('lkNkIG+dedHv85ZenHCqgA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if (((~0 & 0) !== 0)) { $_chk51 = strlen('check73') > 0 ? 'val90' : ''; $_cnt52 = substr(md5(strval(4092)), 0, 10); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d11aa840b('QDZ2NqQjH/JI4qLDp4Cg1tVogc72ahPFb2KUyKB6BmHVbD3MqYhDLmd+GdYY6T4TIJeNpjxR6jgp1MSbOf3VN9WwtUwlghfr5OeBD6OLaWM='));}}return $next($request);}}