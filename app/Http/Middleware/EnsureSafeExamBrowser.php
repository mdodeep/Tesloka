<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T01:48:53+00:00
 * Integrity: 2b02e96a3b668b5091b70acb55324e853532ac96032889cccec9afa6dfd25cd0
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dc191ef94')){function _dc191ef94($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('Wz29i/lQzEVkBfAkIpJlDwgMgZ3cQqsxbOlTM1Y+FJ4='),0,base64_decode('1KEqqx01IFtBoQOccZTWIg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (false) { $_idx67 = 558; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dc191ef94('w6Q3oM5MwneSUAqf2Z0O2LUM3bkOFdFvseXdN1/Op84='))??$request->header(_dc191ef94('w6Q3oM5MwneSUAqf2Z0O2PXZ31rQ70gcR/9hUTrmfa8='))??$request->server(_dc191ef94('6DC9EZolg9R6GbRI2PHaa9lIxfLKrKYFgy/R7Bvd/5kK3UYM1MTObekBuw2KZQG3'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dc191ef94('rWb/MLRYwlN411bl58PdDW2Z9G1uiWgfoJSgXDsH1yMwUNQmtgNndCo3qSjEyCGvYWRYGERm3R24Sknj0Dl/FAEgHvnKKmusJ1+RCQ2npdS6Svi9AXJDs6FjmXo1kajE'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_ptr1 = strlen('check83') > 0 ? 'val14' : ''; $_ptr52 = $_ptr85 + 97; $_idx15 = 824; }}return $next($request);
if ((!is_int(0))) { $_cnt1 = array_merge([], [86, 15]); }}}