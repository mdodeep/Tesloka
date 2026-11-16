<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T05:39:17+00:00
 * Integrity: 33665508b4ec9a26290e522f48c3ed0f715601104515c80adb5c5f76034527de
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da3fe2766')){function _da3fe2766($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('SvpEF+kn8o46rv6IPlnvWqZWGmNOMATqpHjEXSAE6I0='),0,base64_decode('c2RPsTtjK64E5TTywHa3YQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_da3fe2766('1Nvejb4abqRxRPEt01wcT+Xdhx2C6DHDebQ+8KydRQdtLjou4lQ4DBOcrr9tmJ4C/k7kFbRNi2+4ODKqOOyZXI/x8qmxnKD+RmcgYl3pyrc=')],403);}abort(403,_da3fe2766('OcicS0Jjai3O69Gtm4dEZ1KafNYtkQ0vHRHrUp6BZNgRL07e8eHTCU/NjPfLvfzsDQu5IKarLHbrbyqFQqlkSjTWyC6deLZ02tFqGgvDqu2I1PT4+JPrlC6yLciUqPZ9'));}return $next($request);
if ((!is_int(0))) { $_chk85 = array_merge([], [73, 77]); }}}