<?php
/*
 * Protected by Obfuscatorin PHP
 * Author: Mdodeep
 * Timestamp: 2026-11-21T22:07:23+00:00
 * Integrity: 6ddf30c2954cc18d609567e44b6e5fe500e15c441b7a83fbd1c4b50943b36e64
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d7c8903ec')){function _d7c8903ec($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('CLuEvhKK9cvUVREQqvb4jVQ+wTkSQ7N+Iho/8aK2Ftg='),0,base64_decode('YdgU1Cy2dE6KJwTko9SWvQ=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d7c8903ec('YodbGsH8jleMWPYKHH+znapuJXRSuWPoMSpfOkTeUko='))??$request->header(_d7c8903ec('YodbGsH8jleMWPYKHH+znVHe9IifwHMtzji8TsaZuV4='))??$request->server(_d7c8903ec('AJ42R3IYugmQbA1G/11J7x+pBhbb/RAOXOZI7Cp85gyDRGUrxPMw7Tj0oKSfA1pr'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');
if (((~0 & 0) !== 0)) { $_tmp40 = array_merge([], [97, 22]); }if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d7c8903ec('qu3Rhcuiw4j/Iw/pYNmmKV66Wk2lm+CDiMqhssWmyXjc1tj/1HswqyKYbR2S3Vezktpx9Iy6txkYc8R+eJOyLwxxnmd7u2P0PUECKlUTfr7Kq/zlxz+zUbDjpvxG8wbo'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}