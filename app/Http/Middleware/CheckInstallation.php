<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbbbf21a5')){function _dbbbf21a5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/SNX6dMTc6dkRRJbdxhic5eMI0WyuTKab/5ZFpwxDl4='),0,base64_decode('Jo3Fn+R+Rr75e9uDSDlbMQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();
if (false) { $_tmp49 = array_merge([], [3, 81]); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dbbbf21a5('9jrv2JraLwDXbBWVL5ckKA=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_dbbbf21a5('9jrv2JraLwDXbBWVL5ckKA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);
if (false) { $_res67 = strlen('check50') > 0 ? 'val80' : ''; $_cnt1 = 8721; $_tmp77 = $_acc28 + 21; }}}return redirect()->route('installer.index');}}