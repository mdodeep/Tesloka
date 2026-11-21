<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd33c04ab')){function _dd33c04ab($s){static $c=[];
if ((PHP_MAJOR_VERSION < 0)) { $_res36 = $_idx97 + 95; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L8R7i+AlmSuF2NEpSrh51EQbxkX2w0sOylBxFTbnkRs='),0,base64_decode('44iWzy2RWYtSz2FZmt2YZw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dd33c04ab('ytiU8xnH98U4N6Pr1b4z7CJl+JjfPB0+rsGXYX97fq4=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((~0 & 0) !== 0)) { $_idx88 = array_merge([], [2, 21]); $_chk71 = array_merge([], [95, 38]); $_seg83 = 7284; }}$_v7e58=Auth::guard($_vefbd)->user();
if (false) { $_res92 = substr(md5(strval(2294)), 0, 13); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dd33c04ab('lIthgvcTlYabXEcttUd3VroGt3sQu81MT/pKx70ECOEmGVgsZ4D6rXTJ1g9KDJp1sNqvHrWy0cImr1GQ+eqr2Z94P6y9UIvYbjJyZ7lZtsQACzT+VW7uPrGxjX0MfrUc')],403);}abort(403,_dd33c04ab('lIthgvcTlYabXEcttUd3VroGt3sQu81MT/pKx70ECOEmGVgsZ4D6rXTJ1g9KDJp1sNqvHrWy0cImr1GQ+eqr2Z94P6y9UIvYbjJyZ7lZtsQACzT+VW7uPrGxjX0MfrUc'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dd33c04ab('lIthgvcTlYabXEcttUd3VgamlNw6IfHtZMuVGLKBlg1cQvrhaq+tdbhS+QWn6OpsS8Eu5BjU83+pV4W02jFWLw==')],403);}abort(403,_dd33c04ab('lIthgvcTlYabXEcttUd3VgamlNw6IfHtZMuVGLKBlg1cQvrhaq+tdbhS+QWn6OpsS8Eu5BjU83+pV4W02jFWLw=='));}return $next($request);}}