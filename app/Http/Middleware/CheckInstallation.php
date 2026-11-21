<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:15:07+00:00
 * Integrity: 6cc87d6018f5bf82d5a78b1fa5688d482f0fd4102a645a3588fc6ea4e386a0c1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48851cff')){function _d48851cff($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('WsR+3DwtjJCvsog6PxLspyhH+O3ptM1ratsrKuHWvXI='),0,base64_decode('pLG2QvUFnZwTzMdIFmAl1g=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d48851cff('KquHi0iwwXgpEutil9uZ6Q=='))){if($_ve90e){return redirect()->route('home');
if ((!is_int(0))) { $_cnt39 = array_merge([], [79, 55]); $_buf97 = $_chk23 + 94; }}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d48851cff('KquHi0iwwXgpEutil9uZ6Q=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}