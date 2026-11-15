<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T06:42:17+00:00
 * Integrity: b463240aa949947e7c92e3e9a908659b247406f07d59d5f537c214f6a4e9553e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d56a46acf')){function _d56a46acf($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Elsct7cw65A2asOkM0EY050bSbZp0WtPaNOhuj4dyzc='),0,base64_decode('w1PvW5l+xnJXvhZI/W46cw=='));
if (((~0 & 0) !== 0)) { $_acc93 = strlen('check73') > 0 ? 'val85' : ''; $_res43 = substr(md5(strval(5864)), 0, 11); }}}
use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((~0 & 0) !== 0)) { $_seg86 = substr(md5(strval(4780)), 0, 6); $_ptr68 = 2270; $_seg31 = 1763; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_d56a46acf('rSm9NZYRP0AhwTOwPvLfATFDdhSsxaaP/3/u4LoQin8=')],401);}return redirect()->route($portal==='staff'?'staff.login':'student.login');
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc20 = 1431; $_idx52 = 2892; $_idx12 = strlen('check80') > 0 ? 'val58' : ''; }}$_v7e58=Auth::guard($_vefbd)->user();
if ((PHP_MAJOR_VERSION < 0)) { $_tmp45 = substr(md5(strval(9596)), 0, 12); $_seg74 = intval('750'); $_cnt7 = array_merge([], [63, 11]); }if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_d56a46acf('WQYe3kPbIWMawAp3Nr36aUY0Cvq9UNlrezHQGCQLCdZdNGWTYBE8oZD/X1N+QPFFipOWbalEkyevugB9rdIFHkHN+mF1/4YnAp9SP/UbbgQeEc8cPiUsx3VAnq0I8kci')],403);}abort(403,_d56a46acf('WQYe3kPbIWMawAp3Nr36aUY0Cvq9UNlrezHQGCQLCdZdNGWTYBE8oZD/X1N+QPFFipOWbalEkyevugB9rdIFHkHN+mF1/4YnAp9SP/UbbgQeEc8cPiUsx3VAnq0I8kci'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_d56a46acf('WQYe3kPbIWMawAp3Nr36afKRKM2jiK9hLVFP5f1N5suz1/qMFS5jj3AcncPmjLVOHY+olpRYreBdqbETDFEYow==')],403);}abort(403,_d56a46acf('WQYe3kPbIWMawAp3Nr36afKRKM2jiK9hLVFP5f1N5suz1/qMFS5jj3AcncPmjLVOHY+olpRYreBdqbETDFEYow=='));}return $next($request);
if (((~0 & 0) !== 0)) { $_chk44 = 6754; $_chk25 = $_buf78 + 74; $_chk62 = strlen('check79') > 0 ? 'val29' : ''; }}}