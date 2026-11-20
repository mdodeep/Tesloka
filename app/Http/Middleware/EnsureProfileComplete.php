<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d084bf93b')){function _d084bf93b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ucLI1Kq0MwSepTFnocRU8j0Yevr90iPyfZ1nLXZTcq0='),0,base64_decode('nuC9YO9U+gdne9P2hhOkQA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_ptr72 = array_merge([], [56, 50]); $_res36 = strlen('check33') > 0 ? 'val28' : ''; $_tmp8 = strlen('check91') > 0 ? 'val0' : ''; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((PHP_MAJOR_VERSION < 0)) { $_idx27 = array_merge([], [91, 84]); }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d084bf93b('GHKHv1qyiqz8nNV3GDbfBO/KqvErf7yLkJ0GVPJq+vX5IAf0EArrYjOMXuKgdSxdtx2PykHD1fzv+3iiirbJuptvlBoQr/hTVk9wdt1JqWI='));}}return $next($request);}}