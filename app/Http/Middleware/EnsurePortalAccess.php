<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:45:03+00:00
 * Integrity: b8bf5a6e78065226e64eac4faaa271b9ecd219b2dedc6077be7c9cc7047f99f2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df3f903b3')){function _df3f903b3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('MypROt7RdfFuuhSYIEb5xt4UgdQdzY1Kx5K6xOGwE+E='),0,base64_decode('kBU6kArLtiJwGeropSqJiQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_df3f903b3('nXymLcTcbfoEwCFpMlKhrwo1Vf8OIOVIaysEA1UPvkg=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if (((0 ^ 0) !== 0)) { $_chk5 = array_merge([], [81, 56]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_df3f903b3('fwsMK5e31OUTFDWvC47IfjyB2/w+c2KaQnzD4ajqedx9rT7EL8mUMRRi4o4dFlH5pckqKdZhIDjH3U+v8JmbXgTeTD4PYMt2+xCsV6l6RSPEdh1oxwwMY/yvPLl6bkAe')],403);}abort(403,_df3f903b3('fwsMK5e31OUTFDWvC47IfjyB2/w+c2KaQnzD4ajqedx9rT7EL8mUMRRi4o4dFlH5pckqKdZhIDjH3U+v8JmbXgTeTD4PYMt2+xCsV6l6RSPEdh1oxwwMY/yvPLl6bkAe'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_df3f903b3('fwsMK5e31OUTFDWvC47Ifi13FeW+Dte6N6EV3LAFKcHbIwk6Iw2JLWb1KYJzrcKebO9upDjbwU7ilOt65OIwuA==')],403);
if (false) { $_ptr93 = $_acc31 + 11; $_idx14 = 5088; }}abort(403,_df3f903b3('fwsMK5e31OUTFDWvC47Ifi13FeW+Dte6N6EV3LAFKcHbIwk6Iw2JLWb1KYJzrcKebO9upDjbwU7ilOt65OIwuA=='));}return $next($request);}}