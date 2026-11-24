<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T15:37:40+00:00
 * Integrity: 6cab5f32f79b494a98da1bcfce2bcdb278ce6ee5bc6f7ac0c8dc7ba17c6d7508
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2f3beb2d')){function _d2f3beb2d($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('eP9bzSkxWQH7u3mn3AFKP9IhybdeAdPFSQY0SUEYtXA='),0,base64_decode('Tc90/JzLh/5HiCF2XoveCQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d2f3beb2d('X8ERLP6PDhX8MMpz5speODWt76J1wnvNGtbgziQqxYY=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d2f3beb2d('+HAHbCY0pNOB67MGD9U1+YKCHABUgUCKJxFDO9+hDi6ry0FNfSBtEtYAOdC94Yng0IXkdFaodU84QiI8gaoacVTC2YNlMUCnPK7U7Lp7w61UBb6wy5efwp6MQ81bDxdR')],403);}abort(403,_d2f3beb2d('+HAHbCY0pNOB67MGD9U1+YKCHABUgUCKJxFDO9+hDi6ry0FNfSBtEtYAOdC94Yng0IXkdFaodU84QiI8gaoacVTC2YNlMUCnPK7U7Lp7w61UBb6wy5efwp6MQ81bDxdR'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d2f3beb2d('+HAHbCY0pNOB67MGD9U1+cH8TJJ+MNz20bbOSw/lMKESnx+ZGu6tmJm1JYgyfq4LIIPMo2MIjRczuTOR/AlMPQ==')],403);}abort(403,_d2f3beb2d('+HAHbCY0pNOB67MGD9U1+cH8TJJ+MNz20bbOSw/lMKESnx+ZGu6tmJm1JYgyfq4LIIPMo2MIjRczuTOR/AlMPQ=='));}return $next($request);}}