<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T15:39:43+00:00
 * Integrity: 0fdf13291d07f0e42301c8c3306b05ab598cd2c738e47ff0d4f9093778ec66c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc654382a')){function _dc654382a($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0fVxs7Meiuq/bkXHF92AwXkpCp8PqUNo36sxChh4EeI='),0,base64_decode('+426WcmWe5lZKEKtSqZyAg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dc654382a('XdCxNBL6QfoqHd03WkE/TvMMrIympLoeXR/9nGIzDVo=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dc654382a('QK1WwLOYhJEtvATP5DuxJlL5Mu+DqhMEDYbgiQ3pCGkv0gUoxw8l1pAEBEVh1gNR+cFUPna8QWSL/zaxx8Vt8kcb5/EOh6SbhgTfNQNeGTKbpOO7QBkpdbPDrm6VzP2A')],403);
if ((PHP_MAJOR_VERSION < 0)) { $_seg50 = intval('725'); }}abort(403,_dc654382a('QK1WwLOYhJEtvATP5DuxJlL5Mu+DqhMEDYbgiQ3pCGkv0gUoxw8l1pAEBEVh1gNR+cFUPna8QWSL/zaxx8Vt8kcb5/EOh6SbhgTfNQNeGTKbpOO7QBkpdbPDrm6VzP2A'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dc654382a('QK1WwLOYhJEtvATP5DuxJr+lWugIC5j7rs639i3Q/gWoOLlOJ4Yb6CrELbrSCIUKMCSuC31Gyae2fipY9h1BVQ==')],403);}abort(403,_dc654382a('QK1WwLOYhJEtvATP5DuxJr+lWugIC5j7rs639i3Q/gWoOLlOJ4Yb6CrELbrSCIUKMCSuC31Gyae2fipY9h1BVQ=='));}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg54 = intval('191'); }}}