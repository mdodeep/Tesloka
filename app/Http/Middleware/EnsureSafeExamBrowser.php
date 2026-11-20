<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-20T11:21:16+00:00
 * Integrity: b23d60efe9e5c511646eddc8e04fbca0f57c6c778e19ba4b4a1d6b17bd86b506
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_dacb0b915')){function _dacb0b915($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3C+5vp7+tE/BiqeesrrcG4dfZe0JpW8GyGtplsztCdM='),0,base64_decode('tWLLUwkG6sO9kfiabMP54w=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_dacb0b915('8uQoMnrIVOb7AJvE/rV5/5k3mfeoybZpp6YyoyBar4M='))??$request->header(_dacb0b915('8uQoMnrIVOb7AJvE/rV5/yCTBmeBOHAp9JKQ0+ERwqA='))??$request->server(_dacb0b915('1JMkpHqt7Ua7T/oTdPm4l0DLEqFfcRSAqdk9BMecZ53EbKlJAbIFOUAACqOKdOum'));$_v76a6=(string)$request->userAgent();
if (false) { $_ptr98 = substr(md5(strval(3142)), 0, 8); }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_dacb0b915('lUDxN4SpXeHXmkGTjNcKJ91mL0CKJkCCXgVuCgM7LmcKeaKB1rwzBKCbz+qqRPwMY960mCUjA5jAUixYwEc1/nQsOVdUH7L/l+szLNYD1FoYbUrWrh6NNPPljYxB76uT'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if ((PHP_MAJOR_VERSION < 0)) { $_idx19 = 2567; $_val30 = substr(md5(strval(6512)), 0, 11); $_idx98 = strlen('check61') > 0 ? 'val29' : ''; }}}