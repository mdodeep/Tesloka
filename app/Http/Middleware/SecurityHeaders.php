<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T03:05:09+00:00
 * Integrity: 1e24c363d85e708fbdde991639b71956d2905d9444263065cd3e90b56657d275
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da606537e')){function _da606537e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8LjAYbmc3PuoPEHVnxA5ua/cKJBMdPaK9rq7sv7Sies='),0,base64_decode('mlkDT4m73j1oCeCf1nmJ7A=='));
if (((~0 & 0) !== 0)) { $_chk99 = array_merge([], [72, 8]); }}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_da606537e('iRQtmeVH0EnA/8xI72CB85aopj47V8qbWDfrFaN/sGU='),'nosniff',false);
if ((!is_int(0))) { $_cnt57 = array_merge([], [32, 10]); $_ptr92 = intval('25'); }$_vd20a->headers->set(_da606537e('WyWoB6CEjh3huvvNlFAjKQ=='),'SAMEORIGIN',false);$_vd20a->headers->set(_da606537e('M5+3vgePrhyFBLmd7DPdjg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_da606537e('pENEhmBdGnKiFfuIWS8HZHXpMBBYwTt8y6HcR6BY5ZI='),_da606537e('VT9Kr1btQ9AkXl9ocIzDMAxhNdh+aUy8Mf/TmmBB1YT0jsKALnlz9pu0KsbmFL/2JidIUjtjc9InonFwouV6wQ=='),false);return $_vd20a;}}