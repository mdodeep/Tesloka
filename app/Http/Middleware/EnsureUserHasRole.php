<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0a98ff9a')){function _d0a98ff9a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MtZ08c5D63ILqIrhX2XS/VLrIofPnLLoknCKQAwb9sg='),0,base64_decode('okoO30d8f2GYiItufzO1gg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d0a98ff9a('X6pIcSnzYkfuIn+XRsANoYcsHJeZyJqF7DwGyiEMM1S7LR5bDQ+He/f8vvqSAQuyfPZifiMAMaQ05QCa+SU4JOgAF7IkbgYkWlMTv7xxN3A=')],403);}abort(403,_d0a98ff9a('RCEw7JK59+fNL7Ub8sDZJ7qsr5J/vYgoZwNCTJDmoNoRobzWWA+2Sc0fh83sbYqVX5loxZV9G+MrwdCwvODWpV8UI0QOiMySzmqd9ovLbIhnS8LvHY8ToWXBhi/8LGdG'));}return $next($request);}}