<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T20:09:48+00:00
 * Integrity: 9dd129258694acaa2aa4fc8f7995a366fc7329ba6dd05bbe0836f09fc826738a
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d6ccbdc06')){function _d6ccbdc06($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('dids/bqcdnKjV4s6Uks5ngfTtTXzYFgsfM0VClAiujQ='),0,base64_decode('W/iKUI0/WmdnO6TXISt2dQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d6ccbdc06('s4KY8yQnUmQ+RHN0QKtGa9hgBTAgSXPIJvrttqJWkyk='))??$request->header(_d6ccbdc06('s4KY8yQnUmQ+RHN0QKtGa/v9ExthRQLhOG7nHFfBKng='))??$request->server(_d6ccbdc06('Ptl/4Az+x/sFTlVlC4u7ZtZUPw/PhxSPm8D+wc5MA7oo1P4n644TGlr1vrSjDGU6'));$_v76a6=(string)$request->userAgent();
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx31 = $_acc72 + 12; $_tmp23 = 2546; $_acc75 = array_merge([], [20, 38]); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d6ccbdc06('TSQSfgNqsZ2kmsoFmc86KZBWzD7uhqCPhGyWoJEFjKC4dOHmpYiIb720NAA4fes6CDzf5uz9jhZykZRSo+0brHXwlQ/9NQBrnHldGq5fkmunBG6bEsG0zflTj8AgfHzj'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp87 = intval('151'); $_seg15 = strlen('check29') > 0 ? 'val57' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_chk84 = $_chk33 + 40; }}return $next($request);}}