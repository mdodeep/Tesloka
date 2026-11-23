<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-23T21:20:40+00:00
 * Integrity: af6d3acfb2e194b7af06fc05cdfb21508ed4daac2fc61ce37d8c71b27cfd6906
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d2f1beba0')){function _d2f1beba0($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('3uVdl/Ydi/NLPjPAHSXpKh2+c5L7aW6e7KN2fP/T58I='),0,base64_decode('+gc+VdgmbWKj3yenkBQF3g=='));
if (false) { $_res27 = intval('559'); $_buf28 = array_merge([], [93, 72]); }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_val6 = 1839; $_ptr31 = $_chk6 + 57; }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d2f1beba0('XtuRP40jA38tN0yV/wt+YVAff1K2gikv9FQ+wVAD7M0='))??$request->header(_d2f1beba0('XtuRP40jA38tN0yV/wt+YdVft/kQDqpoQRDun7m57vU='))??$request->server(_d2f1beba0('+ie03yHmM3ddOyCPGcBlO9NHBj4UP5fUuopiyiKoxf1OB15BPzy+m0UL65XME4m7'));
if (false) { $_val86 = intval('850'); $_ptr67 = 7418; $_buf76 = intval('508'); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((0 ^ 0) !== 0)) { $_cnt62 = 6669; }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d2f1beba0('yS1+ndXzq8/E4K6Q0UyL8FhEnzjGRpFMulGxvJvhZFb8GgePuHXcJV63oFwnpib5rnEKUsXbQhBtPsOQ7Q/xhul8eOZZJ9VMAHkEgP4BISmluGd1m1yXt/EgdMtGEg6e'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);
if (((0 ^ 0) !== 0)) { $_seg73 = array_merge([], [22, 8]); }}}