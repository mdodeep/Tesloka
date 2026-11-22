<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0e482ee1')){function _d0e482ee1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OFz7CUh33QKMsHz/bV7r9h/H6uNZOPc3bguiE2tFUVA='),0,base64_decode('IMZGQXeqtp/+4EyxolqPPQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d0e482ee1('5Qc4sYinIYtCng+L3ukrpg=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d0e482ee1('5Qc4sYinIYtCng+L3ukrpg=='))){return redirect()->route('home');}return $next($request);
if (false) { $_acc67 = $_acc83 + 13; $_chk75 = substr(md5(strval(6510)), 0, 11); $_cnt0 = array_merge([], [41, 19]); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx11 = 6691; }}}