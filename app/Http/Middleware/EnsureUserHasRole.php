<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T02:38:09+00:00
 * Integrity: bc7f5b3c74d51b63901f4967a2adc5558fd3cec333bf300f09ffd1de449a27e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc887d458')){function _dc887d458($s){static $c=[];
if ((!is_int(0))) { $_val43 = 9546; $_seg77 = substr(md5(strval(1445)), 0, 16); $_res12 = strlen('check6') > 0 ? 'val89' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('qlN+50oMZT6BY6O3SpkH6x2+Dnmk2k9KSBNX12u4F9Q='),0,base64_decode('wjqjOlLrB4inxrx+S6Da/g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dc887d458('M1blQ6RVFSafFiL4JnmJRcHsQBQ1PMmHR2MNEKcRg9OX6BzoJNvXtlwled0KtvG/NnhSAkv59jqI5d2k+wvP+w9I1EiGR1jvNW7hrFBFv4w=')],403);}abort(403,_dc887d458('1LakX0kQzRYiCr0NEw2HUvy2/dJSeaRhvKpzx3VjnnNX5U1RzCy/ZF4wTlpcP0phDyqFD5o/+i5d+VApMck7ubz5FlkWj+UihBmED1i71JAmKn30twWejBPKBClJncqi'));}return $next($request);
if ((!is_int(0))) { $_ptr81 = intval('966'); $_res55 = substr(md5(strval(5833)), 0, 10); }}}