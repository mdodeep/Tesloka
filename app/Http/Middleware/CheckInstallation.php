<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d193f3d8f')){function _d193f3d8f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5BUUN2lFtrBIj7V+Ms3Pbj/sNFnLPneJymKelAbd2bY='),0,base64_decode('iFxfgt45+obkc4uPL1NmWQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc12 = strlen('check98') > 0 ? 'val91' : ''; $_res90 = array_merge([], [3, 8]); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d193f3d8f('m7LEY13f2L1BcXjodV5aCg=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d193f3d8f('m7LEY13f2L1BcXjodV5aCg=='))){return redirect()->route('home');
if (false) { $_chk92 = substr(md5(strval(4336)), 0, 7); $_val6 = $_tmp27 + 82; }}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx99 = $_ptr46 + 49; }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');
if ((PHP_MAJOR_VERSION < 0)) { $_chk87 = $_res72 + 76; $_acc63 = intval('149'); $_cnt57 = $_val93 + 35; }}}