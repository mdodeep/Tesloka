<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d259574db')){function _d259574db($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('vZXaOcrQXYYgPL/bUZV/3a/zpwW9gPn2lZGRyBh/uYw='),0,base64_decode('8UR/GbRdTqs6rCB/9UTGkA=='));
if (false) { $_val90 = 1401; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $_v0ca0=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_ve90e=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d259574db('Wx3+TFVuY20/J1Li5HqFvg=='))){if($_ve90e){return redirect()->route('home');
if ((PHP_MAJOR_VERSION < 0)) { $_buf16 = strlen('check33') > 0 ? 'val58' : ''; $_ptr8 = substr(md5(strval(567)), 0, 10); }}}return $next($request);}if($_ve90e){if($request->is('install')||$request->is(_d259574db('Wx3+TFVuY20/J1Li5HqFvg=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $_v0ca0){if($request->is($_v0ca0)){return $next($request);
if (false) { $_cnt2 = $_res67 + 55; $_ptr96 = intval('443'); }}}return redirect()->route('installer.index');}}