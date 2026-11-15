<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d93f97a15')){function _d93f97a15($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('6q75FT403k65NUurtmlOofsqRJcyqqNwF/9kvM1CKZc='),0,base64_decode('YpmijbTpyLXvUVhBIF8eUg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d93f97a15('upWvJLFrhDUR/N48a1qFU/sKgxqCY2xwsCuxJgCnN+0=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d93f97a15('gMTm0JcGavF56yv79hnDESeMNm12dJMXf9x2lRQW2hNPn9n6kILCKnVt2yNPLdSz5oVzh3QiUGFxh/1gsXCL13m8ZlkeKmVR1OWGB0rjW3y7QK3qNJh6yNG4FVTMZ2bP')],403);}abort(403,_d93f97a15('gMTm0JcGavF56yv79hnDESeMNm12dJMXf9x2lRQW2hNPn9n6kILCKnVt2yNPLdSz5oVzh3QiUGFxh/1gsXCL13m8ZlkeKmVR1OWGB0rjW3y7QK3qNJh6yNG4FVTMZ2bP'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d93f97a15('gMTm0JcGavF56yv79hnDEdKStnIDkRFzo/TTfOhSSHXiYIUzlwqUdmAwiGLrUYAvV0FKwDtP6zZthERTLjAbYA==')],403);}abort(403,_d93f97a15('gMTm0JcGavF56yv79hnDEdKStnIDkRFzo/TTfOhSSHXiYIUzlwqUdmAwiGLrUYAvV0FKwDtP6zZthERTLjAbYA=='));}return $next($request);}}