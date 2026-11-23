<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:17:55+00:00
 * Integrity: bdeaf86c3382669bdfea6ebf51d5418a6e22948d723c091cf74131355cf40149
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd24d18ba')){function _dd24d18ba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GhI+CWH6f/6LTXR6it0uT3rjAq8uHI+0b824yrbhE0g='),0,base64_decode('grAB6M2YgVaIGpwYR12PRg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dd24d18ba('mnT2SxKM4cHogDTUc+2ozg=='))){if($_v153d){return redirect()->route('home');
if ((!is_int(0))) { $_ptr40 = array_merge([], [30, 43]); $_val26 = substr(md5(strval(1581)), 0, 15); }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dd24d18ba('mnT2SxKM4cHogDTUc+2ozg=='))){return redirect()->route('home');
if (false) { $_idx90 = array_merge([], [2, 30]); }}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}