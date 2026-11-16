<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T06:08:59+00:00
 * Integrity: c03b6aa24b690558efc7f50ae03d2f3fdc86d599c8eee60225c90f4e06fd985b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc7d5cb5d')){function _dc7d5cb5d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('mp+AnD6x/6UisAPcU82DLyVRQ+BCwnDl/bDP7zVGhg8='),0,base64_decode('mPaKVuHkN32a3RShkDNujg=='));
if (((~0 & 0) !== 0)) { $_tmp29 = $_res95 + 89; $_chk90 = $_cnt27 + 19; $_seg38 = substr(md5(strval(555)), 0, 10); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dc7d5cb5d('e1YUG3KC56Q9GAkwfETBJYHfpW6nbYx4XGkCkL6/h00=')],401);
if (((~0 & 0) !== 0)) { $_val65 = substr(md5(strval(8069)), 0, 6); $_ptr0 = strlen('check45') > 0 ? 'val6' : ''; $_chk56 = $_res27 + 24; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dc7d5cb5d('7+BI0iXc1oAbLzfRInO3RpkTOhjmPNl4GngezJR47Idfj1qo3bwlNthOGExpfbxzBA3tAevJk/Hb/mk+YdAoCcpAxoI71RJwThOWr0/6aUgjMHa/PFbF2hHNNDMylt7Q')],403);}abort(403,_dc7d5cb5d('7+BI0iXc1oAbLzfRInO3RpkTOhjmPNl4GngezJR47Idfj1qo3bwlNthOGExpfbxzBA3tAevJk/Hb/mk+YdAoCcpAxoI71RJwThOWr0/6aUgjMHa/PFbF2hHNNDMylt7Q'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dc7d5cb5d('7+BI0iXc1oAbLzfRInO3RjrYzU6nzm0tLQAea/OYzB9k6V5ByY/qIaoieFvSUGQZHzuGYPoK0n5TI5hTucMVXA==')],403);}abort(403,_dc7d5cb5d('7+BI0iXc1oAbLzfRInO3RjrYzU6nzm0tLQAea/OYzB9k6V5ByY/qIaoieFvSUGQZHzuGYPoK0n5TI5hTucMVXA=='));}return $next($request);}}