<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:00:39+00:00
 * Integrity: 3bad3d4fa11dee0cfe1ada07762cbe00c63a79c37c90885345211f475742f7f8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_daacf23c9')){function _daacf23c9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Le8wUvlOiJH1CL2WS8T52fSkbRTpVhDkC3+TzS15MJs='),0,base64_decode('4/b7Zq394qfThb3FeicYng=='));
if (((0 ^ 0) !== 0)) { $_res47 = substr(md5(strval(4721)), 0, 8); $_ptr89 = $_ptr41 + 93; $_chk36 = intval('805'); }}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_daacf23c9('GZ2T+ip+7mpRy90m1PgLSQ=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_daacf23c9('GZ2T+ip+7mpRy90m1PgLSQ=='))){return redirect()->route('home');}return $next($request);
if (false) { $_val63 = strlen('check29') > 0 ? 'val74' : ''; $_ptr79 = substr(md5(strval(4301)), 0, 16); $_acc65 = substr(md5(strval(4846)), 0, 16); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}