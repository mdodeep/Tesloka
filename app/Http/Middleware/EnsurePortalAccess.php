<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T16:39:10+00:00
 * Integrity: 5aa2806c8b55a3bb93428696f05684b8c1418a4bfc3fd31fec9a9a96c1e82701
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd285d1ba')){function _dd285d1ba($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('au3jkUGY6OPUqDfLyP3beXvi45PZyUziYUafxBMW5iU='),0,base64_decode('yU4A6+UESpij7ccsfBLNnA=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_ptr60 = substr(md5(strval(7611)), 0, 6); }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dd285d1ba('RLLXQW9h4QWcBxqBQNaXaY0ihlSSIwq6VKcSHBIS6sA=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();
if ((!is_int(0))) { $_seg61 = strlen('check83') > 0 ? 'val46' : ''; }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dd285d1ba('YDacf6Axh3V32oUnrK2vATCyI2yvB1u+w9vi6IYLGwZp7k2p6PRVHiCc3vg4vFD6PDQNEVQmIButd7ZtgwuZ1XATRK9odLhr1dFjhfL3d8YjG6RDkF1dggj8Oja6b88j')],403);
if (((0 ^ 0) !== 0)) { $_cnt42 = strlen('check11') > 0 ? 'val48' : ''; $_cnt91 = substr(md5(strval(208)), 0, 9); }}abort(403,_dd285d1ba('YDacf6Axh3V32oUnrK2vATCyI2yvB1u+w9vi6IYLGwZp7k2p6PRVHiCc3vg4vFD6PDQNEVQmIButd7ZtgwuZ1XATRK9odLhr1dFjhfL3d8YjG6RDkF1dggj8Oja6b88j'));
if (false) { $_ptr59 = array_merge([], [36, 7]); $_seg2 = array_merge([], [18, 0]); }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dd285d1ba('YDacf6Axh3V32oUnrK2vAVD1Qc3WY7eLCmABCjw+LvcPA30SYvvnhfJ8oR3VeT8mLN1W0mR9P9Jchs6hiiFEBA==')],403);}abort(403,_dd285d1ba('YDacf6Axh3V32oUnrK2vAVD1Qc3WY7eLCmABCjw+LvcPA30SYvvnhfJ8oR3VeT8mLN1W0mR9P9Jchs6hiiFEBA=='));}return $next($request);
if (((~0 & 0) !== 0)) { $_val81 = array_merge([], [78, 42]); }}}