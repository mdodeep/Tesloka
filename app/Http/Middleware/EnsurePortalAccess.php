<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T02:28:09+00:00
 * Integrity: cece1f09a4c104ca687cd4df334946077335ee48ea708f4c43c98fb7ad43a1fa
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d826245ee')){function _d826245ee($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('L6UlgyFz3dBz7/ThL/Atf4lqGzDEjOtPG0zVikw1m7A='),0,base64_decode('11Dasksk08FtFCYNRTn3mQ=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d826245ee('bRh6ddIIehdfh1gL4Vl3BPSSYZQvmfgBqmc954zOvAM=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (false) { $_chk36 = strlen('check63') > 0 ? 'val47' : ''; $_res22 = $_seg71 + 51; }}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d826245ee('x5pnmP21jcgHvjnlvHNxNrcKYrlKlDJlbWowWG9F/rPPl3MMqbs4u1bJ1w7JMhBz6oM7EvB1WfyGnDznWd8cNb3hun0M/RYo9ByLOhEYe5Lp8lej+NzQ9IU/FyPRCjxE')],403);
if ((!is_int(0))) { $_ptr95 = array_merge([], [80, 85]); }}abort(403,_d826245ee('x5pnmP21jcgHvjnlvHNxNrcKYrlKlDJlbWowWG9F/rPPl3MMqbs4u1bJ1w7JMhBz6oM7EvB1WfyGnDznWd8cNb3hun0M/RYo9ByLOhEYe5Lp8lej+NzQ9IU/FyPRCjxE'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d826245ee('x5pnmP21jcgHvjnlvHNxNvtK/nWVvImf5PHdAznqo9GV6hSTZOEihz7bH8cxnbGzvg4jCCkY0HKeoqIobE9hLQ==')],403);}abort(403,_d826245ee('x5pnmP21jcgHvjnlvHNxNvtK/nWVvImf5PHdAznqo9GV6hSTZOEihz7bH8cxnbGzvg4jCCkY0HKeoqIobE9hLQ=='));
if (((0 ^ 0) !== 0)) { $_ptr23 = strlen('check55') > 0 ? 'val86' : ''; $_seg35 = intval('618'); $_chk84 = 582; }}return $next($request);}}