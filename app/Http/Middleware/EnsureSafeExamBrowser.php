<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T13:22:47+00:00
 * Integrity: 103d18971ce7736827021cff41c8eb2aba5d97fad58112dd804a3e04cca16207
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df3ff456f')){function _df3ff456f($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XqOVOFeqhNOajkisG+xmhG35TKRlpYlIwCEZ3xxeseg='),0,base64_decode('kkFNj5DhrL73yghB692vZQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((!is_int(0))) { $_idx21 = intval('180'); $_cnt73 = substr(md5(strval(8165)), 0, 8); $_acc67 = array_merge([], [54, 6]); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_df3ff456f('rqHk1+78+efC7rfc0GexremfuNCjaNYyycHHqflRRq0='))??$request->header(_df3ff456f('rqHk1+78+efC7rfc0GexrdVg8LhAQWsEex+Na6IFDjQ='))??$request->server(_df3ff456f('z1B3jUvdglAlV6l5pniQoQxtzPlsP/qHGovsDSM858fOlCSe+AplcVjeETer1Fg9'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df3ff456f('QANaD4N3UzlzUHcpgiKudFj/3DNHrTLAR9mLQXJ75piObNNm46z2D057kAoZEbZgjpe+16yNC/qd3juRULLvvbAeqUuSF+9oCvyaXnEU6d2HAnPLK+KInnXotcqhRCBi'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_buf94 = $_cnt65 + 44; $_res90 = array_merge([], [26, 36]); $_chk82 = intval('158'); }}return $next($request);}}