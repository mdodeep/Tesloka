<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T17:59:52+00:00
 * Integrity: 9df5056a5d0327a6d22531800b27a86c8ded9177e82f9d7bf52136d59d871c1e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d05c0cc2c')){function _d05c0cc2c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('s9FwHKAX5KJz15KGcIM7M3iFw7IWi2PDVzKAM0FpTFY='),0,base64_decode('pbXGRfs5cprkfIpFNIwV4w=='));
if ((PHP_MAJOR_VERSION < 0)) { $_acc46 = array_merge([], [1, 31]); $_tmp58 = 5761; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d05c0cc2c('1Oa5EZttaWUYd4HeZNXtjA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d05c0cc2c('1Oa5EZttaWUYd4HeZNXtjA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (false) { $_cnt28 = intval('999'); }}}