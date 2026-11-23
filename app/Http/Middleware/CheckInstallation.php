<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:10:06+00:00
 * Integrity: 1eaae2e57942a726e2a50ef69fd1762e9e4022eacc69fd6ec78c3da7a2a3b9c2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3f95c746')){function _d3f95c746($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kmotVNMXyD2+LGFhfKB+sUL2Rs310tmztawmcAbH0Mc='),0,base64_decode('0/z4LhOR3GGoXYyHBxqNNQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d3f95c746('J9/8A1HqI1Ags3Ky+5diLA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d3f95c746('J9/8A1HqI1Ags3Ky+5diLA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}