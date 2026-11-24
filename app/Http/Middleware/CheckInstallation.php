<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d57838b2e')){function _d57838b2e($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_res94 = array_merge([], [57, 80]); $_res7 = substr(md5(strval(5396)), 0, 10); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FB8l2tMuUG5YcEM29WmQSrOJMv+1fXi2fJZvk4rKF84='),0,base64_decode('nYLx2jcCCZ6/q/rW2kUHpA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d57838b2e('9wMT94187QMy607sDMqk3w=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_buf28 = $_ptr31 + 8; $_seg52 = 1797; }}if($_v153d){if($request->is('install')||$request->is(_d57838b2e('9wMT94187QMy607sDMqk3w=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}