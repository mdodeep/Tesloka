<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T14:53:14+00:00
 * Integrity: 179c6012d379ee653be11c384ab2747ffd20fdf270a218152104616ad00751a2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d89cba5a1')){function _d89cba5a1($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('FioTxSRgagrQwzrV7pUWMZhvMwCunqZK9qn93igqRtU='),0,base64_decode('v4wDSvblLC3V9tD8HY9RLA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d89cba5a1('mBFgOBvye7FQtPulb6epPBc2uN659v/fX4ZUd7AALkM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d89cba5a1('+0OSL5YnWWV/uOjnUi+8rbCCDkzCAg2lgtWuMJ2VQYCu7pGy5n69iVTo8qDEy5r3EqsVrR8JiZHSVpRQBQxUQP4oGS1Ou5hRb8Oli8SsVzmC4on0vqsP8Ng4IHMypZWt')],403);
if (((~0 & 0) !== 0)) { $_acc4 = strlen('check17') > 0 ? 'val98' : ''; $_idx73 = 6121; }}abort(403,_d89cba5a1('+0OSL5YnWWV/uOjnUi+8rbCCDkzCAg2lgtWuMJ2VQYCu7pGy5n69iVTo8qDEy5r3EqsVrR8JiZHSVpRQBQxUQP4oGS1Ou5hRb8Oli8SsVzmC4on0vqsP8Ng4IHMypZWt'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d89cba5a1('+0OSL5YnWWV/uOjnUi+8rclIRAfmHuOBxdVrTW8BWR/lMgSyAP+vmRzijXyrEGeMdHq9a9z1R0TWinADl/Hfcg==')],403);}abort(403,_d89cba5a1('+0OSL5YnWWV/uOjnUi+8rclIRAfmHuOBxdVrTW8BWR/lMgSyAP+vmRzijXyrEGeMdHq9a9z1R0TWinADl/Hfcg=='));}return $next($request);}}