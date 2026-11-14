<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T14:10:06+00:00
 * Integrity: 90830522eac3cf227eb1444b6716fee34fb1ae71e0fc3173d8b1481d1b2703a4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d16cfeacf')){function _d16cfeacf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6P/n992XhTwVvPBsbF0bJ0ySLRsPV7dautUrJHjIVAc='),0,base64_decode('8RmCHx4mYmx3yOxzmUy08Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d16cfeacf('FWnhlLcI2rqTt6qSYz1YX0NZndErJ4ZHspyLk5Bie0CB1r6dQ2ObM/3v2Rst16gHBTNDscga23M8tG/IMfa8QZe/6TvKepC/wueqtqnxkzk=')],403);}abort(403,_d16cfeacf('+yjHXJ4sW8uKdQEtcgyEL++CL/APAZdw5vJmQEB7eEGpLza6iJneQ5HW40UQlM9Aymc/9o+N/bYGwDZS+77yCCVLZ5SET0vCuP2GGVzFVxYN07GCgpUkw42B0bGqWAlX'));}return $next($request);}}