<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-28T16:58:08+00:00
 * Integrity: b569a6ea1f737116fac7d003fe121953f2ad02dc4ce5a5b026441832468f85b4
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db608ba24')){function _db608ba24($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('bUywUEhmlJFOZUELP+bljr37juwlA6jRAPhxY8qOyPI='),0,base64_decode('m07Gg+WdfjXQSUeCej1RSQ=='));
if ((!is_int(0))) { $_seg65 = 1272; $_seg79 = array_merge([], [57, 16]); }}}
use App\Services\ExamMonitoringService;use Closure;use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;use Symfony\Component\HttpFoundation\Response;class EnsurePortalAccess{public function handle(Request $request,Closure $next,string $portal):Response{$_vefbd=$portal==='staff'?'staff':'student';
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp82 = 4737; $_res44 = strlen('check31') > 0 ? 'val92' : ''; }if(!Auth::guard($_vefbd)->check()){if($request->expectsJson()){return response()->json(['message'=>_db608ba24('bavdYUhH0aYtajwqWEfI0R5OmAOCl0uww5ilWBQQvGY=')],401);
if ((!is_int(0))) { $_chk87 = strlen('check60') > 0 ? 'val91' : ''; }}return redirect()->route($portal==='staff'?'staff.login':'student.login');}$_v7e58=Auth::guard($_vefbd)->user();if($portal==='staff'&&!$_v7e58->isStaff()){if($request->expectsJson()){return response()->json(['message'=>_db608ba24('cjwSu/KpJ66g1aG3lG0aM+9Yo+WbzUzFzntL1ZfkVOSs9xG0Sa6wqSNJb4x4NqoCyvsDyPoi3e6IFYhKxMt4+qh42/3oZiE7VK57CBa5Ztj1Ck7316puglMoHcQKTUlZ')],403);}abort(403,_db608ba24('cjwSu/KpJ66g1aG3lG0aM+9Yo+WbzUzFzntL1ZfkVOSs9xG0Sa6wqSNJb4x4NqoCyvsDyPoi3e6IFYhKxMt4+qh42/3oZiE7VK57CBa5Ztj1Ck7316puglMoHcQKTUlZ'));}if($portal==='student'&&!$_v7e58->isStudent()){if($request->expectsJson()){return response()->json(['message'=>_db608ba24('cjwSu/KpJ66g1aG3lG0aM9pkKe8dCkVmPiuMti1YdIixVg2oycW79ej+HHiHGBb2om20zCcmJT67HmbK2loiHA==')],403);}abort(403,_db608ba24('cjwSu/KpJ66g1aG3lG0aM9pkKe8dCkVmPiuMti1YdIixVg2oycW79ej+HHiHGBb2om20zCcmJT67HmbK2loiHA=='));}if($portal==='student'&&!$request->routeIs('student.exam.heartbeat','student.logout')){$_va5f2=(int)$request->session()->get('student_authenticated_at',0);if(app(ExamMonitoringService::class)->shouldForceLogoutSession($_v7e58->id,$_va5f2)){app(ExamMonitoringService::class)->clearStudentForceLogout($_v7e58->id);Auth::guard('student')->logout();$request->session()->invalidate();$request->session()->regenerateToken();$_v8325=_db608ba24('bRoMIYHGXxCET7WbyGhCNtyF7y+X8IdVLvfzmndnaP0sTEyo/Am2CWgeeiwD3zsGL1ksz/pBXTjPAQWZa1CLIYbt2V/4CdpQ5Qx0SOnkwPDuq8OkFOImsDMjDFry4/tOGFgcEozr7coTdcCJAHX+jB/lZt3uHDu6sm6DW0p7eak=');
if (((0 ^ 0) !== 0)) { $_ptr89 = array_merge([], [11, 22]); $_cnt76 = intval('242'); }if($request->expectsJson()){return response()->json(['message'=>$_v8325,'instruction'=>'force_logout','redirect_url'=>route('student.login'),],401);
if (((~0 & 0) !== 0)) { $_seg1 = 4386; $_buf82 = intval('912'); $_cnt37 = strlen('check80') > 0 ? 'val5' : ''; }}return redirect()->route('student.login')->with('warning',$_v8325);
if (false) { $_res72 = intval('534'); $_acc38 = $_buf18 + 52; $_cnt42 = 6576; }}}return $next($request);}}