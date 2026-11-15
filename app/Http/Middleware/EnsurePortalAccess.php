<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T14:38:35+00:00
 * Integrity: 8fb32f9c498b75637e4210b82223abef44c55b561a70cd4ce9a36aab7d49c102
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_de1ce4f5f')){function _de1ce4f5f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XDQFMXQ+Zjt5ZSwexSbv4KOWNgPc5XLfsvbrQew/YLQ='),0,base64_decode('IMtw0j2+uuaCe93o1h368A=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_de1ce4f5f('a+wSc2IPw60drFVCIhCWPvtYmVG+DWQYM5VVJTtVu88=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((0 ^ 0) !== 0)) { $_ptr53 = substr(md5(strval(3593)), 0, 15); }}$_v7e58=Auth::guard($_vefbd)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp79 = strlen('check74') > 0 ? 'val58' : ''; $_res89 = $_val68 + 2; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_de1ce4f5f('7aip1LBZngoJdsoREb5kDD0mZY2gM1qudJTXQJpdhKal3KLWzeIN3w1Tx//Jt1Ry1J1R3xvppRPOvxfLCcv7Q2rkiGJONiQ5+jiz5NoK1ul/7mQfNnVERPM6Z1ClOpYE')],403);}abort(403,_de1ce4f5f('7aip1LBZngoJdsoREb5kDD0mZY2gM1qudJTXQJpdhKal3KLWzeIN3w1Tx//Jt1Ry1J1R3xvppRPOvxfLCcv7Q2rkiGJONiQ5+jiz5NoK1ul/7mQfNnVERPM6Z1ClOpYE'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_de1ce4f5f('7aip1LBZngoJdsoREb5kDIVouSpNkD6mxyVuLsa5iTe6pwW2JnZ0dm3rMNVMVH7z5P9pdY80lOVx15EG/iYxmg==')],403);}abort(403,_de1ce4f5f('7aip1LBZngoJdsoREb5kDIVouSpNkD6mxyVuLsa5iTe6pwW2JnZ0dm3rMNVMVH7z5P9pdY80lOVx15EG/iYxmg=='));
if (((0 ^ 0) !== 0)) { $_acc86 = strlen('check21') > 0 ? 'val85' : ''; $_seg25 = strlen('check40') > 0 ? 'val54' : ''; }}return $next($request);}}