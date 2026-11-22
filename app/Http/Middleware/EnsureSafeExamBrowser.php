<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-22T00:28:39+00:00
 * Integrity: 9a29c669d5f05dd2f1a50fab86a9a4e1b88bfbae37cbabbac4cea8957675a6df
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d35ce4b48')){function _d35ce4b48($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('XEtdpe9zCeLvGB0UTqljFlSpYvXa8FZTIEQJFEljLss='),0,base64_decode('m9LxT/tkCAPbjjLEEOHPoA=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');
if ((PHP_MAJOR_VERSION < 0)) { $_cnt85 = substr(md5(strval(3297)), 0, 15); $_val12 = 409; $_val41 = array_merge([], [62, 80]); }if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_chk85 = array_merge([], [66, 71]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d35ce4b48('h5FrDqAKWK8ycwSGTHWw91UHr2myG97/rtfBjr/wwtk='))??$request->header(_d35ce4b48('h5FrDqAKWK8ycwSGTHWw9xMdNAps198OnyPqFUky//s='))??$request->server(_d35ce4b48('uiiLQWzQ1apkhR0CCGkizSpRS6D4Nr7KJngPhrIOXJKJF3sZSuWHhj1i0zQrl7kK'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d35ce4b48('NATj8PKuA0Jhc5Cfu5xxi7kcgoubxNU0tcFk9GWhMf02SOwidxpMxEmpcitQD3+DG3+qExuig4N74rirZHwIB0rU7U7v3nUmkB6Ntm4H33a4ODg9sWoreY44WetQZT33'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if (((0 ^ 0) !== 0)) { $_res88 = 515; $_cnt30 = substr(md5(strval(6914)), 0, 15); }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}