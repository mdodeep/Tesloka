<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T23:08:28+00:00
 * Integrity: 5c94317afd2613abd4cac910af081de6044c3184fbb4b7b29ec81b4dba5e2cee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5c4ece5b')){function _d5c4ece5b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cnUQhWjn7Aph93kDfQjrai8kwQxSXuSS/JYxag1mnME='),0,base64_decode('zz2PmlbU249YtU9BxAgA3w=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d5c4ece5b('jnz95pqQ0m8JJzQ9oPy5Ow=='))){if($_v153d){return redirect()->route('home');
if ((PHP_MAJOR_VERSION < 0)) { $_acc36 = substr(md5(strval(9140)), 0, 12); $_idx85 = 7497; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d5c4ece5b('jnz95pqQ0m8JJzQ9oPy5Ow=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}