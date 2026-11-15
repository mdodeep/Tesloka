<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T08:48:00+00:00
 * Integrity: a5e866931b83edee49a3f71c95380253cad26acfef1decdf8da8558fd1c6d4ec
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d95803451')){function _d95803451($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('/yIHBxEISXp7O+oecGkDkH+HwF2X9MksXc5e+Rtz4JI='),0,base64_decode('xiLFS0+wYzTec3MjZBJ9Ew=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d95803451('iHJFQfw07PGMpUragKmBlcG6No41eI5fITYdL5Dy8OA='))??$request->header(_d95803451('iHJFQfw07PGMpUragKmBlddxhdart6YmMQs+c3RY5ZI='))??$request->server(_d95803451('TVon9UeYJadBD686sgoUygo4nS+FGMn7ITENFBE4nPrRyS91NJFH6oMrWb7yTOgb'));
if (((0 ^ 0) !== 0)) { $_cnt79 = strlen('check29') > 0 ? 'val14' : ''; }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d95803451('gDgg+QluHWJTAFPZ1EVMzalMxdP89SFn0hWolixAwR4YaxxHClGGTMwbGtiexDuR3CH3rk6SMW7eixkyxHiIj+ggAKEHnyAvB/61mi35ZnWVWek8/tw0LpDkLuwWP6m8'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((~0 & 0) !== 0)) { $_idx33 = 1687; $_res33 = $_idx94 + 48; }}}