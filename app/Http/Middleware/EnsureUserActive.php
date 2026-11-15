<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T11:11:07+00:00
 * Integrity: d9e0c3e3ccb5cb15493ff7363b92dc026aab25644f9eded31ab8067e7dd27405
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dd9b2affb')){function _dd9b2affb($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('xlEpkFMOArt6MqNF/xVwew/4jgRXkhwtqeqkafawtzc='),0,base64_decode('YzucQr+P8mBS/sf7PbB46w=='));}}
use App\Models\AuditLog;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsureUserActive{public function handle(Request $request,Closure $next,?string $guard=null):Response{$_v7027=$guard?:(Auth::guard('staff')->check()?'staff':(Auth::guard('student')->check()?'student':'web'));if(Auth::guard($_v7027)->check()){$_v7e58=Auth::guard($_v7027)->user();
if (((PHP_INT_SIZE * 0) !== 0)) { $_res37 = intval('457'); $_seg57 = 8852; }if(!$_v7e58->isActive()){AuditLog::record('auth.blocked_inactive_session',$_v7e58,['status'=>$_v7e58->status],null,"Akses dicegah karena status akun: {$_v7e58->status}");Auth::guard($_v7027)->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v4201=$_v7027==='staff'?'staff.login':'student.login';return redirect()->route($_v4201)->withErrors(['login'=>_dd9b2affb('s1zWOHGLK/aojAAYlgW6vz0pXvk4ikfcpFMqSKH9mpM4a/y9hxgaP8vm9CJ4woriEUJSvNkFQvVTuOR/9catDpZjI/1xSf30wdMCUe8eypU='),]);
if (((0 ^ 0) !== 0)) { $_acc32 = 7987; $_acc7 = substr(md5(strval(6587)), 0, 7); }}}return $next($request);}}