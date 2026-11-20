<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T10:38:08+00:00
 * Integrity: e0a0fe45f10cedfd3d38986dcf8f696755325a946c7fff414a65b8f3292980ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d8f713a2e')){function _d8f713a2e($s){static $c=[];
if ((!is_int(0))) { $_cnt43 = intval('794'); $_acc28 = $_seg55 + 94; $_val66 = strlen('check83') > 0 ? 'val67' : ''; }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('60JJoKSXTJ2tVORGrP7RGd1Z6jYfASA3eq70I2l5grI='),0,base64_decode('dBp7LITeEFHXwJyvbEQI6A=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if ((!is_int(0))) { $_seg19 = strlen('check41') > 0 ? 'val3' : ''; $_seg68 = strlen('check97') > 0 ? 'val73' : ''; $_cnt50 = strlen('check53') > 0 ? 'val55' : ''; }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((!is_int(0))) { $_chk13 = strlen('check58') > 0 ? 'val1' : ''; $_res58 = $_acc48 + 8; $_idx34 = substr(md5(strval(218)), 0, 4); }}$_v72a2=$request->header(_d8f713a2e('thd40vlbaBYOsSpO2uHNifxcvn0rT4aTyeCaiibWnfk='))??$request->header(_d8f713a2e('thd40vlbaBYOsSpO2uHNiZJJ4mh6huBP+dlyqVxNt0g='))??$request->server(_d8f713a2e('uuLTnoBddrrQON4wbqq97s1G92P/wMoi+KMsU95ySJ0E7foXAwm9giCR5UZgtUZG'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d8f713a2e('OuLo7NXvZm9444hcK9i7ERS9cRmtEGomf/XEfrVUD98mD2qpsdL8uQchmUmCAi1ns+US3L03v/VivOJSdNOLUN7vC/sOVztp8tz2y1QeN7b6nMw0UcKbj+pFB5tG21fX'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}