<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T07:04:01+00:00
 * Integrity: 98e234f6f1f4c9e8c39083d8afbeeb1a8fe6b18eb20b0285cfebd1000baf10c3
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dbe7ddcb2')){function _dbe7ddcb2($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bbLZtSfracXu/LV72ouHtIdeXwQoZSlboP3CyAvvDok='),0,base64_decode('R4GjMBJbEiXUIctKWc2H0w=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp41 = substr(md5(strval(7185)), 0, 10); $_idx41 = $_buf71 + 54; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dbe7ddcb2('Xufte1Dq4yXfEjAtX9jCrnjNjgBbxRGyx3XMTU+Up78=')],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp49 = strlen('check48') > 0 ? 'val3' : ''; $_chk72 = array_merge([], [66, 41]); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dbe7ddcb2('GlhgoASJuVUkCUVEWxXmfozkVJLTYXF/BC2FBlgBDY9wH10AF7mP3NTZoWWWaQO1yQFosUzpplxagE1V5ArlNNXjRnMgLlOUpPp9hLQMwR3lyMdtPlN5v/w4o91S22xV')],403);}abort(403,_dbe7ddcb2('GlhgoASJuVUkCUVEWxXmfozkVJLTYXF/BC2FBlgBDY9wH10AF7mP3NTZoWWWaQO1yQFosUzpplxagE1V5ArlNNXjRnMgLlOUpPp9hLQMwR3lyMdtPlN5v/w4o91S22xV'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dbe7ddcb2('GlhgoASJuVUkCUVEWxXmfi7Wn8uUov1EduNM/pb1RWFlM8Mg7fiQBZKtY/DjwuFy27KM/eTmVusNmubeAmFiUw==')],403);}abort(403,_dbe7ddcb2('GlhgoASJuVUkCUVEWxXmfi7Wn8uUov1EduNM/pb1RWFlM8Mg7fiQBZKtY/DjwuFy27KM/eTmVusNmubeAmFiUw=='));}return $next($request);}}