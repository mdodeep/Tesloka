<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2efa2802')){function _d2efa2802($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('KiywMJkVVRCMvNrO5OK8lgoPkjB/O/7WwNChi0CDSHY='),0,base64_decode('+zMalMzQkdgaJcM7lheLnA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d2efa2802('G7sJkh9in6da111qttzPt6OLwVDr8/32/pOwII4fhPg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d2efa2802('H/LMF6oQP0SSH8disS0jk1pGxhFbYC7oqPmvIC2sHHqcCOm3kmYB1GJi5eeEQx4m9FLC+4SIgh+f7Iq9LeAJXn+Xll/rSn27sz6t6qvUzw5jobjjDp4BsMaKsdQO3gDC')],403);}abort(403,_d2efa2802('H/LMF6oQP0SSH8disS0jk1pGxhFbYC7oqPmvIC2sHHqcCOm3kmYB1GJi5eeEQx4m9FLC+4SIgh+f7Iq9LeAJXn+Xll/rSn27sz6t6qvUzw5jobjjDp4BsMaKsdQO3gDC'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d2efa2802('H/LMF6oQP0SSH8disS0jk7G0YoUPuJ0fWZj9Slh9m5MCXIJ05gstewJdgMhErWodCVph4t920PAKl1MZU81Mnw==')],403);}abort(403,_d2efa2802('H/LMF6oQP0SSH8disS0jk7G0YoUPuJ0fWZj9Slh9m5MCXIJ05gstewJdgMhErWodCVph4t920PAKl1MZU81Mnw=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc72 = strlen('check19') > 0 ? 'val13' : ''; $_res50 = intval('763'); }}return $next($request);}}