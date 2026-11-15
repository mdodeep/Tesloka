<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:50:48+00:00
 * Integrity: da2d8e8e7eb35502158592fc7f4fb96f0713033f54d4fc850a96d2de053c79e8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d48ab1dfb')){function _d48ab1dfb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('adeEoPVO/878eai5G75UxIRTnDLUiTCF7X70FV+x7mQ='),0,base64_decode('0uGktBQ3eSd6xkM+K847kA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d48ab1dfb('7HGmmwMVr7GPBD85I2/zjDFi42ljjUlMvoMrHb87yDn3++6E25UAAIFf+M0FejREYnSCe1Liti8TVAh1P/DmgsJrzuGZW2kY/yUawPLnxOg=')],403);}abort(403,_d48ab1dfb('smDQuLrVF3FJ8tux+4blLmVyUfp1YCpgANSoCRIOUDXWHOuvbLSTdiDJWSE6dhsgFAsR+U49dhek+VhST33N++eD32bwz3MAbcuywEfKEa0n+EWVzLCSO21tJS6NDbqP'));
if (false) { $_buf92 = substr(md5(strval(2925)), 0, 13); $_chk60 = 8127; $_buf39 = strlen('check44') > 0 ? 'val4' : ''; }}return $next($request);}}