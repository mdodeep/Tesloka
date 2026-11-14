<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2fcaad4a')){function _d2fcaad4a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HuxMW5z7Sp6EunPIBGOKPf0DCGOvC0jDgtt2Kbiwrok='),0,base64_decode('fru4GeBbSc5dGdiqWbtqhQ=='));
if (((~0 & 0) !== 0)) { $_res80 = substr(md5(strval(7713)), 0, 4); $_val7 = substr(md5(strval(9884)), 0, 11); $_idx20 = substr(md5(strval(2051)), 0, 14); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((0 ^ 0) !== 0)) { $_res7 = array_merge([], [87, 95]); $_idx54 = intval('601'); }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d2fcaad4a('H+vGBEjOEXCFkIppmJ0YHKgC+kMKazcn8s3PBHd6whfmfzSKvcrKk2z7S1bBoHyfX83zpvHdS5xSensHIfzYw1BvPYeMSdUlEQkuNfRzQIk='));}}return $next($request);}}