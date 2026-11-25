<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d86838aeb')){function _d86838aeb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('l/GeQc/QgmF2aSdOtDeBo1BWVK2qrY2XrZsU/Rgruyw='),0,base64_decode('IvJhkVsarZ+6YBBNhUH+kA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d86838aeb('Z867uT531ktoxbmadhf4DA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d86838aeb('Z867uT531ktoxbmadhf4DA=='))){return redirect()->route('home');}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp97 = array_merge([], [95, 87]); $_acc4 = 4204; }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}