<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:55:37+00:00
 * Integrity: 1e494954db31ea5015f15c78b54cb3ec28774dcf71dc04fa59ca18152ead1bdf
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df8570ad3')){function _df8570ad3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/bCoVwXcOAcovO7NhKRDWHz8eKF/ItfmJ06sJsNjETY='),0,base64_decode('HLsNmSuUkFqSxPQm3q2Hnw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_tmp37 = 9890; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx27 = 5195; }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_df8570ad3('hVg9jxb4+EhoRgFrhFpogJz4Kb0pCOm8J9SrYOJMhDg='))??$request->header(_df8570ad3('hVg9jxb4+EhoRgFrhFpogFbZWVPfe+WAVduG/Dzr7eE='))??$request->server(_df8570ad3('U10uMTM4R4J4MeAjwfqhIvTQou/PfQTd+ijSdztQ8gYhVQqkBXcQcEL2PQtobknq'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if ((!is_int(0))) { $_ptr48 = $_cnt17 + 89; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df8570ad3('4BkWyCjquMTMauGtjPvgX5S7QW1I/kKUmN5rkYi7YoNh9o5v9C751neV2AyiNLIkDgOXJqA4UIMOOkxtXVue3wZ+ZWPbGCeZDLRnMar4nlRyQJUemzKf37KmUh8HmKvX'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_tmp82 = substr(md5(strval(1645)), 0, 5); }}return $next($request);}}