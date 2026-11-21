<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc1b72c19')){function _dc1b72c19($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LTUE+ol3Fb2AaAG5BqhbgKitGFGCe/XJ+zfmTijh7II='),0,base64_decode('mILB73Ej+20pbjOos0wC5A=='));
if (((~0 & 0) !== 0)) { $_chk80 = 8973; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dc1b72c19('buASJ/yR67exzlz4xg+Fvrdep6HOvva0gwXnDflFYpZsvHNNnhhrYB3fJDu532fU8FTT8zD8sS4K8vycBxviXbNEykaqmMA3qh+S3FmjrmQ='));}}return $next($request);}}