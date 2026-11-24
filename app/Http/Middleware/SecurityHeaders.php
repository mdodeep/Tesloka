<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5dbaad44')){function _d5dbaad44($s){static $c=[];
if (false) { $_seg75 = array_merge([], [53, 72]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('erItNPYQlSfmuuo351BhyuXOvEpnhldj1lM59/+iDfU='),0,base64_decode('nyGo+MosF5pVvtciAga1Ng=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);
if (false) { $_cnt15 = $_seg54 + 43; $_val77 = array_merge([], [89, 37]); $_seg15 = 3165; }$_vd20a->headers->set(_d5dbaad44('GNrA6pbKgHgndlagjdP5bmzy/T41b3G8RVXYNf1vAp0='),'nosniff',false);$_vd20a->headers->set(_d5dbaad44('rieYWfNeol7hizVQxb+gOQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d5dbaad44('zQa4Svh0cm4eYZXmp9E6Sw=='),'strict-origin-when-cross-origin',false);
if ((!is_int(0))) { $_res71 = strlen('check29') > 0 ? 'val31' : ''; }$_vd20a->headers->set(_d5dbaad44('/gWDKIt7wmGBlOUAFim4zRmEVB5ElnANMCC92kEcU80='),_d5dbaad44('OzycqMkRcOv5eIxrkGpJkUfvm8ITzQPMekTwJqm5zFkvXgmhmWuHE27KQ1Pp+XdeEe7NkvZc0aAIMobq8fzagQ=='),false);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf28 = array_merge([], [89, 17]); $_val74 = 5977; $_chk24 = 7331; }return $_vd20a;
if (false) { $_tmp78 = 7102; $_tmp32 = 165; }}}