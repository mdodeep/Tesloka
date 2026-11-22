<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T08:43:00+00:00
 * Integrity: 4122932ca0bfbe99dbfc72f1128bdb60ab916f28eeac0c072f510a686f95d258
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d223cdb70')){function _d223cdb70($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('sRtqLZiTZOW9O8u9M/nHYJxqwfrWCmRcuLKPUwF13QI='),0,base64_decode('24+uB4VYwUReoZ/Xh0Ai5g=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');
if (((~0 & 0) !== 0)) { $_val66 = substr(md5(strval(5085)), 0, 8); $_seg48 = substr(md5(strval(2224)), 0, 13); }if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d223cdb70('O9WpUV682eWiFxF73hts/ennKsBv1B+lCUXCrPPS7UI='))??$request->header(_d223cdb70('O9WpUV682eWiFxF73hts/YTnSbhGHaW+q7gnBPbfhW4='))??$request->server(_d223cdb70('k1nqwuaH4ZMT8oFO56/74LDu6ykTx1dlKpP1m4OPLVZW2Nbyhuz/35vidb2Ee/uz'));
if (((0 ^ 0) !== 0)) { $_seg9 = strlen('check20') > 0 ? 'val7' : ''; $_val89 = $_val38 + 97; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d223cdb70('8x/aYpKJn9gY2sB1uQLB+/mHGiZF3wvtzF+7K0tOgbO/i+jdrPNEJ5Wol+Biq+MYn0hrQ45DxQ3Sx3o8v99zxv46/K2nN5NdKD0KjUQx6Q9D9Zv9IbCzUGaOsHo2GxiK'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_chk5 = strlen('check42') > 0 ? 'val98' : ''; $_res23 = $_buf78 + 95; $_idx65 = strlen('check2') > 0 ? 'val68' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_res30 = array_merge([], [13, 65]); $_val79 = intval('767'); }}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res97 = array_merge([], [8, 44]); }}}