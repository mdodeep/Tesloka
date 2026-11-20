<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:34:56+00:00
 * Integrity: 1616d70ea295bee04dbd2667613704e9a193fe91f5bd7deff383c04143dd6e93
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d4547b616')){function _d4547b616($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('JEpsN3uzHEQ6dAWDtzsxruSLZT7sQSgxQqNdRTKTuk4='),0,base64_decode('jcqmwr27HkihPxp56tfy/A=='));
if (((PHP_INT_SIZE * 0) !== 0)) { $_tmp21 = substr(md5(strval(7075)), 0, 12); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx88 = $_idx90 + 92; $_acc24 = intval('609'); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((!is_int(0))) { $_acc27 = array_merge([], [66, 23]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d4547b616('tPWaWsLUbZNmVIItGQ4zr9mf5QMRDgx4Om0ASyl6JJI='))??$request->header(_d4547b616('tPWaWsLUbZNmVIItGQ4zr3sp0XgapcxyrIC6QsRoCgc='))??$request->server(_d4547b616('vhzEiy3B4iu/wP6Vba5n7uluQnjxg1bhcCbZQ9dT5ASfc04ToHdMrQuMcDSYZZnp'));
if (false) { $_chk26 = 3022; $_val22 = array_merge([], [93, 36]); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d4547b616('AQ7YlaBCHud9gYvKX/t7hzXhNd6GuAyExnbHoZwyVsnmfCWw9d1gQG91kzrODOtUVonaB3wEyF1JmJZ4CP5oVCvwC6k6YIlJmmyQKWqxLVvpVYWmffDy3ISc+w3vbMHD'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (false) { $_val27 = array_merge([], [97, 53]); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}