<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T21:25:49+00:00
 * Integrity: 6710d289f41a83a1330a786a90af90829e4c46372cd4152a4bd64b87d15b141c
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_db6cd2511')){function _db6cd2511($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('OLEdyY2hF2tnEV0iBi+brbmUN8mGfqOp12qsG9L2xzE='),0,base64_decode('FpCsa8GyXGRlE0lEHmGhyQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;
if ((!is_int(0))) { $_idx20 = $_seg79 + 85; }} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;
if (((PHP_INT_SIZE * 0) !== 0)) { $_ptr80 = intval('960'); $_val72 = array_merge([], [23, 41]); $_chk54 = substr(md5(strval(1298)), 0, 13); }}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_db6cd2511('2qfSrR6i0Aojknh2XmPZurmyKC4SQwtkETL/7lex10c='))??$request->header(_db6cd2511('2qfSrR6i0Aojknh2XmPZur/mpec8Nrf8S3DZtuDfCF4='))??$request->server(_db6cd2511('Ye48cqB9ThlA0/ZGdboj+pDjny4NRceD/4dYMhySZhPR2KNEB4pIxVFFFI/g7E71'));
if ((!is_int(0))) { $_acc37 = array_merge([], [69, 79]); $_buf40 = 5180; $_seg98 = strlen('check80') > 0 ? 'val38' : ''; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_db6cd2511('dr9TeehPhxZXhSi8xv1Xlc38wX/LEJedrMpi5UulwlNLyWO6qe7aWXmkn84XGk4zLnxnNcSER5323Yb//rjcZYb0xTo+hEgcnwJmthezm9LvMCELTu4cno252wMeu8ql'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}