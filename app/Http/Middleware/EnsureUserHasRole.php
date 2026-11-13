<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T10:25:08+00:00
 * Integrity: 355d438183c4270a99efdc1299cd916b84883368582d9ba9e9ce8f086bd847f4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dce642c1f')){function _dce642c1f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('LrH2MiRYmJO2PqdNBmVCv3/2CcFmVH6wOm4cALkaCpQ='),0,base64_decode('53B3rbhWFEypqrfyepbpmg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dce642c1f('RP7Tga2p5sbqkTl1eMG+qLjtnLEWqvpPC5VUlAI8BiWt+kFOaJC4o8TzlOHWAbey2CsNTUJp347wAxuSQUk0MaEbaq6lAeetnvUXSW0bcQs=')],403);}abort(403,_dce642c1f('IOxEHd6CFhHbHuLQZwBYQ4qNss68d5lLITAUdxCx1YY3mCjo8Q7hD7L5aHgr48n6QvXd3iVjasRqgjBWCCgEIuU+krMEbi7e9gL9caM4EGra9Jqb9BHbIO0t8+YPkx2E'));}return $next($request);}}