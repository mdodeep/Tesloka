<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1808331e')){function _d1808331e($s){static $c=[];
if (false) { $_acc93 = $_acc24 + 83; $_seg74 = array_merge([], [99, 54]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oqthwZvAhKiwkBBpZzlaZV981vZlOdKYMBl0LXNELlc='),0,base64_decode('RnCw4CB1hFqZasezutyBYg=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d1808331e('BqBbT3EeOFM+1mdBpRyLruwNi3upBnACfmbt7Fac8u8='),'nosniff',false);
if (false) { $_buf56 = 5409; }$_vd20a->headers->set(_d1808331e('oRk0HrYmE1AN6z94XKpv1A=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d1808331e('3SW+vyC4I+WMx4VeTiK6xw=='),'strict-origin-when-cross-origin',false);
if (false) { $_res88 = array_merge([], [13, 2]); $_val41 = 3631; }$_vd20a->headers->set(_d1808331e('qwQgqHEKfbZQXuF7FcKf0MeP3onHY92WBISic5DHe48='),_d1808331e('J9hwTVFyGEg3Kgn3BmJIxl3ZJDCMiKC6T8K8heH0aYD4F02CyqXgo7+clprz+UdvBOg0KTR9SdPw9+5hPeurDA=='),false);return $_vd20a;}}