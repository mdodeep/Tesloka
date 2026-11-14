<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T15:02:59+00:00
 * Integrity: 4edd3c90534f55b33f572aa5269c8814b50e3f7edbc23e0daa0329b9f63e51ee
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d20d050cd')){function _d20d050cd($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('q+1aQwOpV8pptHbiJTgVSHraewroOUSbNR2zsO9rhoI='),0,base64_decode('/RnCEyYA0FKr2Yywl6UfCQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);
if ((PHP_MAJOR_VERSION < 0)) { $_seg93 = 5861; $_tmp98 = array_merge([], [38, 28]); }}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d20d050cd('xlXbJE72Vw5SlJOcZ2grl255ZoEkVtmhzc+PHLbpWKY='))??$request->header(_d20d050cd('xlXbJE72Vw5SlJOcZ2grl6vYQ/OOuDwypjp182sQsqE='))??$request->server(_d20d050cd('gWvd7gBJTK5Ml7PqldU/y0uYBsn7ukikKy/BrfBhkpODp/ON5kmmGLgvghelUsFK'));
if ((!is_int(0))) { $_tmp17 = intval('945'); $_val60 = substr(md5(strval(2778)), 0, 6); }$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d20d050cd('BhWJcCjJVKGSOcm+MTEnSmB/YP8AB77hy2DfUTIrJ6p4ZSXR+aqvM96UDAn2dWoFL8HUs/aZIig2AWtjDw4RUUK9o8rkDBYOfL/85kDg734q+dJhWARXjNW7Dl/qvLAm'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_cnt15 = 6083; }}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_tmp83 = array_merge([], [31, 24]); $_ptr87 = strlen('check37') > 0 ? 'val43' : ''; }}return $next($request);}}