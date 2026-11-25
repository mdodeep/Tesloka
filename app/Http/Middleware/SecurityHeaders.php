<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d68e097d6')){function _d68e097d6($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('V0zpTU3SQCCAonnTcbQbvDRqaq9nwNmDxt/TFz4vYPk='),0,base64_decode('e7Kpg0iKqjMQxKcuBHlSxg=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d68e097d6('PBuMtGrGkZtXlpW1yQJUwXz5yCL143LR90cR809wdNw='),'nosniff',false);
if (((0 ^ 0) !== 0)) { $_idx88 = intval('20'); $_chk81 = array_merge([], [67, 11]); $_cnt44 = 4437; }$_vd20a->headers->set(_d68e097d6('b8c4ZIDmPcHFZEu18PO4Kw=='),'SAMEORIGIN',false);
if (false) { $_val26 = 8771; $_tmp36 = 9209; $_tmp85 = intval('26'); }$_vd20a->headers->set(_d68e097d6('Bz2xNuB8Kelh7NJUMXjBBg=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d68e097d6('Tb7DsmYS4BnDHiax+3xsr6eqXOJbcgxjt/nf9f47qCY='),_d68e097d6('CDMLK3yeMn6Vaq575C1oVrG7cI25hFpVwnqerKx045ySOWYlnus+x+tUC0fStD3QF8ka6AWAZrJxEU6jjqOn+A=='),false);return $_vd20a;}}