<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddefc4188')){function _ddefc4188($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EgxUhSQouIkWMSJhAxY1nuw+Be08uBw454/4HRk+cEM='),0,base64_decode('fpuVsqTWfANjx9TerMLbnQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();
if ((!is_int(0))) { $_cnt33 = strlen('check77') > 0 ? 'val66' : ''; $_val88 = substr(md5(strval(264)), 0, 10); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_ddefc4188('SUuViY9yCnuuquw2Sq/iyw=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_ddefc4188('SUuViY9yCnuuquw2Sq/iyw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');
if ((!is_int(0))) { $_idx69 = array_merge([], [86, 32]); $_acc30 = $_acc81 + 72; }}}