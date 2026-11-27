<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d66fc586b')){function _d66fc586b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5nlRKCanJJL0LCblVNEp3Ee3q5K7AQJ8oBMmLQ7ZZ4E='),0,base64_decode('uZYdJchXtEv8P32pm4VILg=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d66fc586b('H3t6FdAmPej4XhpZaTrb/A=='))){if($_v153d){return redirect()->route('home');
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf16 = intval('689'); $_chk69 = strlen('check37') > 0 ? 'val96' : ''; }}}return $next($request);
if (false) { $_tmp33 = substr(md5(strval(2590)), 0, 6); }}if($_v153d){if($request->is('install')||$request->is(_d66fc586b('H3t6FdAmPej4XhpZaTrb/A=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}