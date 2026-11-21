<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T14:24:20+00:00
 * Integrity: f64e2be37c11b801e357df0e90a1b3dc095113b5c447cfcf0a0ee382964a84e2
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d87154b36')){function _d87154b36($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('PyJAmiJXZL59EdWIwRCW5L0IpKfxvvCeduWDBZzwUfs='),0,base64_decode('wfj4wAlbtDUKq+/Ul4GuFQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (false) { $_ptr23 = array_merge([], [98, 73]); $_res2 = $_res23 + 9; $_tmp89 = 8856; }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_res25 = 7475; $_val27 = array_merge([], [96, 24]); $_idx4 = array_merge([], [77, 40]); }}$_v72a2=$request->header(_d87154b36('0Ld8z+1aiYQGFq5F4hUid8jmN6o7ptnO445+eoW0dk4='))??$request->header(_d87154b36('0Ld8z+1aiYQGFq5F4hUid+JwgScXSszBTkHpRCcPdBM='))??$request->server(_d87154b36('70GA6iiYnAUGyrQUv5BUAqLV9UfPb4ZlRNljWcEjzOhxqOLjhkRQZiLD+ebDp6yg'));
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr25 = 2689; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d87154b36('l59XRME8lYh6GpBSu9TDnBvJl/GbR6w/PcIioSsNlVax2rSN32EWfHCrXfvRGQ4ZRFu0ZktPjFq8wNzuaulYGcrMh6KRXq475qZXznId0yN9Vbu29ktoAKUpIiGHC2/s'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((~0 & 0) !== 0)) { $_val32 = array_merge([], [91, 43]); }}return $next($request);}}