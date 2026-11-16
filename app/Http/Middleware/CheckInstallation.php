<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T16:48:11+00:00
 * Integrity: ab8dcbec4f381a73c000a540f5da45639f9c8e40ebcc1ddbc948e203c6c604db
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d06fb1967')){function _d06fb1967($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KJT0OUckJgyTNz11WKH9DFIdKYnpKwvHJneW+9i0uvU='),0,base64_decode('TGQ281kPbWnkfy130xWdaw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d06fb1967('w4yHukBIv2ArZZldypUdzw=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp2 = substr(md5(strval(8154)), 0, 10); }}if($_ve90e){if($request->is('install')||$request->is(_d06fb1967('w4yHukBIv2ArZZldypUdzw=='))){return redirect()->route('home');
if (((0 ^ 0) !== 0)) { $_val48 = array_merge([], [94, 18]); }}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');
if (((0 ^ 0) !== 0)) { $_buf98 = array_merge([], [37, 95]); }}}