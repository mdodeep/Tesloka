<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc1ca1700')){function _dc1ca1700($s){static $c=[];
if (((~0 & 0) !== 0)) { $_cnt80 = array_merge([], [60, 68]); $_seg92 = array_merge([], [82, 68]); $_res25 = 9456; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ub6+xjs59Q6qUTCqxyZ8lRGd09FDVYnuzWy15b3IX8U='),0,base64_decode('nUMHrPuIbVLKJ2eKkI1IiQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dc1ca1700('jaO3RYld2NDlf2qV2bpcaw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dc1ca1700('jaO3RYld2NDlf2qV2bpcaw=='))){return redirect()->route('home');
if ((PHP_MAJOR_VERSION < 0)) { $_buf66 = array_merge([], [81, 54]); $_chk90 = substr(md5(strval(2380)), 0, 9); }}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf91 = substr(md5(strval(1189)), 0, 6); $_chk3 = substr(md5(strval(2653)), 0, 8); }}}