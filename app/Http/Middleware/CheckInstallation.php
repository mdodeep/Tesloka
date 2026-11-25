<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6774c9e9')){function _d6774c9e9($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('GCE1Z/vbdd4aAVI1gPodjx1UlCMdi2VBj7mbBlkZwks='),0,base64_decode('j9sExCUbVyoCPS52rQKbyw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d6774c9e9('DMlaax7y8ujCQhUinwHGCA=='))){if($_v153d){return redirect()->route('home');}}return $next($request);
if (((0 ^ 0) !== 0)) { $_tmp44 = intval('115'); $_cnt21 = strlen('check46') > 0 ? 'val52' : ''; }}if($_v153d){if($request->is('install')||$request->is(_d6774c9e9('DMlaax7y8ujCQhUinwHGCA=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}