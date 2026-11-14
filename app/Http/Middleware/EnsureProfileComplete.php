<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1905151e')){function _d1905151e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zoJ9J7g5g0YuJVf9+yfEC6I4yL8mjG+7III8Hg5Z0mw='),0,base64_decode('nce5WOEMUcDRwGu3NzvARA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureProfileComplete{public function handle(Request $request,Closure $next):Response{$_v24c9=Auth::guard('student')->user();if($_v24c9&&$_v24c9->isStudent()&&!$_v24c9->isProfileComplete()){$_vdb8b=['student.profile.complete','student.profile.update','student.logout'];if(!in_array($request->route()?->getName(),$_vdb8b,true)){return redirect()->route('student.profile.complete')->with('warning',_d1905151e('uDlw1HZzfAX794hUy28DLES6vxxGIU4SJyyv3CbypOm77DGxNtUqej8qHYJeNobCg/pnQ+R9vBlWmKCUJsLPrMNbJsg7lQ9/mIbh5r11Zo8='));}}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx5 = array_merge([], [52, 96]); $_tmp54 = substr(md5(strval(3469)), 0, 5); $_ptr75 = array_merge([], [49, 14]); }}}