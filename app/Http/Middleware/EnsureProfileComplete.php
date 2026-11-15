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
if(!function_exists(__NAMESPACE__.'\_d568ab672')){function _d568ab672($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sZDVC0csDQlSwtsDmhp+Yawyw1CNZBquVRh8wKq7R9w='),0,base64_decode('3/ACO/zRGZMcP4zRyr13ww=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d568ab672('6lvZqjIKUYt7d+7IXjrytpNKjTKsuzq44acAxUw7wyt56IWYNX3x5BTDdJhEd0MCZFVfcrJzUAFaiJiWjX83mtlER9rZfhf8fEGEIproRzQ='));}}return $next($request);}}