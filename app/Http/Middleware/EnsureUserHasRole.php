<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T21:45:01+00:00
 * Integrity: b940e2dc30758fd76afa973e85cb082e1fd61410b030bafe5189b3fcbd3e2669
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d496e5a59')){function _d496e5a59($s){static $c=[];
if (false) { $_seg90 = $_tmp65 + 52; $_cnt51 = strlen('check29') > 0 ? 'val57' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xVnMLZQbq57OdivAlsFRtZL+G694fHrUbEYMXzGM7n0='),0,base64_decode('XPKgdlyZZ96nErfbLLvTfg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((PHP_MAJOR_VERSION < 0)) { $_seg26 = strlen('check6') > 0 ? 'val18' : ''; $_idx82 = intval('228'); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d496e5a59('3emutPJyPIA73QbOIePy2D6m8UWa3FjH0wO4fMpoH/2nfBVvGToU4L4JmcFP/3sYdbnA+nkcf0eypWrTs1u+3iUSHdswbu6U+XMrhpDeC5I=')],403);}abort(403,_d496e5a59('I04WVp8lZ9eRdckF23QpXE4AD+Zo5zMPNKpNJN+d2ZlHEuXMuBibKdi4ZuIWCgenIySl2/XhBqpmAR94NdXZj8aPifnU7QZHhUvdJzDFMPp7SyfNSfQBln4HMT+XMqab'));}return $next($request);}}