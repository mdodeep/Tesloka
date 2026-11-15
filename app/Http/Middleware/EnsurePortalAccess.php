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
if(!function_exists(__NAMESPACE__.'\_da62e0056')){function _da62e0056($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('t/hjk5629WK2lvSc7bkv8N6yzRU83R5xPrTIkI88dwc='),0,base64_decode('UBvGLQ5LGKfFU9CMvmC4RQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da62e0056('WyjG+wboAxd73zrI/4JnKinI4+lXcofNbQKwDfA/Dd4=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_chk87 = $_idx36 + 3; $_acc31 = strlen('check75') > 0 ? 'val79' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da62e0056('YhJMldtVFnao5BoD6zvz3n9OayE/6EFe7zKY72FYyzGOAl3t9gJFDuuC2yK9s9G9xktycn5MdZI2VkR1ty91FQnXcpgA2W6V4iju2A7uvq0D22dWQOUK7JUMHsSGPlFK')],403);}abort(403,_da62e0056('YhJMldtVFnao5BoD6zvz3n9OayE/6EFe7zKY72FYyzGOAl3t9gJFDuuC2yK9s9G9xktycn5MdZI2VkR1ty91FQnXcpgA2W6V4iju2A7uvq0D22dWQOUK7JUMHsSGPlFK'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da62e0056('YhJMldtVFnao5BoD6zvz3sz2ecN4411OuqGRGnrZNzv11kb4cRG6IjZWd7UOQp8XgnwR7fRCDTDcPh5iuNR7UA==')],403);}abort(403,_da62e0056('YhJMldtVFnao5BoD6zvz3sz2ecN4411OuqGRGnrZNzv11kb4cRG6IjZWd7UOQp8XgnwR7fRCDTDcPh5iuNR7UA=='));}return $next($request);}}