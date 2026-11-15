<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:46:01+00:00
 * Integrity: e8b7360e754ddbca48c6d0f033057497835a6312b125fdc59f0063da2ae89ad8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1179bf0b')){function _d1179bf0b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('YcmTqgXDbIzQJHQeCVNpjr9aNhCiSjTsQ9NwqZICDkU='),0,base64_decode('KAPPh5eV1qo1HndTMe+OXg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1179bf0b('RcwRbrY/jVr9m6/6UaO4jExJfzp4ueqdZSHvg0PC8zUObxUeT2/5kNt+IxHC1FaHMzSKdTw9tMKXgCaiZD2Z4iiiz5CapjTLv67T4PqCo7Y='));}}return $next($request);}}