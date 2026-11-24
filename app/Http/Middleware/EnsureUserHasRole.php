<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d99cd5939')){function _d99cd5939($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mMif8+3W8EOvtJ91usWy7CEaSB0eqTDnhetKcBRNb7E='),0,base64_decode('IHzdzCuzkReVRmCJHwkYPQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if ((PHP_MAJOR_VERSION < 0)) { $_seg37 = substr(md5(strval(741)), 0, 8); $_chk44 = 6393; $_cnt15 = substr(md5(strval(9019)), 0, 10); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d99cd5939('voP1SFJyjF9NJqqzJ+pRrJbr6nudvybrL6yvzojrL/fAH/z1zHNVaUck4iakAOa/8NdzgNyHlV84BXr7fOZEC3eHm/ZV8v154pUnsjq9ACA=')],403);
if (((0 ^ 0) !== 0)) { $_tmp67 = substr(md5(strval(1335)), 0, 14); }}abort(403,_d99cd5939('T3xCUiHmQuTaxbdKLRDW5UrPu/jLm14pLHYtNgdrMUFtDvP2J3gRw3HcD67hs+hmWVHD10h5wp+pa98N1YkSsgff/IzP9V4EjjOI2Kqa+4XahHT0m31Z1KnxpoI8NOkl'));
if (((0 ^ 0) !== 0)) { $_acc19 = substr(md5(strval(1180)), 0, 9); $_res73 = $_res42 + 20; }}return $next($request);}}