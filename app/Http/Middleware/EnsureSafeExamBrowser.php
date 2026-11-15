<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T07:37:08+00:00
 * Integrity: 453f233f3fab52634ec2f18e0752b7d9c835945c007e1a04ea31d7efaf616c33
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d1f0185ad')){function _d1f0185ad($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('RxPxlJz/d7fyKI2cXkzl/XuZrZM2rEwCmEimHFOCUDU='),0,base64_decode('TDnu8I35DSPbtb6+zzsbbQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((~0 & 0) !== 0)) { $_seg14 = $_cnt42 + 20; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((~0 & 0) !== 0)) { $_chk55 = intval('654'); }}$_v72a2=$request->header(_d1f0185ad('zqScdTJrs3BUAvNOzg2u76EzFPDZevKgbZpPXezfEo8='))??$request->header(_d1f0185ad('zqScdTJrs3BUAvNOzg2u7xjJCUE2hUnENafu2vUaSmE='))??$request->server(_d1f0185ad('5EhKiTJU3DdcsUXDWuHMlaVVQ3RV7lu2/pn7r1wQVygDibjmv2jxM5lcvfH3JAmQ'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d1f0185ad('mHxxPo9hx5C7IT0VObIYC9w+5wdJCQsuCLViy4VrYP0Dh9xieyrgpDoCbuvjPHxwANc4fc8E5NTNSAKVsS67Y6NIgw61GMqtPsxsXHcJPkoTGIGSyeowpeO43amgBLdz'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}