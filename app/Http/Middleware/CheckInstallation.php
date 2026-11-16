<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:44:39+00:00
 * Integrity: e3e930e84d69e4e551158d8bff0589806df09b46df84f244df75a1f61989a560
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0f05c21f')){function _d0f05c21f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('R5xvTByQWqYxEeEmupmboejgdLdML7twYfkE6iHjBPs='),0,base64_decode('oc38zwy3VDwFL8R0q9zsBw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->environment('testing')){if($request->is('install')||$request->is(_d0f05c21f('LTGqmFw3vfYGUh30oeqJEA=='))){if($_ve90e){return redirect()->route('home');}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d0f05c21f('LTGqmFw3vfYGUh30oeqJEA=='))){return redirect()->route('home');}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk57 = strlen('check16') > 0 ? 'val95' : ''; $_ptr26 = array_merge([], [99, 78]); $_chk91 = substr(md5(strval(9471)), 0, 4); }}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);}}return redirect()->route('installer.index');}}