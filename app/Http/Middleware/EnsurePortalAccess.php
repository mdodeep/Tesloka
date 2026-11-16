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
if(!function_exists(__NAMESPACE__.'\_d523beb85')){function _d523beb85($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oAd0KfGuHglEjekAvRrA77+K9z+fMBaPrMUUUyQpyD0='),0,base64_decode('DohIMcOZlN7dqH/7xeR3sQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((0 ^ 0) !== 0)) { $_tmp81 = strlen('check0') > 0 ? 'val15' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d523beb85('fQD6PkjEqAt5iAQZRJYfi9Y4jYPyH4NeL8K8JIBmhD4=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d523beb85('JpB3kmp6Zrh49DsCTK2JKKtC2i+2Ja5PRPjLdKiSR0ITIJLTbqDl/bInvq6JA8hjHzlA6bBu7zBsGm3v/lEXvMqfVsOG1CqPzVAkvyg+tJYqUXjbJOamzehZbdU2It7n')],403);}abort(403,_d523beb85('JpB3kmp6Zrh49DsCTK2JKKtC2i+2Ja5PRPjLdKiSR0ITIJLTbqDl/bInvq6JA8hjHzlA6bBu7zBsGm3v/lEXvMqfVsOG1CqPzVAkvyg+tJYqUXjbJOamzehZbdU2It7n'));
if (((0 ^ 0) !== 0)) { $_val13 = 4500; $_val99 = $_acc0 + 38; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d523beb85('JpB3kmp6Zrh49DsCTK2JKOl4RDQgPxmC5AKaXl6YsiPTvnAzOxN7UWNQvrpfNXimGspqsvfPdbPj/Cz9ODhfUg==')],403);
if (((~0 & 0) !== 0)) { $_ptr11 = intval('990'); $_res32 = substr(md5(strval(1301)), 0, 15); }}abort(403,_d523beb85('JpB3kmp6Zrh49DsCTK2JKOl4RDQgPxmC5AKaXl6YsiPTvnAzOxN7UWNQvrpfNXimGspqsvfPdbPj/Cz9ODhfUg=='));}return $next($request);}}