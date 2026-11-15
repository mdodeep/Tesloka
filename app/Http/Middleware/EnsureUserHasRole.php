<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:18:26+00:00
 * Integrity: 3ddb70f39474a65d6f1e659715367dfdc86ba7125b0cb12cfc1c6446c744b981
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4e35cca3')){function _d4e35cca3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('cNp7h/uY7DObDzlJdKVu+bc2xQadOXdYxGap/cHfrlM='),0,base64_decode('YS2fWwEO0q7ehAoSy14g7A=='));
if ((PHP_MAJOR_VERSION < 0)) { $_val99 = substr(md5(strval(6598)), 0, 4); $_idx38 = intval('161'); $_tmp38 = strlen('check4') > 0 ? 'val34' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserHasRole{public function handle(Request $request,Closure $next,string...$roles):Response{$_v24c9=Auth::guard('staff')->user()??$request->user();if(!$_v24c9||!$_v24c9->hasRole($roles)){if($request->expectsJson()){return response()->json(['message'=>_d4e35cca3('Iu4v97oi8evHS7/vFRrSxcY/T4hW2YwRqXatS9Aq0jAoAyZxLtU0QOvIRO9YJmd6+dB8J1chhtBi341gpDqc945c6PO+DHo9aOryvg1zO0Y=')],403);}abort(403,_d4e35cca3('K3kyUviko5TVikciFpAEjTt7jWs/48/1AZuOhQd+9YZjoB3h2mCnbY15iWwoPdsUNCXrpyI3PvdeS/PhRqu69QSrfmjqSFsUoXNQHHZcacuiomylfDOn0o+RuE8lbeQu'));}return $next($request);
if (((0 ^ 0) !== 0)) { $_seg7 = intval('58'); }}}