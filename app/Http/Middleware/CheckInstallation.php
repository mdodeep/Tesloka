<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd8a8d70a')){function _dd8a8d70a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('m8oZMHx0qOLXlYKkjILTit1JTiW61gxUBDcx+khUeVQ='),0,base64_decode('Di+4yTcF+Z5BRtSnwrSBxQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if ((!is_int(0))) { $_val87 = $_val44 + 30; $_res50 = 2055; $_idx59 = intval('689'); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dd8a8d70a('8yWnw0qlJe/q9BcrXPQK2w=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (((0 ^ 0) !== 0)) { $_val58 = strlen('check34') > 0 ? 'val38' : ''; }}if($_v153d){if($request->is('install')||$request->is(_dd8a8d70a('8yWnw0qlJe/q9BcrXPQK2w=='))){return redirect()->route('home');}return $next($request);
if (((~0 & 0) !== 0)) { $_seg37 = $_cnt75 + 39; $_val12 = $_val98 + 47; }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt57 = strlen('check26') > 0 ? 'val25' : ''; $_res88 = array_merge([], [95, 12]); }}}