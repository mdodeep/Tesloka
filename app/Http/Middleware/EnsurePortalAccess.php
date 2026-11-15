<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:14:13+00:00
 * Integrity: 18b57aa627fd74aee36ec4e10d76eb437cbf3e3f51cf591ed361ffcb18cf37ac
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da67d6d18')){function _da67d6d18($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('05i8xtI6emI4fjfk+l8Ijwfny6RA1M1GAKUfoOYbHKo='),0,base64_decode('5TOfuWU4k8sp6KPqIiVnnA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_da67d6d18('3p3wdb9M8f9zWvCcSELhLb7UCVnqeCMSxUnKS/pfn34=')],401);
if (((0 ^ 0) !== 0)) { $_val11 = $_ptr66 + 7; $_res24 = substr(md5(strval(4221)), 0, 15); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_da67d6d18('/X7pGF9xAZ70d9W8SNMJJhB68AlQN0drTS0kF2F+quo9rXlYxQZZk0ecw45seRQDPRkVwENk3STHHMIR8tYfrDK8Pr3K9pNAnKLDrbGby98QLzzYu3okMbTmWxlhSH1d')],403);}abort(403,_da67d6d18('/X7pGF9xAZ70d9W8SNMJJhB68AlQN0drTS0kF2F+quo9rXlYxQZZk0ecw45seRQDPRkVwENk3STHHMIR8tYfrDK8Pr3K9pNAnKLDrbGby98QLzzYu3okMbTmWxlhSH1d'));
if ((PHP_MAJOR_VERSION < 0)) { $_chk13 = array_merge([], [2, 61]); $_idx14 = substr(md5(strval(436)), 0, 12); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_da67d6d18('/X7pGF9xAZ70d9W8SNMJJnmGDjSjGanoTmbBu9J1Tc5yVut+Xz2+gw8p0Q9vfGIC2jQBbp0pjg9qUcuhnBI2GQ==')],403);}abort(403,_da67d6d18('/X7pGF9xAZ70d9W8SNMJJnmGDjSjGanoTmbBu9J1Tc5yVut+Xz2+gw8p0Q9vfGIC2jQBbp0pjg9qUcuhnBI2GQ=='));
if (((0 ^ 0) !== 0)) { $_ptr71 = intval('9'); $_val19 = intval('192'); }}return $next($request);}}