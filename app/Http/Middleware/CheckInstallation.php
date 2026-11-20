<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T23:50:51+00:00
 * Integrity: 69d7fbbda759854011d62cb7beb30af0765144337ca67cd655825eb5efe13bc4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df761b818')){function _df761b818($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('U9kIvt6KPCrQoYbfLxHXta/pkD6VjboBuiG09FBvhN0='),0,base64_decode('eIMPYY089qN5pTO3YrW8sw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_df761b818('n4VVq7ZsTcahE02gzEmH6Q=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_df761b818('n4VVq7ZsTcahE02gzEmH6Q=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc75 = 6271; $_cnt73 = $_idx72 + 61; }}}