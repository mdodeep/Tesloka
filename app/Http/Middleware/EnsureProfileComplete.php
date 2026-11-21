<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbf5d6c6d')){function _dbf5d6c6d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zfzKDXpdrEJznWBUvuuDRw89XRZE17u1x3EdnZDkCrE='),0,base64_decode('rzOKHWP5KmtAyYpXr8GEVw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr44 = intval('825'); $_idx23 = intval('498'); $_seg18 = intval('726'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_idx96 = $_idx45 + 4; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];
if ((PHP_MAJOR_VERSION < 0)) { $_cnt18 = 485; }if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dbf5d6c6d('DigXnrcvzMOjwz+x2obQICFPkRHBqGWBeavETU7ZSmqzaOryg3khk41eckoV4FF/demGIaIFz9RdWSfhoTXen91dIO3Ow70j09o1xQsxOfo='));}}return $next($request);}}