<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:01:07+00:00
 * Integrity: 732d13c17bea258201492d7d488181ebc396461ab0f6b9e4f8436f39a34f93ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dafe962ee')){function _dafe962ee($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_ptr39 = intval('339'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('d2869u6UBY7q2LGaxTt42TnFghbaWkVfvwyvq0ZDKLQ='),0,base64_decode('VnuVdSZy+RLb2+Qr20L1Iw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dafe962ee('yKtWZml4W17HCPYOa5pglw=='))){if($_v153d){return redirect()->route('home');
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg83 = intval('448'); $_ptr64 = array_merge([], [78, 86]); }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dafe962ee('yKtWZml4W17HCPYOa5pglw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}