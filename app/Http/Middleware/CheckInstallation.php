<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7a49bbe3')){function _d7a49bbe3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SnTEwprnKtK8LvdP2i730GGA7Gzmbhzm8LyRqJPh/PY='),0,base64_decode('zUhDiPgQNF4oF+X5n72PZA=='));
if (false) { $_ptr85 = $_val11 + 93; $_seg33 = strlen('check20') > 0 ? 'val83' : ''; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d7a49bbe3('8S11vQlGfLzH1vecbP4tig=='))){if($_v153d){return redirect()->route('home');
if ((!is_int(0))) { $_acc11 = 6605; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d7a49bbe3('8S11vQlGfLzH1vecbP4tig=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);
if (((0 ^ 0) !== 0)) { $_seg41 = strlen('check44') > 0 ? 'val59' : ''; $_tmp93 = strlen('check32') > 0 ? 'val96' : ''; $_ptr84 = $_seg59 + 39; }}}return redirect()->route('installer.index');}}