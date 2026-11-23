<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T03:05:06+00:00
 * Integrity: 16904cd816c3c21956ec405fb921e49fb870ec1c25916fdd9d72495d85d174fe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d372c2cb1')){function _d372c2cb1($s){static $c=[];
if ((!is_int(0))) { $_val88 = substr(md5(strval(9553)), 0, 6); $_tmp25 = $_cnt5 + 3; $_cnt32 = intval('161'); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('nTGEuCr/GC4EBJ26v9rr7nspP0Ecq2JNHlHsdS1pUn8='),0,base64_decode('eKBBF1hSwfEV2Gw2u431cQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_idx84 = intval('470'); $_ptr40 = array_merge([], [35, 92]); $_cnt34 = array_merge([], [75, 7]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d372c2cb1('RzWdyJdNieU2sllxcLf6lztUSE3m/WxqS/bDQ8i75yA='))??$request->header(_d372c2cb1('RzWdyJdNieU2sllxcLf6lysHlu12cDoXzriyE2rR6ms='))??$request->server(_d372c2cb1('fL9JaXOtKE4d+j4IbkNUb3pnlhXY93XQlh2wOGpx9+z8zUpw6vtMbSysje58aS5A'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((PHP_INT_SIZE * 0) !== 0)) { $_cnt36 = substr(md5(strval(1332)), 0, 12); $_idx8 = 8410; $_seg60 = array_merge([], [9, 42]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d372c2cb1('FiQ9iOltUZPacJcE3gAg7QGcPkFhl3kNVg0Rfkdr+jvkcf1hZv1IPvf4RES/YQn6IIHH0/cp9DSJ1wuToLrfy5qURoVhOOX6pVpZbTpvRdrn+yAglIIeJpEeg/3a7XOj'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}