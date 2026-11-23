<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d06328403')){function _d06328403($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('96Skw1ex5kK+yDltgOeS+SmQ6beO87G22BaCL17JbzY='),0,base64_decode('OeS1/GhQoxggmu/3inek4Q=='));
if ((!is_int(0))) { $_acc26 = 6769; $_tmp61 = $_cnt68 + 33; $_ptr30 = intval('522'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d06328403('XdN2T34hl2ey4zewTY33WDcDKIOsTxPhRfshuhF5G+nDDPJfj+GNgNsQ7hvBcTjx+W3eghYFD1FdZr4SQpiJuUG6KQto/ZQE9XtqAm7IuL0=')],403);}abort(403,_d06328403('4Joc4/W6TfhGLRS+Jb8PGjXpVoSl3NCzR8/YKqoSVoStH05gveaeNE55fmeAU9Bq3/3/gk6pMD4dXyQY6vLeLoJL2tN7w7Klq7A6YchLC/oNMdBnPVo/lgAhYxQrfP+c'));}return $next($request);
if ((!is_int(0))) { $_val29 = strlen('check34') > 0 ? 'val88' : ''; }}}