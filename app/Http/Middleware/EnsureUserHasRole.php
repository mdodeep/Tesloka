<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:45:28+00:00
 * Integrity: d8d50151664cd5e9171c0571737d97b823c3a8834b7a545e6b01c8ef1911e6de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8a2caf02')){function _d8a2caf02($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('jgDNO0ag+Q8vYuXewVoI+NYzETwmMTa9+8KEmH6TBGc='),0,base64_decode('VHq5QUjKzmf0Rdf4Isi5Zg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (false) { $_ptr58 = 8167; $_val39 = $_res78 + 76; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d8a2caf02('TmtUgX8wEF5jzLjok69vZw5G0Bf2SDeYCjtWIQ8nF5aQRDS/+pu03uBf53xc6tpfX0K+c59mnZgwM/7nLLsTMQ2UiC1/H17KcGo3/E7C4Ks=')],403);}abort(403,_d8a2caf02('cEFEmGUybJ2rJpTPGE3qIeMZw8N55lOx2PBPehZ56zuec1JMAyQOt42FmXzCBWCMvqyuwaMxc20nk/d7KGJ0gmhVeZWLZ71zVbHNc+WctMcn9H5ObC4QcSuacAbcRyt2'));}return $next($request);}}