<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d043244b7')){function _d043244b7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XY0Rus+KliFozNOjidHbkqk16ia8urkMWDCPznpNzcg='),0,base64_decode('7x9Nhe03mT7RpPJTrtezPA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d043244b7('dTu/EQbXyMc8Wy0ENLImmg=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d043244b7('dTu/EQbXyMc8Wy0ENLImmg=='))){return redirect()->route('home');}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp85 = strlen('check10') > 0 ? 'val24' : ''; }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}