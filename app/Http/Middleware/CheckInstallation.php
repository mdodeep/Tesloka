<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8193e822')){function _d8193e822($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hJy4P+j0RoWXb9n6F9Fn6HTBCdpX5qga9B9p7byrvgc='),0,base64_decode('ehtMN9yINY4glnxU8QsuOA=='));
if ((!is_int(0))) { $_cnt14 = intval('44'); $_tmp96 = $_ptr95 + 54; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d8193e822('0hSRyEgPqpe4A7WRa/k5pw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d8193e822('0hSRyEgPqpe4A7WRa/k5pw=='))){return redirect()->route('home');
if (((~0 & 0) !== 0)) { $_buf89 = $_res89 + 73; $_ptr48 = 9926; $_seg67 = intval('694'); }}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}