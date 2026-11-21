<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_debd52d3f')){function _debd52d3f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('EEJwFhabeyMt5oiJgQa+CvIYcecIP6nz1Gg27eiATOE='),0,base64_decode('x5D9yCtzbrB0VEGdhJxpyg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (false) { $_ptr19 = strlen('check74') > 0 ? 'val34' : ''; $_seg13 = $_acc91 + 34; $_val92 = $_ptr49 + 2; }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_debd52d3f('WaJw/Z2rf2DQxh27+Td7EQ=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (false) { $_chk64 = strlen('check74') > 0 ? 'val69' : ''; }}if($_v153d){if($request->is('install')||$request->is(_debd52d3f('WaJw/Z2rf2DQxh27+Td7EQ=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if ((!is_int(0))) { $_chk11 = strlen('check72') > 0 ? 'val20' : ''; }}}