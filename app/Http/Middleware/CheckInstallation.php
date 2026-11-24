<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d489c564a')){function _d489c564a($s){static $c=[];
if (false) { $_buf80 = intval('147'); $_idx37 = array_merge([], [33, 34]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8ogMM4vDqGRkJ/f4VJFnRi8jg1iK22oYA5XuqPLK8vo='),0,base64_decode('+Sv4qO9O+chwE/b0V24oCw=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d489c564a('LvKDKSXmN5kSoQhRjXKjjw=='))){if($_v153d){return redirect()->route('home');}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d489c564a('LvKDKSXmN5kSoQhRjXKjjw=='))){return redirect()->route('home');}return $next($request);}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}