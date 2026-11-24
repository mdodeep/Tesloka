<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1fb84887')){function _d1fb84887($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_val54 = intval('830'); $_acc13 = 9111; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('P7B9SbuHVKINHFrcVxJG6GdpJOGDxiZWcqS2/45cffU='),0,base64_decode('RUZDk+mM0JTHOvOXJKZ0oQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val72 = substr(md5(strval(9548)), 0, 15); }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (((~0 & 0) !== 0)) { $_seg93 = strlen('check49') > 0 ? 'val89' : ''; $_idx42 = array_merge([], [26, 17]); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d1fb84887('04KnuH+P18D/Zd7V1C8/dA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d1fb84887('04KnuH+P18D/Zd7V1C8/dA=='))){return redirect()->route('home');}return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr10 = substr(md5(strval(7752)), 0, 8); $_buf55 = substr(md5(strval(8782)), 0, 4); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg2 = $_chk95 + 28; }}}