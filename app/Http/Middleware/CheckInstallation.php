<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T23:45:35+00:00
 * Integrity: 77663be56596b873b92abe6bccc47448a4f71dc1a2cd4fe86ff846550e946ec4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db2962cd1')){function _db2962cd1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('NPxxP9VRASQtY/67At5WDr6ypoNShnPZAaOzT2V338c='),0,base64_decode('z99qiav9m7narLLdXxBdug=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_db2962cd1('9zaOZ99DFp9vQF1yyxd1nA=='))){if($_v153d){return redirect()->route('home');
if ((!is_int(0))) { $_buf72 = strlen('check16') > 0 ? 'val82' : ''; $_acc57 = 6733; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_db2962cd1('9zaOZ99DFp9vQF1yyxd1nA=='))){return redirect()->route('home');}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res79 = $_buf58 + 46; $_res64 = substr(md5(strval(8300)), 0, 12); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}