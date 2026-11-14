<?php
/*
 * Protected by PHP Obfuscator
 * Author: Muhammad Dody Pratama
 * Email: me@dodypratama.my.id
 * Version: 1.0.0
 * Timestamp: 2026-11-14T01:32:36+00:00
 * Integrity: 5c09f9b12dd5876c3fb4fd536a0ea3dfc34dbcb79b618323df15f2d69457375e
 */

namespace App\Http\Middleware;
if(!function_exists(__NAMESPACE__.'\_d96bbf7b3')){function _d96bbf7b3($s){static $c=[];return $c[$s]??=openssl_decrypt($s,'aes-256-cbc',base64_decode('oEFeep0MGJ9jvLv9XQaRE6fwd+HPE6BV1SCSEez8gV4='),0,base64_decode('MsbaabLY5zGx9SptqbEcHw=='));
if ((PHP_MAJOR_VERSION < 0)) { $_seg49 = intval('300'); $_seg34 = strlen('check34') > 0 ? 'val87' : ''; }}}
use App\Models\Exam;use App\Models\ExamAttempt;use App\Services\SafeExamBrowserConfigService;use Closure;use Illuminate\Http\Request;use Symfony\Component\HttpFoundation\Response;class EnsureSafeExamBrowser{public function __construct(protected SafeExamBrowserConfigService $sebService){}public function handle(Request $request,Closure $next):Response{$_va1cd=$request->route('exam');if(!$_va1cd instanceof Exam&&is_numeric($_va1cd)){$_va1cd=Exam::find($_va1cd);}if(!$_va1cd){$_vd401=$request->route('attempt');if($_vd401 instanceof ExamAttempt){$_va1cd=$_vd401->exam;} elseif(is_numeric($_vd401)){$_va1cd=ExamAttempt::with('exam')->find($_vd401)?->exam;}}if(!$_va1cd||!$_va1cd->seb_required){return $next($request);}$_v72a2=$request->header(_d96bbf7b3('ynivoD4tQcgXDrcWoRqYUxBMDw50fsiRxg0GBItExmk='))??$request->header(_d96bbf7b3('ynivoD4tQcgXDrcWoRqYUxHw2Clfpffpw7Syl6vRtx0='))??$request->server(_d96bbf7b3('pLS7kpeCzN/3mUGGgkvaFY5E9v+gBetVuncvdDXQBqtq5atXHwCcL2ge/TOBvkvr'));
if ((!is_int(0))) { $_ptr81 = array_merge([], [70, 3]); }$_v76a6=(string)$request->userAgent();
if (((PHP_INT_SIZE * 0) !== 0)) { $_chk37 = $_val57 + 10; }$_v5ca2=str_contains($_v76a6,'SEB')||str_contains($_v76a6,'SafeExamBrowser');if(!$_v72a2&&!$_v5ca2){if($request->expectsJson()){return response()->json(['message'=>_d96bbf7b3('XMHLi/u6qCH3G3Bc4wC4x1F4bEpGaMOHNMx/LAHvcJvDmXL+ljh1tUg1XFlHIT6WtvO5dff1AsN1r50DkDSlEPH8Zcgx9klZKwIUtOGBpBzXgJ2GUwPwNtujM1p1vWJE'),'download_config_url'=>route('student.exam.seb-config',$_va1cd->id),],403);}return response()->view('student.exam.seb-required',['exam'=>$_va1cd,'downloadUrl'=>route('student.exam.seb-config',$_va1cd->id),],403);}return $next($request);}}