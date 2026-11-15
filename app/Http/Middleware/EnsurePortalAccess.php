<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T03:52:06+00:00
 * Integrity: b8aabd027ec1f419dc5f633661aea2ff50061edb89673b2f38ddd91efe947ffb
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d98f14f1c')){function _d98f14f1c($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('lz9SbvLMZM5HRac4NJIKKPTH/IUCqkJqoyV8xo93Efk='),0,base64_decode('koOBMjUdxAWL4yxFcqLP9w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d98f14f1c('scjaNvKGBXXy7exsdyN1ZfLfyoNuitK0qQGdYu/LnLA=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d98f14f1c('VPjpBZuoX2p7Xvrhn9OZt/GawadPKcQl1dUD4FF26x2S82zyoaTqoBFYWVI9X1518D7/1e89h8IKft2cZcJRH0ha0xQASKtuYbGHjU8BqBrjnod3s1XhilL8UtQaA8r7')],403);}abort(403,_d98f14f1c('VPjpBZuoX2p7Xvrhn9OZt/GawadPKcQl1dUD4FF26x2S82zyoaTqoBFYWVI9X1518D7/1e89h8IKft2cZcJRH0ha0xQASKtuYbGHjU8BqBrjnod3s1XhilL8UtQaA8r7'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_res26 = array_merge([], [36, 32]); $_chk81 = strlen('check89') > 0 ? 'val64' : ''; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d98f14f1c('VPjpBZuoX2p7Xvrhn9OZtxztBppMN3oJ3slKXjMe254Ux2GYwpHnxZ1c5Kze2laF25RWaXc8XdgXwYWCi3IAaw==')],403);}abort(403,_d98f14f1c('VPjpBZuoX2p7Xvrhn9OZtxztBppMN3oJ3slKXjMe254Ux2GYwpHnxZ1c5Kze2laF25RWaXc8XdgXwYWCi3IAaw=='));}return $next($request);
if ((!is_int(0))) { $_cnt68 = strlen('check24') > 0 ? 'val3' : ''; }}}