<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db40fe394')){function _db40fe394($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eHi0NIJHelR93MKJvSxpFn0bnJ/Siku+aMBFWWWF8fo='),0,base64_decode('EfQ7HJK8jaRdnDkI4QrdHg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_db40fe394('+j9xtPYvSCH8oglVVywomwgPl6grZtvIg1mZg9qMqzfmVotkCPjACS/XMW7Q+7Z6nWRNqFvMpfTTqOo7d53RC6DYBhOhDzoZZWwotljoLbE=')],403);}abort(403,_db40fe394('YEXF0h5aMfHhCwM/W7Eo1wlMXsW9vP+2Ns2eeTWiQ4UuZFEtLtKpmYo4FAK4pX2KHeQUMqeh+QpQX4yqw5m8hYHTJL9kOdf1pJPo9Mpkn7cGvGttW/beqHT6kood8rke'));}return $next($request);}}