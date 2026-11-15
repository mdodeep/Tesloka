<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9ccecbb0')){function _d9ccecbb0($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_acc62 = 6829; $_res99 = intval('772'); $_idx6 = $_acc33 + 33; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('HCvGFXzmQwtbSDRf1+xiOW/Js6YQ48M9JXW+BUH3mwQ='),0,base64_decode('Pd5xDt3NJ+5xQkynJD4V3g=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9ccecbb0('nWKPhVqS1okH+pyqa6Ie6Tcxqd7bGoLvsbwEXQJxSTF2cDEbWD5QvDaJTm/4ZFqwx0Kz3raVEp+nk8+zT8KuCJXjtity8EloJ9Z9UgAMntQ=')],403);}abort(403,_d9ccecbb0('rHfMNJS2RNC2tOHGs8iPfcanEGWIws0tzW2R0ycFq5mIDx0betswebWnH98HqB3dCdZ2Jx4qqrN7OCC9CXUumVPpdTAH9O8OM4y+gSncsaYZASzKlQM0aadApXZROSgC'));}return $next($request);
if (false) { $_idx78 = 9457; }}}