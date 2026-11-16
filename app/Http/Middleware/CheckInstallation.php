<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbf549699')){function _dbf549699($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('q9+DUxQ6w2oXi2mjBTcycOVAPKjT1a74m0Rm2HUGa0M='),0,base64_decode('Elb1fyuZqR7Y3CEL10uJoQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_ptr95 = 5124; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dbf549699('OE6Ohpq4H8xkMsWjMsIBaQ=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);
if (((0 ^ 0) !== 0)) { $_chk43 = 2219; }}if($_ve90e){if($request->is('install')||$request->is(_dbf549699('OE6Ohpq4H8xkMsWjMsIBaQ=='))){return redirect()->route('home');
if (false) { $_val48 = array_merge([], [25, 17]); $_val38 = intval('12'); }}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}