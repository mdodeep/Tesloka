<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T05:03:51+00:00
 * Integrity: f5a75bcdc48148c8724fcb4a06b85088073bf6fdb5c9c28924b472633ae79374
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_deb274065')){function _deb274065($s){static $c=[];
if (((0 ^ 0) !== 0)) { $_tmp69 = strlen('check39') > 0 ? 'val12' : ''; $_acc41 = substr(md5(strval(2769)), 0, 9); $_ptr94 = intval('240'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OpfqmL1puStIXmRJhHRTnMxb2CtkE91sl6iKP9c+BfA='),0,base64_decode('0Q0DqXNw3odPtVgIY10m0w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if (((~0 & 0) !== 0)) { $_res51 = substr(md5(strval(299)), 0, 8); $_seg14 = 2950; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_deb274065('nY5eq5BFX2khKNDZ/9egLUELl+2uM3aS9IlehXWcPmg='))??$request->header(_deb274065('nY5eq5BFX2khKNDZ/9egLVR3F5XVljeVY0EVyzh/lHI='))??$request->server(_deb274065('bWt9UgRH53E0AqPDn7PcCVk+oLlh9T0MqyNmG6zhd6WYOx+1vpKoVL6DOvZ03h9X'));$_v76a6=(string)$request->userAgent();
if ((!is_int(0))) { $_seg37 = $_buf16 + 89; $_tmp5 = 6670; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_deb274065('do20G2UZmFdnGqpOVaa15Of9hlfU2Xh15VLB0PwV7U5lTvS0x5g4J5HrqaffsjTamOX4EkiBiK7t1i+Rws81TgicuikUYJQFwOwXN7cS9/VDo63dm7/rNX0/n+kT52MA'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}