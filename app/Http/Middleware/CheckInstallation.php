<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:03:23+00:00
 * Integrity: bb5e2d4dc002ca16e352f94dec9ff1b22a235be0f9eaf548fb64c7f0cb8d46b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dde9528a0')){function _dde9528a0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Wjk1TYg3tw2tQyu861eQ3CU4k8vbCkMn+K6t973i1FA='),0,base64_decode('3RMm/AED3DYy0gdsJR5GUw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx7 = strlen('check22') > 0 ? 'val32' : ''; $_acc80 = substr(md5(strval(4986)), 0, 6); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dde9528a0('KKVOw/6XOmr/Bwd3IFyEsQ=='))){if($_v153d){return redirect()->route('home');
if ((!is_int(0))) { $_seg1 = strlen('check75') > 0 ? 'val74' : ''; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dde9528a0('KKVOw/6XOmr/Bwd3IFyEsQ=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (((~0 & 0) !== 0)) { $_buf75 = $_chk16 + 91; }}}