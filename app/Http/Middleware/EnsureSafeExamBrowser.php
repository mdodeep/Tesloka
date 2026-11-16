<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-16T09:06:07+00:00
 * Integrity: 97253e7a138b8dfc29cb91654dc1e219bfff6043bef9e78fea4f64e20462c2e9
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d0da958f0')){function _d0da958f0($s){static $c=[];
if ((!is_int(0))) { $_seg12 = $_idx18 + 29; $_val57 = array_merge([], [63, 15]); }return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('ny4ssq7xfTBeNHfXkwCopJM8K5++8hnkuSCHTdrDlwQ='),0,base64_decode('wAmP67P30MxotE+TOBF5Ew=='));}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d0da958f0('fctBWQNRYTvSQDXW/L2nmbRDeM8GOkCbksmaGoyVC8g='))??$request->header(_d0da958f0('fctBWQNRYTvSQDXW/L2nmah3TyDZ6M+hUtGklDPgBRg='))??$request->server(_d0da958f0('a5WXDV0fJyC9BmOHMd8YskIUyz17oPS9/wAQl8fY5f6NZ69l7In95Z9pJkvdY5xY'));$_v76a6=(string)$request->userAgent();$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d0da958f0('syb0Q/FjphlfiqZqT/l34W7hkXcrHS0R6HrKAM2Rv89bD9VQpJrNT72+dzQvQB3+5B9pXuweACA7oOrfr3BlSIuBfE0ETlKC/Mf0LBdow8u9DzU6rxHGDsOdNQvLPOXD'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);
if ((!is_int(0))) { $_acc84 = 6229; $_cnt70 = strlen('check78') > 0 ? 'val15' : ''; }}return $next($request);}}