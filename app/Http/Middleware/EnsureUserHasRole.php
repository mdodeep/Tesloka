<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d555c8da9')){function _d555c8da9($s){static $c=[];
if ((!is_int(0))) { $_idx14 = strlen('check69') > 0 ? 'val89' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kz7nqnLqs1QsZS8cEF5rXPJKk591oUs+d/zHwsdVQss='),0,base64_decode('InMmCCZ0hvNI75f9KTbv9Q=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d555c8da9('76i+pUSIxyyI9/En0mV8rTf0f/rL8QffkWKmkxsOFDc+scowufc95OcP18znIfhuLhzBFmMBL7m6vFDjHHU6Hy0WkBZa9zU29ivwuSZS/J4=')],403);}abort(403,_d555c8da9('y4/kIg04h5Ut/WRstxWB+5p4yJHNOMw8sESKxPrJfS59CHHMd82rJLuX9T9Pvleq7eBCzy1DZnzUhAQ0B1nlP2/lcTAOOzFLX027fe3CE6vJv41s6KTD3TMlTGUhqQzt'));}return $next($request);}}