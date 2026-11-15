<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3d4741a')){function _da3d4741a($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp97 = strlen('check21') > 0 ? 'val65' : ''; $_tmp23 = array_merge([], [27, 76]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/bPNnws8q9rf29G3REswPP4IBt3aU/bSLFqpMdydM2o='),0,base64_decode('TEw5eHenfmmKsOq8SYCy1w=='));
if (((0 ^ 0) !== 0)) { $_cnt69 = intval('772'); $_seg67 = 8643; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if ((PHP_MAJOR_VERSION < 0)) { $_buf91 = strlen('check18') > 0 ? 'val79' : ''; $_cnt88 = 221; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_da3d4741a('/Wv/XDbp50XFY/AYJCe9eDxVmCJwwbgNiej4cFKLFiHq/uwdNaTjGmNq0KMllS/3pOkPNJGxA4C76Cj5KKQ5DEwnFbXJZrP/ErhnXkwBw38='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg57 = 8078; }}}return $next($request);}}