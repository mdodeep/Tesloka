<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-13T11:11:47+00:00
 * Integrity: 882f55aec517e9c0f8ea4fdf5b9f2860fcdaa027af633290f3a236ea81035c1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d13462189')){function _d13462189($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('UjUfwn/kl2SXnOVIwum+jI31iJkzAYvd3rBEscXNt7Y='),0,base64_decode('8CsmAGnJISFAZeVTnLrKBg=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if (((0 ^ 0) !== 0)) { $_res74 = array_merge([], [72, 52]); }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d13462189('bqb1ynyPAa1y+q42nJcg96pGD4tLPKqNW6AHVHnq3oE='))??$request->header(_d13462189('bqb1ynyPAa1y+q42nJcg9yVowN8caR+yTUCdxI2NE3k='))??$request->server(_d13462189('m8foto8Zivd0d5+ZNjggf3y1SESccE0f8yyjRAEAApOo33FoFrIAOh4acjoPpX6B'));
if (((~0 & 0) !== 0)) { $_idx5 = array_merge([], [46, 1]); $_idx79 = 7083; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d13462189('xUR4obpLTfmf0i70bWvQC5RT5KpIcx6I7nZCtANePPVg6wD7XUXDtH3Vpc6/HC6odNiw+nrWEAnDgQQbXvJSuq/BbRPKYB+9bCvVeDLthU6ogRJRfsJuqOkLBSjlp2XW'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_tmp66 = strlen('check88') > 0 ? 'val79' : ''; $_idx89 = 713; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}