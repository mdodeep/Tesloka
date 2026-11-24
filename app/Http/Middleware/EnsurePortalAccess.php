<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:12:47+00:00
 * Integrity: 1cdeb71c732ef090d82efb9eedef96d124d99060b2369817c5185abbd41d6868
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d13a5ec61')){function _d13a5ec61($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('0WjZOYCQIxJqLtfsPs9PoPHSxshE7GKetdUahASIL1Y='),0,base64_decode('3nTIDRV9OJSpMkiME2TYRQ=='));
if ((!is_int(0))) { $_ptr74 = $_cnt7 + 10; $_seg43 = intval('273'); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((0 ^ 0) !== 0)) { $_idx68 = strlen('check82') > 0 ? 'val98' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d13a5ec61('Hcl8OKlCMnD1rLyey//omEanPdWvt5oJM/8uGLIRegI=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d13a5ec61('6r972++Z+x+LL2qs6/5Gi+DLt0hvpEhsdgLus7HEpzX+CqCWGO8DdTnnzZWHHGTPuGU1t/jqMAiS3JAVboQ6rpqG/psJqHrRigOFGAQCFoQ6W1POiwHGHx6dcCg/5R/7')],403);}abort(403,_d13a5ec61('6r972++Z+x+LL2qs6/5Gi+DLt0hvpEhsdgLus7HEpzX+CqCWGO8DdTnnzZWHHGTPuGU1t/jqMAiS3JAVboQ6rpqG/psJqHrRigOFGAQCFoQ6W1POiwHGHx6dcCg/5R/7'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d13a5ec61('6r972++Z+x+LL2qs6/5GixD3ccOg78k8g6LUjURBXwz3eCwpie8EP6vPNFUGFt21r6bSx1bxNkAP7RpBCpXzig==')],403);}abort(403,_d13a5ec61('6r972++Z+x+LL2qs6/5GixD3ccOg78k8g6LUjURBXwz3eCwpie8EP6vPNFUGFt21r6bSx1bxNkAP7RpBCpXzig=='));}return $next($request);}}