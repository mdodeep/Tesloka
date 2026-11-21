<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:32:20+00:00
 * Integrity: 478a70a0514ca4b030cf683c5df8b15a4375318e1e3ca01055d8d807b786e642
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d23e6d9ed')){function _d23e6d9ed($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1saHDTcZBmIiym0wmJXQ8Di8CS4qOiU6iRmOL0Kxyh0='),0,base64_decode('hcKepQ4yfaxdsu/K4rR+4g=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d23e6d9ed('mkf3gO+ZokRPFN2BjPxV3g=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res84 = 8601; $_idx90 = intval('364'); }}if($_v153d){if($request->is('install')||$request->is(_d23e6d9ed('mkf3gO+ZokRPFN2BjPxV3g=='))){return redirect()->route('home');
if ((PHP_MAJOR_VERSION < 0)) { $_res54 = array_merge([], [44, 21]); $_res51 = strlen('check80') > 0 ? 'val0' : ''; }}return $next($request);
if (false) { $_val22 = substr(md5(strval(121)), 0, 14); $_tmp69 = substr(md5(strval(829)), 0, 6); }}foreach($this->except as $except){if($request->is($except)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_seg0 = strlen('check90') > 0 ? 'val39' : ''; $_idx17 = $_tmp49 + 60; $_tmp8 = array_merge([], [75, 87]); }}}return redirect()->route('installer.index');
if (((~0 & 0) !== 0)) { $_chk46 = $_idx37 + 4; $_cnt15 = 3993; $_buf20 = 6707; }}}