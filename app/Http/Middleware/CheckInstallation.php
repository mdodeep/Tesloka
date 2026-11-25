<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T00:24:14+00:00
 * Integrity: 5da5c6cca66823dfedddb1121822d4c09c3848265e65b0832f452de0e4642672
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d01f45fcb')){function _d01f45fcb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ptLc86G1D/e7IaLlzmr1xem72/jmEEAqtdaaFfId7qE='),0,base64_decode('bEsutHH9REHgBbe10Iatog=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();
if (((~0 & 0) !== 0)) { $_cnt83 = intval('579'); $_tmp36 = intval('698'); }if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d01f45fcb('KGx6OE3Q3YCmZl3b6gK2kg=='))){if($_v153d){return redirect()->route('home');
if ((!is_int(0))) { $_chk37 = 8213; $_seg21 = 6926; $_chk25 = 7783; }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d01f45fcb('KGx6OE3Q3YCmZl3b6gK2kg=='))){return redirect()->route('home');}return $next($request);
if (false) { $_chk56 = $_idx0 + 12; $_tmp45 = substr(md5(strval(9616)), 0, 16); $_buf99 = array_merge([], [33, 49]); }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}