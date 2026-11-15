<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:46:25+00:00
 * Integrity: 5dc076367dca2aca8216f163718bf09dc1ac6d174d5e80534a1715a9a20a58f6
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7a7acdbc')){function _d7a7acdbc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hflbjKOT/hxdODKNrOKhn4Kczbq8DGBDF3kD3xsP4pw='),0,base64_decode('+d6tXJ2Hb3AhhkxgsUNqUA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d7a7acdbc('qbFXe5z5qzmyfzrS5qgVVX2htWnRIeJS7smhtgvmbXhKujKitd9g2ztkrR+FFJBQx4EV05hCQmltylk0MyUDs6Luky9Gal+HfjY9yYFVeSE=')],403);}abort(403,_d7a7acdbc('BClM5WAjdKSiEYQSVh7g66H6Ovz91qOrE0qef4jHq7rIGLkEh0iOlmQILCvq43HtOKr+o4vn8Q9qM94JxxwP6icoQQvauV2AfL2urjBWeONZWulZCwSHLFDO2HdGjHuS'));}return $next($request);}}