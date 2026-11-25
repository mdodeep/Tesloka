<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T03:46:06+00:00
 * Integrity: 69b98c86e8d708190ec7678d1b73bc2ecd4b70cd054ffeb1223678ae90de05f0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_ddebbbe4b')){function _ddebbbe4b($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('M4y+cboCFIayjfpXiSxQcTtPoC9TBcpYHJnJHi30pLk='),0,base64_decode('0Z4PRzqgG360iMk8LtlR6Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_ddebbbe4b('sdKgIrWfcmnSVE2bFpAuuFZii2kye5jjcxXRt7LL09e6mVxhfcQsJL6/ZYmw11jAIdMjo86IyEcAr392lC+dUcA/xBcgT6x+I3EGMnbU6Ww=')],403);}abort(403,_ddebbbe4b('cKFZjuUtF+mXrn2YLY7VBqqJQN5ipxYvRLRZiXwD09wiNnpIfsDoky8g/nyTPCB2SiOjwLRgvc3s/jN0jVK1NbYc6W+3e8TFUs8g/WetCJft3sE+CWriRI4RHbWfOP57'));}return $next($request);}}