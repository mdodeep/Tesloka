<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d61af614d')){function _d61af614d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('30aFZ1umDb/a2EtfsnEwUTdzzt4WPG83QkOENpuB43o='),0,base64_decode('Bk3DDz82kRYBM23I7LCXow=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();
if (((~0 & 0) !== 0)) { $_idx73 = strlen('check43') > 0 ? 'val84' : ''; $_seg90 = 895; }if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d61af614d('1bWTkkbSHTQDiYK2i3UJSFGNqdmgFn5rJa0zg9TGWlG/wR+Eho9LzZM0c3GzKPZysoVSj0L9ccxB1vyokW8egAc0krg+r+69f/nJ53zwz1s=')],403);}abort(403,_d61af614d('WRWlHeCbvvij3/avaio7FmxSJ4MH7JM6GFbUbfUZdvf7MOqCbjW36JZgkJeu3AWAM6esPkcCorx7rWkR6oSTKuAkVSH/skvprxtgzj+B4FdB5vdKGy3hfgOQgXKNc1Ry'));}return $next($request);
if ((!is_int(0))) { $_idx3 = $_buf75 + 46; }}}