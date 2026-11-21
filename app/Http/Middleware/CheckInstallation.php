<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbe366216')){function _dbe366216($s){static $c=[];
if (((~0 & 0) !== 0)) { $_chk62 = 2060; $_idx13 = array_merge([], [3, 14]); $_tmp72 = array_merge([], [0, 77]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cFKbNwHxe0r8zaOuotsWI9URBUJAlH90J+7YpwRNItM='),0,base64_decode('aCOnOxAjaF8nE2WEtNz05w=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf58 = strlen('check76') > 0 ? 'val27' : ''; $_buf6 = $_buf35 + 59; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dbe366216('fuE3Ki1aaIP3ygK1yam7zg=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (false) { $_seg17 = array_merge([], [30, 15]); }}if($_v153d){if($request->is('install')||$request->is(_dbe366216('fuE3Ki1aaIP3ygK1yam7zg=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}