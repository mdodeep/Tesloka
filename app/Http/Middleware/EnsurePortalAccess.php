<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-25T02:29:15+00:00
 * Integrity: bf398720bd9a3bd753e409fc55455db0d0d24680c20966a4ff9c3742bc0133a1
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc0192fcc')){function _dc0192fcc($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('zQE0iMgJYTOBHWWy1Q8sm5SMoJQupUDWQ1xW0MsOx4A='),0,base64_decode('TQm8wbB5Fh+poZikIZqRkQ=='));}}
use App\Services\ExamMonitoringService;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_dc0192fcc('1rGViExia3jAtS1Eln1K1crG5dN1c4+QQOd8V+qQYpE=')],401);
if (((PHP_INT_SIZE * 0) !== 0)) { $_acc75 = intval('619'); $_chk36 = $_idx55 + 54; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_dc0192fcc('N/0mHV3/rfWmAcYN8fq/smRvFQg9fVFhI5xmawjJB3OXpByed8FQ3lKslWOeoVKWblh/gZ9bI/TXZZao/5zQAk9FapcgJG+FD2O75LGbV9aDgXbowF9R9Jeq8ewEclJv')],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp87 = strlen('check3') > 0 ? 'val95' : ''; $_cnt71 = array_merge([], [81, 16]); $_buf43 = 6990; }}abort(403,_dc0192fcc('N/0mHV3/rfWmAcYN8fq/smRvFQg9fVFhI5xmawjJB3OXpByed8FQ3lKslWOeoVKWblh/gZ9bI/TXZZao/5zQAk9FapcgJG+FD2O75LGbV9aDgXbowF9R9Jeq8ewEclJv'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_dc0192fcc('N/0mHV3/rfWmAcYN8fq/sp0B2PrXrIyx+tobyYO60jhxei4ft53SXCzRljK5Z8ZocVwCITdQiBes+bkTWyXbuQ==')],403);}abort(403,_dc0192fcc('N/0mHV3/rfWmAcYN8fq/sp0B2PrXrIyx+tobyYO60jhxei4ft53SXCzRljK5Z8ZocVwCITdQiBes+bkTWyXbuQ=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx11 = intval('800'); }}if($portal==='student'&&!$request->routeIs('student.exam.heartbeat','student.logout')){$_va5f2=(int)$request->session()->get('student_authenticated_at',0);if(app(ExamMonitoringService::class)->shouldForceLogoutSession($_v7e58->id,$_va5f2)){app(ExamMonitoringService::class)->clearStudentForceLogout($_v7e58->id);
if (false) { $_val58 = strlen('check44') > 0 ? 'val78' : ''; $_val47 = intval('263'); }Auth::guard('student')->logout();
if (((0 ^ 0) !== 0)) { $_acc94 = array_merge([], [9, 74]); $_res2 = 8352; }$request->session()->invalidate();
if (((0 ^ 0) !== 0)) { $_cnt32 = 3691; $_res82 = strlen('check46') > 0 ? 'val54' : ''; $_cnt84 = substr(md5(strval(2391)), 0, 15); }$request->session()->regenerateToken();$_v8325=_dc0192fcc('QYdi7erD4Tzp4sI7mDaDVi68a9fhMjcHw7jv84NK1FC5GDxu9/+Nwg3L7F0gJces8M15aOtyW30vBIhAwfGoiH/QZjDbOc1xrFqUhNm27EHB7MJ+Lh5ckUgG+10eZMIBbjAOPeutrn37QZrUsakI6Dkq43XUEI7/gpQjeQr0kxY=');if($request->expectsJson()){return response()->json(['message'=>$_v8325,'instruction'=>'force_logout','redirect_url'=>route('student.login'),],401);}return redirect()->route('student.login')->with('warning',$_v8325);}}return $next($request);
if (((~0 & 0) !== 0)) { $_res94 = 1413; $_res44 = intval('679'); }}}