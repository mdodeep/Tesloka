<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d14352b20')){function _d14352b20($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Y5ZjSiW0zhUS/IzZroJk9fPasokVrWDZCCCDMoszx3Y='),0,base64_decode('3BeBKV34gjDhlROkvk4VlQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp44 = substr(md5(strval(752)), 0, 11); $_chk30 = $_idx38 + 64; }}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d14352b20('DRG9O2G6zcv1YbThUd5gFIKcbcs+BRCBn99NbBL1zxI='),'nosniff',false);$_vd20a->headers->set(_d14352b20('akoFF+3aYz1la4cYK5B9Xg=='),'SAMEORIGIN',false);
if ((PHP_MAJOR_VERSION < 0)) { $_val30 = substr(md5(strval(7)), 0, 14); }$_vd20a->headers->set(_d14352b20('5hxOaOZKo5f1b0GvporvxQ=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d14352b20('j2v9LDI4tf33iVZE4ZIdsfnm4RICcoH+epZ+Q2EYjZI='),_d14352b20('idyQ98p2ZSN7DMX4Rts2v/rRU/ec2rGkDOFtzkDMJ83z+myfDhu+GzqN5gHSZaHyePohO9wFnRYtoLWnVsLRXw=='),false);return $_vd20a;
if (((0 ^ 0) !== 0)) { $_res64 = array_merge([], [59, 3]); $_acc6 = $_cnt29 + 93; $_seg78 = intval('729'); }}}