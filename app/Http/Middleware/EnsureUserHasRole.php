<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5c1cc6bf')){function _d5c1cc6bf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lVEs1tF3aLjsK05cF/83V/6FZduJ5iE7D6RXAP/5IfE='),0,base64_decode('EE9ezZCm+/aMkxXbUsTD2A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d5c1cc6bf('6QLflTdiONxaWWh60hfEcO5WhIc7YTP8rW/iX2skMDEtAjvjI3gEyKlq3s2oILjLCvppk0MCihFySifICcYQcTmPjYoAdvmOeDF8WpgI3Rg=')],403);}abort(403,_d5c1cc6bf('LYsZDrtN2hp1T80pz392bUAWZN609wGEEYXLA0S6U4yYI6D6HuYUJ+xei0OQHsuBAXFkIyr+E803xJEaxijxSbFyVmYIzu5VkeUanotISFriXNDwRdd8BZGXP84061O6'));
if (((0 ^ 0) !== 0)) { $_res76 = substr(md5(strval(4306)), 0, 15); }}return $next($request);}}