<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T00:08:20+00:00
 * Integrity: 7e97075b0c1d11d33345a82032b32d9a6731eec33cb5702f74d22d41762357b3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d3bac0f7a')){function _d3bac0f7a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('tS7OoFJaIInzZbW+r2KM88j+WJHqO8DJ8eemy4XzvdU='),0,base64_decode('7e9nj2bkljTqFGBetquMAQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d3bac0f7a('HWwFZucahiZTb0IeAzFHgGR2Uy7lwzKictH7QVilmyE2hBYOLYaVPnCgGphfrWEYPg4486jEPJ3owos2E5KzYcMTnX5fowXPsQk8O2+X/1o=')],403);}abort(403,_d3bac0f7a('iRd1aYJX7Eow7gJaAtBVoACT7SOlaO/KS3L71FiT0/95CDV7ouvTEESEbbNW1zDS1PNP47OEU6TUKv7TDHOyDN9w8OS77bAX4MSrFCdD0H6zQ3uMcLuD3RtOArbFOJA+'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg29 = intval('212'); $_buf12 = 1340; $_ptr25 = substr(md5(strval(5366)), 0, 5); }}return $next($request);}}