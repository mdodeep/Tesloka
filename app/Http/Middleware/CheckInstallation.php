<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d40a6cf3b')){function _d40a6cf3b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NRogncafzs7Q+e5ZtgxJxxzC3l2GyOTgd9UCwHEdLoQ='),0,base64_decode('1s9Q/XIIZ07Wf2Nr5goHhA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d40a6cf3b('lloiJ8VSR/vAsxHchaKX5w=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d40a6cf3b('lloiJ8VSR/vAsxHchaKX5w=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');
if ((PHP_MAJOR_VERSION < 0)) { $_seg88 = substr(md5(strval(8466)), 0, 16); $_acc8 = array_merge([], [81, 95]); $_cnt39 = substr(md5(strval(4998)), 0, 4); }}}