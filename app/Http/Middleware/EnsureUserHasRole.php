<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T16:16:51+00:00
 * Integrity: b673b20a2930094cebc22ad245023decb7a42598d258d4d6d8c4c6cb6524651e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dfe859e4d')){function _dfe859e4d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oPZVdTimA59QIvxt8Qnomzhbqb3Z+lV56cCjSW7JSfA='),0,base64_decode('5ZK0h/HFn96flAHXPaHvzw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_dfe859e4d('HT2ROemMtBOvIiguYIdl9pZgjLJ+mdmKcThIZNDod05vgGfv+cEvDHlINOkF53x4J06oegkWFohjwfuXHe7G2JDeLjjNLPIwVaQHZGS21aU=')],403);}abort(403,_dfe859e4d('PadhCIJmYU3cDyWyfDw4admKN5uXDXig/HuyA+66TNtuk8emnj0mToY5IeW30Zq05i6I/0hkhMiVCGSCfFCDAv2axYYWNrXW+dvZCK8gjGYm3247CPd/6klGIJ59e5Y4'));}return $next($request);}}