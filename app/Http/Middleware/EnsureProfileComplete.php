<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d88cfdec7')){function _d88cfdec7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vnZO4Ws5AlE6nt4LRYsZyd930JJQGDpEcycGJW5+3KM='),0,base64_decode('YYSCUebc4CTwi1bQXepuhw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d88cfdec7('kugzbPmbf3AFy4QHOv3uDtvyUn8bGgK7O/0IDVcilzRUwT5/3xL9HcpIoHBJkqPnYhkLsc9HHET2p2oc1V44AVR2ILIDmHXqOxsGUzTdXOQ='));}}return $next($request);
if (((~0 & 0) !== 0)) { $_chk65 = array_merge([], [0, 1]); }}}