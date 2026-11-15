<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d11ebf7b5')){function _d11ebf7b5($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('D2VaUXjv+/6sSbpIiZTNM6r5n3y8s4j+PaYCtN19iYo='),0,base64_decode('yj79OmM8jQagasfHZpcZbg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d11ebf7b5('9wy/CIpqNtU4qhg98kKFAidbTgNm30OqBV61LOijrUs=')],401);
if (false) { $_tmp62 = $_tmp58 + 92; $_idx53 = substr(md5(strval(3264)), 0, 10); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((!is_int(0))) { $_cnt79 = array_merge([], [36, 91]); $_acc35 = substr(md5(strval(6920)), 0, 8); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d11ebf7b5('iKYITA3DpE6x43Zk+UOl3fYiaiSO8WBk7d/Te2NWy8nTN3k13EiycKahWdY2aXdotdmN97aAgH0k7aQAokACKb5NlVQUR7HjkrX71DKaZkDsYS/UlWi7t9b+yXIBHv6y')],403);}abort(403,_d11ebf7b5('iKYITA3DpE6x43Zk+UOl3fYiaiSO8WBk7d/Te2NWy8nTN3k13EiycKahWdY2aXdotdmN97aAgH0k7aQAokACKb5NlVQUR7HjkrX71DKaZkDsYS/UlWi7t9b+yXIBHv6y'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d11ebf7b5('iKYITA3DpE6x43Zk+UOl3YGIjk73RuNxxGTKjSzUcQt+OiBEsc56j8RyRp5Q3GWwySmATXO+nRXppLJlB4pkYg==')],403);}abort(403,_d11ebf7b5('iKYITA3DpE6x43Zk+UOl3YGIjk73RuNxxGTKjSzUcQt+OiBEsc56j8RyRp5Q3GWwySmATXO+nRXppLJlB4pkYg=='));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_res0 = 9961; $_res39 = 168; $_idx6 = intval('704'); }}}