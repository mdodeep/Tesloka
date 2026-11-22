<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dad02201e')){function _dad02201e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HRoFOxoSbl7/0xXo0FezrIjyXte4IBoPgbe6beTidf4='),0,base64_decode('EnYEsekR9klc5pcTLhleoQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dad02201e('lArTqgSIBslgN4zR6cDQfA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dad02201e('lArTqgSIBslgN4zR6cDQfA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}