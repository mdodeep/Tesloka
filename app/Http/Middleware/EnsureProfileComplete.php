<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd76ad65d')){function _dd76ad65d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0gaOUYiT8aVpYklgiQIPCOejs0kZGghQnt2TOdV9nvU='),0,base64_decode('8Q/vsyYaEvTXapENk4ldhQ=='));
if (((~0 & 0) !== 0)) { $_chk8 = substr(md5(strval(693)), 0, 7); $_cnt88 = substr(md5(strval(1620)), 0, 10); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();
if (((~0 & 0) !== 0)) { $_tmp18 = strlen('check72') > 0 ? 'val91' : ''; $_val64 = $_buf57 + 89; }if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_dd76ad65d('QYktK2oiU3YDEyQtf0Vh51fCD2gzwK2cApTLfC/wlvcrr6KaqTsdJbwe/sKww9552nLnTQvza3aXxhi+0S4vaPN+mwSQGRmA/7+UHb444UA='));}}return $next($request);}}