<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd8b8b0b0')){function _dd8b8b0b0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sJqtJfQMMCTKrjxUna7P0fRQ/G4DJFTp3hc7seHirRM='),0,base64_decode('WjK+B2yKCijPDt2HC3NRjw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dd8b8b0b0('Zi3PLWWmQJCi/7WC4lFxixIxVui6Mgag5nB+Al6Y+2HjGCTaa4Eszg1ja6QWIpUKFnohvZNfOn4lwf+ySpK/BWtT6X33T04ZpaBiVcRZDYM=')],403);}abort(403,_dd8b8b0b0('k7/RMian4CD04ShswTdHx928jaGNliP0wmmZHYCN3X3fpc6mXSkQPo+UEG8n0oZD3LUI9z9wOi+2IDpdts/avDyUmW+SkxyWjDVtdfOmBjC3P5zGURq5CopWYNrYhkoW'));}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_ptr91 = substr(md5(strval(1702)), 0, 10); }}}