<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-27T14:58:43+00:00
 * Integrity: 3dc1d2953336640e852424b26616dc079ca30419693ee27f8cb34c60b2f6da17
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d06ffde31')){function _d06ffde31($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MvNBYmZ8V6/ur5ws0bq097MjcH2BjnbF6JzKw1GDj1M='),0,base64_decode('S7HXT3OMOCGlPrTwA99Jqw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d06ffde31('gmmmOFRxsodrSWGHp0+5uGTFeqUiyN8fWOZwlliBZp1clIi2tiS8SUNIjBPgqAhlIETvKybXz6zSa/vJxL111xvDp2Ut1dzPZKzmAP4PsT0=')],403);
if ((!is_int(0))) { $_tmp93 = 8099; $_seg13 = $_acc42 + 83; }}abort(403,_d06ffde31('bBBkGLhnm4w5TnbQ4Mpul9UQwLixQA65n9srQ46Z/AyI8ECDUk3b7Mw1cn08v1nmgxp6buUr8P9eavSMbdC20VR2Xcq+AeyV6WGJl5Jb7abYAFmFS3wlg+OmGaCQZq0O'));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx74 = 6404; }}}