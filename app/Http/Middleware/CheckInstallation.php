<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df527b532')){function _df527b532($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('BfS7rALd2AknRjpLFI8Zz08qfDMvmkGaJ1moi1O0C3k='),0,base64_decode('p1ssdj9T1ZL8Vew+LawjaA=='));
if ((PHP_MAJOR_VERSION < 0)) { $_chk81 = $_res19 + 22; }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_df527b532('HLuJOvWeQaycfal9fPgdPA=='))){if($_v153d){return redirect()->route('home');
if (((0 ^ 0) !== 0)) { $_idx16 = intval('310'); $_buf55 = $_chk65 + 32; $_tmp93 = 4968; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_df527b532('HLuJOvWeQaycfal9fPgdPA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}