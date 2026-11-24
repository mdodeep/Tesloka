<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T02:29:33+00:00
 * Integrity: 43fdf86efbfbbb1116c9caf705672898348bcddc1b8947fa1b458ec37cb62b52
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d99434493')){function _d99434493($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr38 = array_merge([], [72, 26]); $_val25 = array_merge([], [98, 42]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('r7NyYMEKfW8C2wSZLLnhup/+3hOTixxyCZ1UejFLFRA='),0,base64_decode('V+ajS+kRYeK1WMZwKJWm5g=='));
if (((0 ^ 0) !== 0)) { $_ptr27 = array_merge([], [97, 47]); }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d99434493('BSFzlTXJycFMhPyeOhsrqA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d99434493('BSFzlTXJycFMhPyeOhsrqA=='))){return redirect()->route('home');}return $next($request);
if (((0 ^ 0) !== 0)) { $_ptr45 = intval('449'); $_seg21 = substr(md5(strval(5469)), 0, 14); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}