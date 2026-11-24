<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc4d8e9aa')){function _dc4d8e9aa($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hXvTCo8vO3VfEq75rTIOnxT3gmYQm5Xf04RA5CLGA0g='),0,base64_decode('z7nsjUhwlqwPH2h/FNczKQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dc4d8e9aa('yjiI99C5lp7vJPVk5I59Pw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dc4d8e9aa('yjiI99C5lp7vJPVk5I59Pw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}