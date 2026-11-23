<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T22:27:06+00:00
 * Integrity: ebcea66457880820c7079869e7f5d901176712a76794500d6d4f553657aea1a3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da4e50158')){function _da4e50158($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wJ70Mcm2qWLBPFsLZ8v21jMYCzrApLel9OoECd7GRLg='),0,base64_decode('7wY37FDBpKfcPAykHCqx3A=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_da4e50158('Ir6Ckvw1odxXsZ/7yoi37Q=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_da4e50158('Ir6Ckvw1odxXsZ/7yoi37Q=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}