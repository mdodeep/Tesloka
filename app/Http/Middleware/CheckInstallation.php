<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6fea8737')){function _d6fea8737($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_buf2 = 8095; $_chk38 = $_ptr85 + 88; $_idx76 = $_tmp27 + 58; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y1sMss05oLxeMa2DLt29aoj29Nu6leEqttPvpD+HHc4='),0,base64_decode('ZaALaFDW4PLp2YfepoOI5g=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg86 = intval('83'); $_ptr98 = intval('643'); $_buf53 = substr(md5(strval(668)), 0, 7); }if(app()->environment('testing')){if($request->is('install')||$request->is(_d6fea8737('iepektdHboO9RX9CJcIrQw=='))){if($_ve90e){return redirect()->route('home');
if ((PHP_MAJOR_VERSION < 0)) { $_seg36 = 2719; $_chk83 = intval('920'); $_ptr81 = strlen('check36') > 0 ? 'val43' : ''; }}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d6fea8737('iepektdHboO9RX9CJcIrQw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);
if (false) { $_cnt96 = substr(md5(strval(1217)), 0, 7); $_chk74 = $_chk27 + 76; }}}return redirect()->route('installer.index');
if (((PHP_INT_SIZE * 0) !== 0)) { $_res81 = 9166; $_acc16 = array_merge([], [5, 83]); }}}