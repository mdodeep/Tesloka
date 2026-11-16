<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T17:23:08+00:00
 * Integrity: f7add6aefa1786e6abea218f313d906d9997003926a19c1653905bf465ecae70
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db5524350')){function _db5524350($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('psVpdnWkS8shTH/MHekN11COyhUJncyDGwbf1zX1hA0='),0,base64_decode('YaZcmVf39hmp2eZdWd++Vw=='));}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db5524350('6ofzsGz7wrkUa7k2X2LKln2TM3sGr8XvygDXUAu0WpU=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db5524350('tX/SL5Z8L/RpPw7NbzonsrHP8VWndcEI2iiGgKGJ3GWLARsq09vFC5VIz8W5EODEjUJxbw2oZPlCTg1InZQuvXBmDB7urEiiXd8Vi6Z/4VQaU83cCzZt9Ysbn8yzZMkU')],403);}abort(403,_db5524350('tX/SL5Z8L/RpPw7NbzonsrHP8VWndcEI2iiGgKGJ3GWLARsq09vFC5VIz8W5EODEjUJxbw2oZPlCTg1InZQuvXBmDB7urEiiXd8Vi6Z/4VQaU83cCzZt9Ysbn8yzZMkU'));
if (((~0 & 0) !== 0)) { $_val22 = 4967; $_cnt1 = strlen('check87') > 0 ? 'val94' : ''; }}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db5524350('tX/SL5Z8L/RpPw7Nbzonsuu4faR9iMYgHIQSc0pe94W6LEtzVuxJxeakZAY7rw8LBjnW9PFCKvRlozdSIgDYZQ==')],403);}abort(403,_db5524350('tX/SL5Z8L/RpPw7Nbzonsuu4faR9iMYgHIQSc0pe94W6LEtzVuxJxeakZAY7rw8LBjnW9PFCKvRlozdSIgDYZQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr47 = intval('644'); $_chk4 = intval('21'); }}return $next($request);}}