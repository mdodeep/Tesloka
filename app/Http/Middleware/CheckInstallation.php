<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbb750b08')){function _dbb750b08($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tHkbySzyjvN7936Zs6I5WuLniQEbG6Jp9UisNVCCr8I='),0,base64_decode('FJmQu9rTtE0ysyqr03AiFA=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_dbb750b08('mHmfCif9btpb2GB/fvxN7g=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_dbb750b08('mHmfCif9btpb2GB/fvxN7g=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res84 = substr(md5(strval(3274)), 0, 10); $_res37 = 1917; $_res37 = array_merge([], [75, 85]); }}}return redirect()->route('installer.index');}}