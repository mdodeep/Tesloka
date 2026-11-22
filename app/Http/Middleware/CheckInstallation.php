<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:25:42+00:00
 * Integrity: bdf411897d6e92d2c062c00df8c8159ae397421da420a7f909e77fb6460130be
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2a71516d')){function _d2a71516d($s){static $c=[];
if (false) { $_chk7 = $_acc72 + 8; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1MGP87tehOhgoAl0am+F+QdjSTK97A90IGE0tI/VC9E='),0,base64_decode('HV4VzSE6Bnu3FOkl3TIeVA=='));
if (((0 ^ 0) !== 0)) { $_idx7 = $_res6 + 42; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d2a71516d('E5LWbauEKu0JD2RX6ak0Yg=='))){if($_v153d){return redirect()->route('home');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res15 = substr(md5(strval(5317)), 0, 15); }}}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf24 = substr(md5(strval(1166)), 0, 5); }}if($_v153d){if($request->is('install')||$request->is(_d2a71516d('E5LWbauEKu0JD2RX6ak0Yg=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}