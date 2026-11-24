<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dda863953')){function _dda863953($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_val41 = strlen('check93') > 0 ? 'val7' : ''; $_val88 = substr(md5(strval(3570)), 0, 13); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('aFTogOv9GoPVWRbRTXVusn03BAh/fgDDG9fqId6rhyM='),0,base64_decode('82lcL0fatIGmgMbb2zrelg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dda863953('YFv6tGkLdnaOf4dSKO5gEyy2TEewpIY2wm7IfGZLKPVMadPDPClBwQirDM8Ei49PBe17ZwWHdFZqQNUDoPlRKz0OrwUX7wOf+f+fe2pMUL4=')],403);}abort(403,_dda863953('UbnJ1ErMG8ZIp0mODySLBQH38uyb6iLTrv4fpt5Lee90mxI05qafb1nfCgMXeIRzPO1XRSVNgQj0qonnonoCNqm6+JSILVaClZu7ro7u+3H2px+Zf+tOOfSdRzx70s9i'));}return $next($request);}}