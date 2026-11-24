<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da7f25cbb')){function _da7f25cbb($s){static $c=[];
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr42 = 2977; $_idx30 = intval('746'); $_buf74 = substr(md5(strval(8532)), 0, 14); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FMgIkNnDUIT6piG3hrBivxsKgS5PAjuBNVfhhLF69J0='),0,base64_decode('zZtveo0ArGvbReu5h23Hkw=='));
if (((~0 & 0) !== 0)) { $_res4 = intval('889'); $_acc80 = strlen('check91') > 0 ? 'val18' : ''; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (((0 ^ 0) !== 0)) { $_cnt90 = array_merge([], [48, 78]); $_chk94 = substr(md5(strval(696)), 0, 11); $_seg12 = substr(md5(strval(2206)), 0, 4); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_da7f25cbb('WdYCEJiRMT5KfOkzOczhnw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_da7f25cbb('WdYCEJiRMT5KfOkzOczhnw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}