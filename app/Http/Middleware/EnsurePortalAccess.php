<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T12:50:06+00:00
 * Integrity: 6fee3fd511e40e63d81a3969f04fe7438d544c4954970045fffff7363671dd5e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db34fddaf')){function _db34fddaf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dpGpi7gGkLQWQONiijE98oOWrt7y5ABv42J/coE2mWY='),0,base64_decode('cZRMSm63EGAdxBOnT/ZLdg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db34fddaf('mjGTTYVuCfQnF98KGg7PLQSkQSsxcWySTIHdeqAopqY=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_idx80 = 4997; $_tmp39 = strlen('check95') > 0 ? 'val48' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db34fddaf('z7uy5O+HdB1eOddaPOSfK7UY7ciSeQNYNcCV7+WhwJUvGDgoS0wuH7rSmylQKS3bNuE1Y+rgByaXQYm8zlnZzDHUHEpzhdq8w6kqs1LhiFCpjRHuTvdxQWwF2zkND3qN')],403);
if (false) { $_res55 = strlen('check6') > 0 ? 'val33' : ''; }}abort(403,_db34fddaf('z7uy5O+HdB1eOddaPOSfK7UY7ciSeQNYNcCV7+WhwJUvGDgoS0wuH7rSmylQKS3bNuE1Y+rgByaXQYm8zlnZzDHUHEpzhdq8w6kqs1LhiFCpjRHuTvdxQWwF2zkND3qN'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db34fddaf('z7uy5O+HdB1eOddaPOSfK9VtnMb4scFkpH9dN5+0gY35FXM+t86U7oEdkFwhhOwwNmbJAFgPcvjSFKST6TvMsw==')],403);}abort(403,_db34fddaf('z7uy5O+HdB1eOddaPOSfK9VtnMb4scFkpH9dN5+0gY35FXM+t86U7oEdkFwhhOwwNmbJAFgPcvjSFKST6TvMsw=='));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg28 = strlen('check34') > 0 ? 'val16' : ''; $_buf17 = intval('990'); $_ptr60 = substr(md5(strval(9145)), 0, 11); }}}