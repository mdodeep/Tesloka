<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T16:55:48+00:00
 * Integrity: 40a7628a067f020e4fd2c57f4a5841387dc6e2eb74ae871d3629e6fddb576e35
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dde126916')){function _dde126916($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UM0SGZuVi1PyIFhgyfNYSLDMojaHjhg+Jib041sE2qQ='),0,base64_decode('Ea8y035xkp+QxfSHe5bsmg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dde126916('KnmmP27d1iyLf+lB9wbkhC1FTZRlOkOnP4DaFJB+JkgPFDap+NfF/5qMIOajemBKg57p4y0/JLcJAQ3EAZMG86XU74vh6Zpi3HTgKcY9hRk=')],403);}abort(403,_dde126916('CjznD8zUUH3lBgQ8vJAqMPbKHxzxj1t/rYTD/dznNetPwO3SQ+ohIoMPWxEvssehpmrlWy+TuhNAro0iKPGSH+1pvfeI7VkptS0wLY7o/n7VZNq++84QtcO425jCqBYA'));}return $next($request);}}