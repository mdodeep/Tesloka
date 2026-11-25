<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:21:26+00:00
 * Integrity: 8f90fb12585ba5433e80e954547474262d9a60cce968d861279d136af920b5bb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9022fcba')){function _d9022fcba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hol6berdloUAqilmXYSVJ3T7TvELSM1vcrGvg4mOCKg='),0,base64_decode('U1BmPhVwGbOo5LTkvHnjwA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d9022fcba('uLkYvTdttFVboKyLkzWEhQ=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d9022fcba('uLkYvTdttFVboKyLkzWEhQ=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}