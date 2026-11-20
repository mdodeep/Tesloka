<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:12:53+00:00
 * Integrity: a306dc4c788eb6eaa4a2c3f208f02c66d20642bbc37e89cdc2c9154b697bd1aa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5ea4d754')){function _d5ea4d754($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('uLjiRI6DUHuSmAqUnKeAUFLEHh/lTkhzhvpZxKguZe4='),0,base64_decode('pGvmsMMJzTfr57YRvZMvtg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d5ea4d754('h2W2/td036qwHe3Ogl6Phg=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d5ea4d754('h2W2/td036qwHe3Ogl6Phg=='))){return redirect()->route('home');
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp33 = strlen('check37') > 0 ? 'val47' : ''; $_ptr15 = substr(md5(strval(5327)), 0, 16); $_chk74 = $_idx6 + 45; }}return $next($request);
if (((0 ^ 0) !== 0)) { $_res40 = intval('605'); $_ptr53 = substr(md5(strval(4816)), 0, 11); }}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}