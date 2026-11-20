<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:48+00:00
 * Integrity: bc2d19b46f670e638cfa7703c51ce0f13b713389932df83ebe3e8b3858e1fabd
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbf17b6b9')){function _dbf17b6b9($s){static $c=[];
if (false) { $_cnt45 = strlen('check86') > 0 ? 'val39' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LZ9UeTOuyLCpdrDu5nXofuR+ZCVV8igZ09YKh+roWp4='),0,base64_decode('QzpD90w5gR6Vf0O1XQOcMg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();
if ((!is_int(0))) { $_idx13 = intval('213'); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dbf17b6b9('PAA1OmSn+yWQYvDCyf4x6w=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);
if (((0 ^ 0) !== 0)) { $_idx29 = 221; $_buf97 = strlen('check25') > 0 ? 'val18' : ''; }}if($_ve90e){if($request->is('install')||$request->is(_dbf17b6b9('PAA1OmSn+yWQYvDCyf4x6w=='))){return redirect()->route('home');
if (((~0 & 0) !== 0)) { $_idx95 = substr(md5(strval(2282)), 0, 4); $_seg0 = $_val57 + 62; $_tmp59 = array_merge([], [12, 14]); }}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}