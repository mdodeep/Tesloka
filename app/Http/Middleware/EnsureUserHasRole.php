<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:52:39+00:00
 * Integrity: 2474375cdffefca3312fed197f4d5978af35cf7ce2041d9337b6c641bbaffc53
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de823103c')){function _de823103c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cTMsSXW//vGCFqNiN1IriJ/0/nVtEPio2d2C6a3XL28='),0,base64_decode('hR9f14tQ0DBbIG03Th2YRw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((~0 & 0) !== 0)) { $_idx95 = $_buf63 + 86; $_seg67 = substr(md5(strval(8384)), 0, 11); $_tmp27 = intval('480'); }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_de823103c('2zFqZYHJp7fdbQnhyoKhkWyXmdztpuiDsJtRqVclCPOeUJ2fUmnge+gpM6GXAvhIm62ni3jFsRxkKWViKhRH6PRrDCwi576gZgBbbUJ8gbM=')],403);}abort(403,_de823103c('1SHcb9nz7xmVRxe7NnICj/b6lD2rwbhI68TtAmVGmeA4OIrg2FjDrTweUZT2f+CYf+GZ+7ByRUp1XpM2Cq37u/GRjgLOAsSBHi8egKIFJN61wp7EOMXKfd9oFDOpypYf'));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_seg61 = $_val85 + 43; }}}