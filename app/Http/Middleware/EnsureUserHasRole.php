<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T17:19:42+00:00
 * Integrity: ce5546e3b06a0b51173f929af6400b66496593d860eae83b4b01ecf9fcf73e14
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df3ebce8f')){function _df3ebce8f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('w8lQdU5qaAToa/dq4+EyRkdS7a2MRedivkTSkteJMrY='),0,base64_decode('lJ7co2khMdB4SpLN25AnAQ=='));
if ((PHP_MAJOR_VERSION < 0)) { $_buf2 = substr(md5(strval(5491)), 0, 11); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((!is_int(0))) { $_seg18 = strlen('check59') > 0 ? 'val83' : ''; $_acc16 = 3892; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_df3ebce8f('NwR0KXTInaXfRnwVbAm+l1yPPRxJqpYvIBxvomZeu0FJ2/PM6oGYd9ISReuc2Do7pmr7qVTWrw0EdVTs3aeMzrEm2ls+hJmIPuHHAlQCgck=')],403);}abort(403,_df3ebce8f('Is8UImXjuJnYtyLid+1zrkXcR0nxTxA+nmo8lwt5IEGbIZQWsO3eGpaSm1D4DBNlc+FsNoGUTt3tHfDOvAYoHgEJEhqTp8sW0hhQQDeFYIlUjnuNSC2as0q07rH1p/6b'));}return $next($request);}}