<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T07:59:36+00:00
 * Integrity: 74cfb1c25712ae88dea77b8ced4b20e6d077872b406f2c9f7a388b25212eef21
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d5b9199fb')){function _d5b9199fb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('maMHLWdIvsDQarDAEtDcz8fb9IQBpsqr4d8PpQX8ezo='),0,base64_decode('qcV+GywUeHaw2TwJaFZh+w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d5b9199fb('OhU3HSnrtMYbAUTDTOmq7NYNCEDff8XqkbAw7OQOvwpV8T5uHVs069hfLVtLlnBc4mgy1hvW8orZMBFibZvZ0ivbD+C4G5I/drvh7oD/gPM=')],403);}abort(403,_d5b9199fb('3HvC/bALfaBuiIEow7bq3Dk9V0UIi6sCs5gL5vfHDAP4Vn0wnI5yQWJx/BRmCcrdDfJIUn/K+dz6/tqhTB6Xk2ziSVL5AfCRp0TXFavFpHzMq2P/vgxbEILorbvX8zqX'));}return $next($request);}}