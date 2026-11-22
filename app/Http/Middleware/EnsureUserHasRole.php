<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da543cccc')){function _da543cccc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Ru0kcwZeBlVDC2Qwcc8XBSDhP+4MArf4o38b2I81gzk='),0,base64_decode('Xg0WUbqgMLN4KFB1pZ4PgA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_da543cccc('fD8yXTcKS2RTUrhBN/DOKlDXbI/UvIWDUv2OHYh6SDh3KKUwGFh2GTJrVPDnsJ6SclZ4fGNxuE9c4qaZ1QBelliM7BfD9VOr8r7Ulp1vMjk=')],403);}abort(403,_da543cccc('7QYw/X8N9V04K42IR7VV57x0pXqV7mQswCTJOC6lCEWNAJO5A2eC24swzdxLfLhQ6b4z0MbFsmB9TBgZp7AqhAitfyJlP4kJlCE5O0fTVqz5MC5YucAaQ3l836YVbefK'));
if ((PHP_MAJOR_VERSION < 0)) { $_cnt39 = $_res4 + 89; $_idx24 = array_merge([], [94, 97]); $_idx27 = $_chk89 + 97; }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res84 = array_merge([], [81, 14]); $_seg86 = strlen('check35') > 0 ? 'val91' : ''; $_buf47 = $_acc10 + 55; }}}