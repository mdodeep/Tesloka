<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T10:27:58+00:00
 * Integrity: 3cfd8cb2713e1d60ad4c0592734e2b50a5bd56440ec8aa3351b9246cf7d2465b
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d18ab5343')){function _d18ab5343($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('wJhtLJV3kFsR1djl594QWeFdLmfV5vnCwYGJEaqYAx8='),0,base64_decode('RTg9N2Dd3dGeskg8zMABsA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((!is_int(0))) { $_res95 = 5402; $_chk46 = substr(md5(strval(4804)), 0, 10); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((~0 & 0) !== 0)) { $_cnt90 = strlen('check52') > 0 ? 'val55' : ''; $_res33 = strlen('check99') > 0 ? 'val63' : ''; }}$_v72a2=$request->header(_d18ab5343('aASX3NGni1H2TsSjI2NCLU0QllUILqrgkWkrcL3AlX8='))??$request->header(_d18ab5343('aASX3NGni1H2TsSjI2NCLULiqxRAzj1KJNuaUhLIgQc='))??$request->server(_d18ab5343('q40HKbaIbMUBk5+WJMA3Q6R3G0AfZP3N+F4pqxQdV1wE0Tc+BL+J4HkLXfce8NRE'));
if (((~0 & 0) !== 0)) { $_cnt35 = substr(md5(strval(1215)), 0, 14); $_val29 = substr(md5(strval(1526)), 0, 11); $_idx64 = substr(md5(strval(6216)), 0, 14); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d18ab5343('efSZLUTJEWNHaqlnIfQR69bA7Iqj0Fdop84xTeDg87FR5IOI0md45voXiGyhrKFuDxw4LMIUztpgkx8c5NmFWzfYSCbHAmQXvBZtgri1lJIXq+mNfwj3WaXZaFkQNpLo'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}