<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T12:57:16+00:00
 * Integrity: 4072df7805c5df6172a812ba0abb4165715f3edd7548ec07582f07d5c2b15f76
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df06219fc')){function _df06219fc($s){static $c=[];
if (false) { $_res88 = strlen('check19') > 0 ? 'val21' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LvmFpQdXDAX0CIqDwishPCckGLyNc0F66aptjXBeF5k='),0,base64_decode('e6UqlX3DEGtSuFBa0SziEQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf14 = 211; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_df06219fc('Nd8L0YE5KmCKxZvwG/wwag=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_df06219fc('Nd8L0YE5KmCKxZvwG/wwag=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}