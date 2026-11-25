<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T04:11:59+00:00
 * Integrity: 7690f1e7540315beac41f13c216f5d848301a24c92c0faff9be9ed433c6f1790
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dadc0a412')){function _dadc0a412($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('T7crjG5MltC8zpVHPbwAnPw3KqVTwc7AAZtWHYet968='),0,base64_decode('I2zdxR60ajO56piHMgEtjA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dadc0a412('mW4HYNqjRqotxTQi56UT+QdWZhlwvzcx5sV1Q9n7mI8xyZiI3TABLYUVANZTABVmILy1V+CUYF/v2PM6Fi1DcJGS4Z/CARvxNfM71WcPP0Q=')],403);}abort(403,_dadc0a412('1kRKG/3H369AfDC7pIJcJK5wmwF95FWwfY1yCCcxlYiDjqm9LET9m6QeZQ0RcVpGpUsfkQSVMys86D+c4vvdnZEGwFa1IvMmJ1HpOHWUGQ6F9O2JEBxjUPP8Q7donKWH'));}return $next($request);}}