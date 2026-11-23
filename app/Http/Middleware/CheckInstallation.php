<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d29038646')){function _d29038646($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3M/7Gm4ukotAWMilBVeHPpG2FOzqgxcIgcstdT862HM='),0,base64_decode('kMauXvf6s94He4PTPzJ/Zg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d29038646('MCILcEK+R169GJJe8Am+rA=='))){if($_v153d){return redirect()->route('home');
if (((~0 & 0) !== 0)) { $_val92 = substr(md5(strval(8226)), 0, 10); $_ptr6 = substr(md5(strval(1665)), 0, 16); $_acc46 = array_merge([], [19, 79]); }}}return $next($request);
if ((!is_int(0))) { $_seg80 = $_tmp87 + 3; $_val41 = intval('976'); }}if($_v153d){if($request->is('install')||$request->is(_d29038646('MCILcEK+R169GJJe8Am+rA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}