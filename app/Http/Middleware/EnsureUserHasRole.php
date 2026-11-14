<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:41:26+00:00
 * Integrity: daf5c66de71bc09bf0c0a2fb71b5b6723e05ef631f92f337e40f6b92ee499698
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d9d5d9bc7')){function _d9d5d9bc7($s){static $c=[];
if (false) { $_seg91 = substr(md5(strval(9363)), 0, 13); $_seg77 = 427; $_buf79 = 6310; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('7iulK1Hn7XO/LcQfxbIP9Be555AhZl6j20+t/IL9CaM='),0,base64_decode('x6XXxRNCY2G9GqjQBj2XDA=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf86 = strlen('check53') > 0 ? 'val88' : ''; $_cnt62 = 6558; $_acc15 = strlen('check52') > 0 ? 'val58' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d9d5d9bc7('xXbK/oOA8bmilc4SXHMcovmLqA8IFycaVaEsi6X0Br+p0fZqMCksUBwciy6KeCZqZpQICyUqZpie7H/HXxCgybPHucoU0WhOMCpobo8jtV0=')],403);
if ((!is_int(0))) { $_cnt63 = substr(md5(strval(3957)), 0, 6); }}abort(403,_d9d5d9bc7('zgxIyPikDBxOXzk6BcLYYawy1Qt1K418XtD3BQRydUAwQSDH5N4SPoRapkSf3bHpUlRTJ78oDyoslWX8eutvEtvZiSgqapV2jpb8LUnZYmgdB10JIXPSQ0oLeygfovUW'));}return $next($request);}}