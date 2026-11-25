<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:01:47+00:00
 * Integrity: f88df7d65adc1d8f0a18cd81bd0b15f0b7e9b62ece981f525d8fefa11912f0bf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2ab34407')){function _d2ab34407($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('E0cwEIUlWM6WTdQP4EXFc3OaiEZgBN+KywON8jemCf8='),0,base64_decode('S8S2rPs/NBrPucxR5De7ng=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_d2ab34407('IzU4I9PwMTs0cc6R2GZPg0ZBB969RbGWfA4QNGuq29U='),'nosniff',false);$_vd20a->headers->set(_d2ab34407('hKHtzsCy3bpttJTcvXasIg=='),'SAMEORIGIN',false);$_vd20a->headers->set(_d2ab34407('3JAcWwVWYZ9Nn8tgq2mkig=='),'strict-origin-when-cross-origin',false);$_vd20a->headers->set(_d2ab34407('5wObn57imQj/jo1fJ0q6T25V98sxyn7nG/WkviyLRQE='),_d2ab34407('B6YFbkky+lLZqhk/U6vsn/49V23oa6u4nZJNekLt63RdE602WtmXimoylbKLMEDOT76NMjIfnLvf77RgAK7x7g=='),false);return $_vd20a;}}