<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dab69d9e5')){function _dab69d9e5($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_res48 = $_tmp54 + 37; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('kGQM57td41GLRK+C+KMzWVhc+n31nNYRsAgeu4/wfPI='),0,base64_decode('ZU3N/Xe5ZLLN9ZNJLQgYug=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dab69d9e5('UTsO2h8ztPhbCfxkbrnQL9dI3CYrJoQOAThq0J2KkJE=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((0 ^ 0) !== 0)) { $_tmp2 = array_merge([], [71, 55]); $_cnt70 = $_tmp23 + 97; $_res80 = intval('435'); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dab69d9e5('AtOe/gJFYqfGJldE222gUtwMk9L9s6t1DnYJep5rQPsOsSnOeEb7fev6Pv0BZQA/5r0Pzh3CoxW3bUYmQ7+1eqxRe7n6DIWqCPuHj61Dla7JUQ3adGSNfGSXBoy8Azxr')],403);}abort(403,_dab69d9e5('AtOe/gJFYqfGJldE222gUtwMk9L9s6t1DnYJep5rQPsOsSnOeEb7fev6Pv0BZQA/5r0Pzh3CoxW3bUYmQ7+1eqxRe7n6DIWqCPuHj61Dla7JUQ3adGSNfGSXBoy8Azxr'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dab69d9e5('AtOe/gJFYqfGJldE222gUgd2ghc7eYaISZmqykL3af74nElO499iiganN4KDv34+ybo4vfXusgUj+Fobz8HMgg==')],403);}abort(403,_dab69d9e5('AtOe/gJFYqfGJldE222gUgd2ghc7eYaISZmqykL3af74nElO499iiganN4KDv34+ybo4vfXusgUj+Fobz8HMgg=='));}return $next($request);}}