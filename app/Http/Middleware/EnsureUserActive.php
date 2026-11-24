<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-24T23:17:29+00:00
 * Integrity: e707243f54e4004ab820d2ab617f6532b06a3b9d57f89b9942c273a07685ce5b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_da0d47769')){function _da0d47769($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('4Z0KwMHrj9TIq3DPKQsBG4NobFx22mNTQelYGCni5s8='),0,base64_decode('B4CUGpXG3q+sI6zZET+OFA=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';$_vcb70=$_v7e58->status==='pending'?_da0d47769('cRxSOZ+reocbRYQUMmxvMAAgiM03P/7RZvM/iu4HCYYiFfzjVsllZkzsXrTjW/x7fCfoF0s7v5mNfggYisAgqg=='):_da0d47769('OngiSxcCzBn1vXSoZCwjohn12UX+7XcZv0Lt9t6ylzMnL5OBdJd2XmqJjSpYNpOWhiKCCMQ3+/jo9iyyvqpkhGe36MQMrGHskH8GtTF8Opc=');return redirect()->route($_v4201)->withErrors(['login'=>$_vcb70,]);}}return $next($request);}}