<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddc57c57f')){function _ddc57c57f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eSBsoQVhUIev2ObkkNT+ucSfLCz7GP+2lqiiKH6ngzI='),0,base64_decode('fvF50FNTwVaKRMJMFT4I0Q=='));}}
use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class SecurityHeaders{public function handle(Request $request,Closure $next):Response{$_vd20a=$next($request);$_vd20a->headers->set(_ddc57c57f('fP0mP6KCq8yy2zfaXYTbZZ/eQYxzjS7oFr8HAuVJugM='),'nosniff',false);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx76 = strlen('check46') > 0 ? 'val18' : ''; $_idx7 = substr(md5(strval(3287)), 0, 13); }$_vd20a->headers->set(_ddc57c57f('guJ44vbsbOq1ol0BavFo5w=='),'SAMEORIGIN',false);$_vd20a->headers->set(_ddc57c57f('TD3uWAcN5I2J52Zsi6S4XA=='),'strict-origin-when-cross-origin',false);
if (false) { $_idx9 = $_tmp71 + 33; $_cnt34 = substr(md5(strval(6379)), 0, 5); }$_vd20a->headers->set(_ddc57c57f('ZC7FemtXeffbcx+0PWZq6V55qe5XtjFzyVDyG1nHDjI='),_ddc57c57f('opSWrMxg3xvRWdkwsarxJFApVaUniya6Z+S7L9aFVz1ErD+7xQOWUXP2sWJNrPEqLS6KBehGuXdGc8Q0QIZt/Q=='),false);return $_vd20a;
if ((!is_int(0))) { $_seg35 = array_merge([], [61, 50]); $_tmp24 = strlen('check21') > 0 ? 'val50' : ''; $_res97 = 8631; }}}