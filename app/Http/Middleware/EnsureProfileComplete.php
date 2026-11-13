<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d86515d08')){function _d86515d08($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aiDB+dtZxSEwO9L8aIlzrl30Abj04W2NX9Yazg4GbGw='),0,base64_decode('OLe4ZyjM4K727VJuBo1YSw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d86515d08('d9ZHaWvH8wq6R8L2s4A4gAwNMzjUeHKXfbRx1d+INiURwZklwLzq95IAjSaU3MNWSAhndTpA1/eYOVvV29PQ6fCjISbthTA3I1fACAXsruo='));}}return $next($request);}}