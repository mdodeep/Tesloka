<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d95017c58')){function _d95017c58($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('VQ4tdRFVl8XkvDh9zs2m80uvNcrGJqNjAT3vEqozeT0='),0,base64_decode('nGQz33UIvkeLzOWgIkpnXA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d95017c58('93zrL50Tk7v+lBN8q5dDGQ=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d95017c58('93zrL50Tk7v+lBN8q5dDGQ=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);
if (false) { $_idx7 = array_merge([], [25, 65]); $_val19 = strlen('check33') > 0 ? 'val9' : ''; }}}return redirect()->route('installer.index');
if (false) { $_cnt74 = $_tmp48 + 10; }}}