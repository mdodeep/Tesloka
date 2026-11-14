<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T00:14:22+00:00
 * Integrity: cba49dac84e23e46259554721a02318f0fec97670fbdd18307dcaddb2439029b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d55afd6d8')){function _d55afd6d8($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wasPw+WZCJlJJVe/fjd3HGjVGDOWP6IG9Ulo3uQ6uBk='),0,base64_decode('7TDjfhadI7GLDK0hl6dKAA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d55afd6d8('39rrlmN2brrE/nJS1Gm5drefcbLmUkj+4NkdEMH1Gfw=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if ((PHP_MAJOR_VERSION < 0)) { $_tmp66 = intval('902'); $_cnt40 = intval('907'); }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d55afd6d8('P9IZ35cPwKfE0rynq5AgQe6hLMOL58u1ybzL+PSr9JIfXDKrc7Z8HALKsSFNzF847ClQ8gBqu7ETwJ3MlPy5w5LR9CeyBzsVvQ0JRs+uKe0eDdMBBN/uXEVOa7EzN+D0')],403);}abort(403,_d55afd6d8('P9IZ35cPwKfE0rynq5AgQe6hLMOL58u1ybzL+PSr9JIfXDKrc7Z8HALKsSFNzF847ClQ8gBqu7ETwJ3MlPy5w5LR9CeyBzsVvQ0JRs+uKe0eDdMBBN/uXEVOa7EzN+D0'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d55afd6d8('P9IZ35cPwKfE0rynq5AgQQ3NREsOqMZLyZbuvMARRqxVIltR5Xo5RBxV7XW0t1SE47RolLCjNle86mKupIqSPA==')],403);}abort(403,_d55afd6d8('P9IZ35cPwKfE0rynq5AgQQ3NREsOqMZLyZbuvMARRqxVIltR5Xo5RBxV7XW0t1SE47RolLCjNle86mKupIqSPA=='));}return $next($request);
if ((!is_int(0))) { $_idx3 = intval('646'); $_val41 = 3362; $_val94 = 2017; }}}