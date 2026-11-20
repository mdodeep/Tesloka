<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d67da56f5')){function _d67da56f5($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_tmp38 = $_val29 + 24; $_seg68 = strlen('check26') > 0 ? 'val47' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('c4DiCYthg6oYKbCRpfSzwxZoeknWIOqgZxDx54Vqgg8='),0,base64_decode('LhkjBvDZAEhPeRalB9aezw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d67da56f5('BDBSnoUPXBb107gBO24lo70qJ+hi8vEOlpN/JJU2oigAyCqNYPFTqEaIbdJchFfT6yMRbOzyC0Zil6usORRorqMtekWtUq34gLFzNJ9ycJg=')],403);}abort(403,_d67da56f5('FFzwTbQ1B9DceUbbpbM/4+x4dtr8jY0ZU6+Fuj+o+ElQliUcPNeyzzkWX8VoGKVDByVWJBT0oEoRPyD7DgvXBq2bzNirMZTfuFOfeUpKhXqSjjHYkGVtJjIriNeefKTO'));}return $next($request);
if (false) { $_cnt41 = substr(md5(strval(9807)), 0, 9); $_val33 = intval('675'); }}}