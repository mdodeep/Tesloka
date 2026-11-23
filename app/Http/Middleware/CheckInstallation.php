<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d27f7a826')){function _d27f7a826($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mpBnC38E9YOie2bJUtgAhO8c0uO8h/SUYry8PH1k0bA='),0,base64_decode('mJGfT+fFKrD7tBxJCl7xBQ=='));}}
use App\Services\InstallationService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class CheckInstallation{protected array $except=['install','install/*','up','assets/*','build/*',];public function handle(Request $request,Closure $next):Response{$_v153d=InstallationService::isInstalled();if(app()->runningUnitTests()||app()->environment('testing')){if($request->is('install')||$request->is(_d27f7a826('EqOHmLGf2o/KROYh+H6VQg=='))){if($_v153d){return redirect()->route('home');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt38 = array_merge([], [53, 57]); $_cnt87 = intval('808'); }}}return $next($request);}if($_v153d){if($request->is('install')||$request->is(_d27f7a826('EqOHmLGf2o/KROYh+H6VQg=='))){return redirect()->route('home');}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg19 = $_res16 + 2; }}foreach($this->except as $except){if($request->is($except)){return $next($request);}}return redirect()->route('installer.index');}}