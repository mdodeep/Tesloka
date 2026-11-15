<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d40f69a05')){function _d40f69a05($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('TFqTmJa1soWNV30S8o+HYscqsPoPFKdY3T0Db/9CM58='),0,base64_decode('qywR3h7HLw9EMTh3Eu9JeQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d40f69a05('/8O/HxVpRR0m3ajPXt73qaJmdkLSbVeo0IgSjeJjr8zdFLatdnMmC6sy/nIvOkVrHuNVUcQ8j10TnizogBEdMFXGf7/wESBT5cQNmqhvFYw=')],403);}abort(403,_d40f69a05('izPn1TQ8IBJ+rrfchnRna9ImpfceCQk3IJp03My7qR0EwvQPBUtqriFMyxqTa7kdQ7O3gldtJSyXSBY2XCaBmfmJIhee7GBe9BiVOx1Do0vu0GTuuduNvpr1L4TXiuN5'));}return $next($request);}}