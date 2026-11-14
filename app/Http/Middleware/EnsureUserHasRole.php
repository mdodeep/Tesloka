<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:47:32+00:00
 * Integrity: a598bf64f00008c783ad21f6af90c807f908ed697fcf9716f4d136daee24f76f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfafa3df7')){function _dfafa3df7($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6/SrJS2aJQeSZO67ZZmxIZbaXVL6CtAKoi6M1f/TnME='),0,base64_decode('LxA0hAhXv6R9ameCLV7E/w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dfafa3df7('c39MyfB/SGsSORdc7UjcUKpFIPcrDIV6HVgcZd49vddE8xMhi1MCXADM/imcRqRg7Vp7JSCufiy1dG2wdkv0e8XfsVcBEJasGYHTLmf5FEc=')],403);}abort(403,_dfafa3df7('/agrr8QrRP6ClqliG1n1GWufZ0xxIzBdP07JHouvxN23mQNsV+cujeIt3V/YSHAV7UPrBTjWNJNZlogA7dn0Xoy5X5ZIipCqSz+JoTRZsZdlfVD2ojDDEue5AhwXvB7A'));}return $next($request);}}