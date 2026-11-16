<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5c7cdbae')){function _d5c7cdbae($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('F/n4O3RrWSKQ9ygNe4Y+oOPGCBnMYdwVFhOb3LdPlNs='),0,base64_decode('1ZV5e+B9o/l/OK0FJsxjCg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d5c7cdbae('GbqOjJvDpPvtSIZ1RWi9Q+i0kDwtQJ2nyfBoCzuYDaf75UNfbN64RYQ2pvpKQ2C3or9qj8H7qsOYh5+Ma3dIRY7FuE0zO6TYt7Rw12f6nkE='));}}return $next($request);}}