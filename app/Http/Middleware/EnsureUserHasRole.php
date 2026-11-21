<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d285f5c92')){function _d285f5c92($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('pAf69x204X7E1SGgJ/2KAgxuMMQei6enhAyHWYwRtCs='),0,base64_decode('Y5JRDz4MRZtwNRwocq0TAw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d285f5c92('pGfZKZpx7PY5eS+JR0803LmlBnfQyl3uwNPEYNWbcmQUz0gIcoHZ8dn+fQyxzxVWG8PFDt5O+Q3mnrpfxpzuwC+3bYrkMW6pXQBqJxDl4dg=')],403);
if (false) { $_cnt78 = 2539; }}abort(403,_d285f5c92('TSRDSdslNIaLO/QVqhUs0k2MizCooyr7l/vynUkLMHR+OBWRHUvUcdhN13xvr+rsxdD3toziDZuyZbgYJVrsdi2emdN6o5qGxHaOxG5w/eIBSxEvVH4Ha1XcjWigtlBI'));}return $next($request);}}