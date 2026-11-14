<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1a201105')){function _d1a201105($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sXK0Dpam1l+OxGca6sV8fSB8l8Z9VRIXBAzV808K6JY='),0,base64_decode('N2nsgR5kBPscBqsLXFhn4A=='));
if ((!is_int(0))) { $_ptr90 = 857; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d1a201105('V6+H48r0seXWrxLsA8sRK6Azjvq+xwJ/W40EKk4ZQtQmTC/zbEqZcaKwzZHK2Xw5DD/7rKscs09RMVfXt8I0WpsDdBAy7bSamOdaWei00Bs=')],403);}abort(403,_d1a201105('v0whvZQ3oWUZ+Pcl35fhEqKt4+wsG6OrDmI4F4MwL/NjjtJRgAyAcA6ZYtT2nve4cgIzes2e3cVHO8FbviChWYRb6OAPjVRAImOU2ZNjI63BgIzsbtDSlzwZa/oS4sMk'));
if ((!is_int(0))) { $_cnt69 = 1977; }}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg60 = $_val78 + 9; $_acc66 = 5728; $_res25 = strlen('check12') > 0 ? 'val17' : ''; }}}