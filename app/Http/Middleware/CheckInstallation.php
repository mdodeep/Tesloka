<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:50:41+00:00
 * Integrity: 64771d9a235275694c09940543fe8d77b77bec728e537f3a96b21b98180dc397
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dedeb0107')){function _dedeb0107($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx58 = substr(md5(strval(9089)), 0, 11); $_seg41 = strlen('check58') > 0 ? 'val73' : ''; $_cnt49 = substr(md5(strval(4594)), 0, 6); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('u3MrjsxPojxIp6NDFVHAivDb4oaj+tXBED2ZbLLgqXk='),0,base64_decode('dFpiK1QAG1wxCMSrH1jnew=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dedeb0107('WB0mMTEK8/2/7/GGZfsrpw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (false) { $_res50 = intval('776'); $_val54 = intval('967'); $_val21 = intval('499'); }}if($_v153d){if($request->is('install')||$request->is(_dedeb0107('WB0mMTEK8/2/7/GGZfsrpw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}