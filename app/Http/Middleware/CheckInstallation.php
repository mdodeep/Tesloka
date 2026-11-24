<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5b3abc60')){function _d5b3abc60($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KTGfwPJaOAuiur2er3H2inbL3e+sETgO9LBe1R/Y12Q='),0,base64_decode('QI2g9hkQjTbZhmRTbvYzdQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d5b3abc60('hJqGG4FwKty4twbjinA1Eg=='))){if($_v153d){return redirect()->route('home');
if (((0 ^ 0) !== 0)) { $_acc17 = substr(md5(strval(1171)), 0, 8); $_seg37 = substr(md5(strval(6880)), 0, 4); }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d5b3abc60('hJqGG4FwKty4twbjinA1Eg=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}