<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T10:44:49+00:00
 * Integrity: 0617fe45b49cd5d031a22b03bf5ebd8f1d93ffe50a9543382cbcd3000291716c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d73b33a9e')){function _d73b33a9e($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('5YgvfYRfigX440z4POnW155VIXUV4gCPqahuVibo6fQ='),0,base64_decode('4cIZ/TFQKv/m6sHHhghEMg=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d73b33a9e('ngYP9NWOhIM3m01Mi3Z1wEfbLJ2CqVB54r50mIuWRA4=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (false) { $_acc95 = array_merge([], [84, 22]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d73b33a9e('UIBq9vMnnAnrLLYqOWNgvxreemaA98/7Ef0K6fhwE+losNQG03bd+bOp3caz5QwticVOdCAnw41Z8qjPczHsuwZg5CfPDinHkVOopS41S5+uPXD6d5OfCHpWI+VrCklQ')],403);}abort(403,_d73b33a9e('UIBq9vMnnAnrLLYqOWNgvxreemaA98/7Ef0K6fhwE+losNQG03bd+bOp3caz5QwticVOdCAnw41Z8qjPczHsuwZg5CfPDinHkVOopS41S5+uPXD6d5OfCHpWI+VrCklQ'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d73b33a9e('UIBq9vMnnAnrLLYqOWNgv2d/rzTL+hQST00EPsqdAgA9iNnf3/i7YQJEbt55DKKWAbnpsQ3k+GaG2fYO0X1txw==')],403);}abort(403,_d73b33a9e('UIBq9vMnnAnrLLYqOWNgv2d/rzTL+hQST00EPsqdAgA9iNnf3/i7YQJEbt55DKKWAbnpsQ3k+GaG2fYO0X1txw=='));}return $next($request);
if ((!is_int(0))) { $_idx81 = 444; $_ptr52 = array_merge([], [16, 92]); $_ptr10 = array_merge([], [44, 59]); }}}