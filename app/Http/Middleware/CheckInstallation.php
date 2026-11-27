<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_debc2068a')){function _debc2068a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qQRIWyVtD2KBhQc4yV6+pYTZSPFNQJPLj3qxs6OWL/g='),0,base64_decode('0GiYg8Qs3AyyBSfQXJlvrQ=='));
if (((0 ^ 0) !== 0)) { $_ptr10 = substr(md5(strval(7755)), 0, 5); $_cnt90 = intval('776'); $_seg69 = array_merge([], [88, 25]); }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_debc2068a('pGukVB4RCcULBE2w5aaXmg=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_debc2068a('pGukVB4RCcULBE2w5aaXmg=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}