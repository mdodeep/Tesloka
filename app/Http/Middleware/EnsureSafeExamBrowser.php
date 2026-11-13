<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T14:56:37+00:00
 * Integrity: 48ea7b313529166dee117b7bd38ea4955a3d683cb26d869c92edd7d7b18f7062
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d998dde08')){function _d998dde08($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('hFeUbuvehEiRXERqXSMtItwPuoiCTw0mOiy8YwOdSHY='),0,base64_decode('PymmflSMW0MMY6i5dp31VQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_acc75 = intval('882'); $_res69 = 5700; $_ptr31 = $_seg44 + 82; }}if(!$_va1cd){$_vd401=$request->route('attempt');
if (false) { $_ptr65 = $_val33 + 6; $_seg4 = intval('567'); $_tmp46 = intval('682'); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_chk33 = strlen('check94') > 0 ? 'val48' : ''; $_seg18 = $_chk44 + 42; $_chk63 = array_merge([], [70, 84]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d998dde08('s9lAidIWcGFovMzjR2e5pPoFL1qgP4O9FtnwTnKDUEM='))??$request->header(_d998dde08('s9lAidIWcGFovMzjR2e5pPjLHBTGehj+Exlvoy8BAK0='))??$request->server(_d998dde08('0XN0QFNEaC2bdu+70kf/ZpT1FY3eJTh277YY6e9mcvIrR19507LsSh/QTX0jGHBK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d998dde08('MLHpMyLB4R7mRneNhGRY59XEndJqsDFcaPCpjqUzuKco3CeHuOsithMYHjW4RTqHBhpw8GumWBJP4zjYZ/cyuV7/pQQs7JvE8ev2JHZ/mWcx+B14s0dLS9fHjZEObbaI'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}