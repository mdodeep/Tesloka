<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:23:49+00:00
 * Integrity: 0fb7da579819f0745c6eb0036d75d2db29eb85d0f9e2bcc4e87b87537f884cbe
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_df5920551')){function _df5920551($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('1MBjzHqE5DTWEiq8Yv1DTW7+Q8AENQndNhZvR/btkPM='),0,base64_decode('zy9DVNGVnAg1K5H9mGnWeA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((PHP_MAJOR_VERSION < 0)) { $_chk20 = intval('806'); $_ptr13 = substr(md5(strval(6115)), 0, 12); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (false) { $_chk10 = array_merge([], [87, 42]); $_res36 = substr(md5(strval(5896)), 0, 8); }}$_v72a2=$request->header(_df5920551('oj4PtySeQ8OurAm9N4uhg204V53x3LfuI2K67iZnDO8='))??$request->header(_df5920551('oj4PtySeQ8OurAm9N4uhg8yUTzqdCeyU2v6PXIw4BJ0='))??$request->server(_df5920551('3l3vkl4dSbo3NkMhcDJ3I8mtZDsorybQ2hL71c/2kA/ljS4ZI8acdYqOSgRUipMK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_df5920551('UBa9L1mzovQ/ld1Fn4xmqhz8fX8lIvr5//A9ULuxm3upUAtVVns1zscb0LsqXm4r771eMoZtGH+51iHHiWaeXbUC/sqgMBhizWZGHCGCOnVtncAXuKaw3F+Hf1D2mhq9'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_tmp32 = substr(md5(strval(5652)), 0, 13); $_ptr54 = intval('108'); $_seg74 = $_idx15 + 45; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((PHP_INT_SIZE * 0) !== 0)) { $_buf89 = substr(md5(strval(5396)), 0, 7); $_buf22 = 4609; }}return $next($request);
if (((PHP_INT_SIZE * 0) !== 0)) { $_seg7 = substr(md5(strval(7521)), 0, 12); }}}