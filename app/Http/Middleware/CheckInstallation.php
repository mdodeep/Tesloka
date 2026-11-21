<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:23:12+00:00
 * Integrity: 22fe0485658e378b8e3824adbf5f2768e37e3742a2eba6ba81060bb1364b2fab
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d657e79d5')){function _d657e79d5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Nu2BRIUFgcsNY2QTe5KsNE+kiVJu3AsbhpXGe0BTzho='),0,base64_decode('PFOIflFXGGA8lDS742jQSA=='));
if ((!is_int(0))) { $_res70 = 3621; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d657e79d5('pFx+ltcuqs2KDGCkfW3Shw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d657e79d5('pFx+ltcuqs2KDGCkfW3Shw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);
if (((~0 & 0) !== 0)) { $_res75 = intval('465'); $_ptr27 = substr(md5(strval(7841)), 0, 15); $_acc1 = array_merge([], [7, 31]); }}}return redirect()->route('installer.index');}}