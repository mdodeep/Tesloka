<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d87faf573')){function _d87faf573($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_idx5 = array_merge([], [31, 7]); $_chk28 = intval('162'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('d87tyEQAQK2KtIYnMcW1/7ERCKhuYUZ97doLQdj57iI='),0,base64_decode('IUM+NudocHrsyeTezH/xWg=='));
if (((~0 & 0) !== 0)) { $_tmp71 = array_merge([], [15, 84]); $_chk79 = strlen('check23') > 0 ? 'val59' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d87faf573('e3gQSAMB9ifP6k9GMYEggD3e5jkJYjoYsaNRPKbKv3r9cICI+3L8coAy6UUpX0rjRwv5NjSOuJ+JQy5AphdSLUIDE9GLOBxJtmNblNHRIyc=')],403);}abort(403,_d87faf573('k3r1+tdbbNauiloLzfG5IG4emQPjO0rzlN0eAyyS9nEdax5bSMNlCSXn830fOdqLZR1ywusYwHQaeOxMBtEZJUIeK1H9WUBe3sH3ZmU387AwyB2iH1XMmCTYzf1yxyVR'));
if (((~0 & 0) !== 0)) { $_seg36 = substr(md5(strval(6228)), 0, 4); }}return $next($request);}}