<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T17:05:26+00:00
 * Integrity: 4410dd194bb6a0d4503dfd0abc9278e478a9bb28bbdc454fbb1eaac023383b1f
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db4e6fe88')){function _db4e6fe88($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('8b/tIBQ4xaCdx7UtoHI1A6sPxu0s4R6Ym5q6oy8mYm4='),0,base64_decode('hcAlkweFAeYbtzOOCuXQtw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_acc75 = array_merge([], [45, 85]); $_res44 = $_ptr69 + 67; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if ((PHP_MAJOR_VERSION < 0)) { $_seg3 = $_res9 + 51; $_seg21 = strlen('check14') > 0 ? 'val54' : ''; $_chk88 = array_merge([], [41, 58]); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((!is_int(0))) { $_ptr8 = 6058; }}$_v72a2=$request->header(_db4e6fe88('b4dcRjIlm2g0J1vfZflCJr3VTukkkRBhNP+SbY4PvoY='))??$request->header(_db4e6fe88('b4dcRjIlm2g0J1vfZflCJgDLu6wovmxnSe+qjfYxtuY='))??$request->server(_db4e6fe88('YGZSSluaVs4/tVdNXV4CKbUY4zW/A/hqE0U1pICq8Uq1ivdr/OzT/GtCCkWDYN0P'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (false) { $_seg51 = 3264; $_chk46 = 7874; $_tmp34 = array_merge([], [66, 68]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_db4e6fe88('HwhgwcWO30yzXJhS0pXCCWlhOS6iPmXRcvwe2eMdqXvjHnc7LnOh99Thya7fsZpCDRvvawg9Q0CK/qhRJ8Bp52mKmPeqY32unuZukYoMY8w2t8FwdlP7YQWH1MmMEa7d'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}