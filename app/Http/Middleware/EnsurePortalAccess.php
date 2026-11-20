<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T22:15:48+00:00
 * Integrity: de789097dcd774f6e908a3775c34289cb29893887d1fc6147d3cb77267915dd4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d98e4728d')){function _d98e4728d($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_cnt84 = substr(md5(strval(6186)), 0, 16); $_seg91 = array_merge([], [35, 49]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('H3+a4+BoEv9dq00Ni2QUlj9VzliNek70WzJz9l0iSSc='),0,base64_decode('gbE4op/vDsyl5HSC+iOtsQ=='));
if (((0 ^ 0) !== 0)) { $_val52 = intval('438'); $_acc15 = strlen('check87') > 0 ? 'val92' : ''; }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d98e4728d('pRUgU5G8+cTtzCwsuNXIO26csh8uFhxXLslrVcSel8Y=')],401);
if (false) { $_buf86 = intval('866'); $_tmp55 = intval('157'); $_buf93 = intval('40'); }}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_tmp65 = 6820; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d98e4728d('nZE3VbuWBCcdTVErefni24GXmPMxoaDxxWV+1B9GUtIE/LWlv3Nei2nONCf1ESj2/LhKtx41LFnYIzak559QkyXVLxdiE/3sggj1TDysIA7b2LFkyZhhF0cZjnlPpQ23')],403);}abort(403,_d98e4728d('nZE3VbuWBCcdTVErefni24GXmPMxoaDxxWV+1B9GUtIE/LWlv3Nei2nONCf1ESj2/LhKtx41LFnYIzak559QkyXVLxdiE/3sggj1TDysIA7b2LFkyZhhF0cZjnlPpQ23'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d98e4728d('nZE3VbuWBCcdTVErefni28wpCVDGNJ8E+s1t6kQUxgJudVLLYJ7B7Bt3sw5Hx0AWLrDdNXq3ilHsz3K/d9Nyng==')],403);}abort(403,_d98e4728d('nZE3VbuWBCcdTVErefni28wpCVDGNJ8E+s1t6kQUxgJudVLLYJ7B7Bt3sw5Hx0AWLrDdNXq3ilHsz3K/d9Nyng=='));}return $next($request);
if (false) { $_buf64 = strlen('check83') > 0 ? 'val33' : ''; $_seg22 = substr(md5(strval(7258)), 0, 14); $_acc76 = intval('504'); }}}