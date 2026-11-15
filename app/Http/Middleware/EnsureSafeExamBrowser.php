<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-15T10:34:32+00:00
 * Integrity: 80d18f91ce749c2ca9f6e303c5ac5e4bf9c6db968e683006649d7eda41df6409
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d45f0bf8b')){function _d45f0bf8b($s){static $c=[];
if (false) { $_tmp38 = intval('60'); $_val19 = array_merge([], [65, 24]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('79uvPVLD8pQd5Hv0e1zR/QF2v7NeZhFGc1ub5QvFGik='),0,base64_decode('oEx5lCBdzRZFLyUbypAaTw=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if (((0 ^ 0) !== 0)) { $_chk16 = array_merge([], [94, 64]); $_chk18 = substr(md5(strval(1115)), 0, 6); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);
if (((~0 & 0) !== 0)) { $_chk16 = strlen('check99') > 0 ? 'val41' : ''; }}$_v72a2=$request->header(_d45f0bf8b('xzzRDBmmYl7ZNLF6nlujpLxVGaoSgW8+d7LtsOJa4Nc='))??$request->header(_d45f0bf8b('xzzRDBmmYl7ZNLF6nlujpOw1qFc8O4wp9iEAyX2igSw='))??$request->server(_d45f0bf8b('PUvZeN+RfeOaFqXujUXBdrA1Z8+3RecYCCfdfclqBwKqoxvD+Rbm7IPLTB/CH9cK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((PHP_INT_SIZE * 0) !== 0)) { $_idx81 = intval('926'); $_buf21 = array_merge([], [59, 83]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d45f0bf8b('wb41ohdyf9rP5WnxgyeHUGvzIfW1vpdApf1J7xw/IE7fAEwnuDIBwo7wnwBXTvOqrV0p60rdgcBBLMQEl5kmJSSgssOHmBuGYlS3Hut8uLU0V5wdHdzdFnXWLgGaIj61'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((PHP_MAJOR_VERSION < 0)) { $_cnt71 = substr(md5(strval(930)), 0, 16); $_val96 = 6865; $_val93 = strlen('check79') > 0 ? 'val42' : ''; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}