<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:40:07+00:00
 * Integrity: b239a7db52f17bafea0fb8b829fbb68615a5cfb91459cf3afc5ae4b62e0b43b8
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfca2c58a')){function _dfca2c58a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('X/nXrHO8wD+uQloBZeoe5F1qYEou0O2ZQxurcpbuKaw='),0,base64_decode('2IM8rlLPKI2Ghl5KVieJ+w=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_dfca2c58a('Pxy5U6QF4UmmWOJv2NnA9SmZhg1Vqa+Q+BwbirjggU0='),'nosniff',false);
if (false) { $_val59 = $_val65 + 20; }$_vd20a->headers->set(_dfca2c58a('2lnAHFnXg7FlSyF+NvO+TQ=='),'SAMEORIGIN',false);
if ((PHP_MAJOR_VERSION < 0)) { $_idx17 = substr(md5(strval(9091)), 0, 10); $_idx49 = array_merge([], [48, 14]); $_tmp35 = strlen('check99') > 0 ? 'val83' : ''; }$_vd20a->headers->set(_dfca2c58a('plDIKU/ZvLRx4KXEzZ6IIg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_dfca2c58a('8bCilhAfyB5ilF06jDQVo0HioMI/QJMPRJCK5TMs1P4='),_dfca2c58a('JH2vbd8tx6XyZN3k7GEaDW4gShmW+b7OBOypH6w5VcUvbC5skMrE+GesUtIcyAcXrQ1Uo+wIWL1nQAk1TcWHKQ=='),false);return $_vd20a;}}