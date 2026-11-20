<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d00ee2d93')){function _d00ee2d93($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt23 = intval('653'); $_idx11 = 4150; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zq9tpciTmRCPh11xEvRXMzrOKR0LOJ4i2EKd49lPi7I='),0,base64_decode('oxlQceueNMvqHod+Cu/1EQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d00ee2d93('TXgEXjteOiIur1wV4voz7Q=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);
if ((!is_int(0))) { $_acc79 = 7988; }}if($_ve90e){if($request->is('install')||$request->is(_d00ee2d93('TXgEXjteOiIur1wV4voz7Q=='))){return redirect()->route('home');
if (((~0 & 0) !== 0)) { $_val11 = substr(md5(strval(868)), 0, 11); $_seg81 = strlen('check36') > 0 ? 'val40' : ''; }}return $next($request);
if (((~0 & 0) !== 0)) { $_ptr68 = 2109; }}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);
if (((0 ^ 0) !== 0)) { $_tmp15 = array_merge([], [82, 90]); $_res36 = $_tmp75 + 51; $_acc53 = intval('730'); }}}return redirect()->route('installer.index');
if (((0 ^ 0) !== 0)) { $_ptr51 = array_merge([], [55, 64]); $_val63 = substr(md5(strval(5082)), 0, 5); $_ptr88 = strlen('check55') > 0 ? 'val58' : ''; }}}